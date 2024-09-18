<?php

namespace PlasticStudio\Panels;

use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Security\Permission;
use Plastyk\Dashboard\Model\DashboardPanel;
use SilverStripe\ORM\ArrayList;
use SilverStripe\View\ArrayData;

class WebsiteHealthPanel extends DashboardPanel
{
    public function canView($member = null)
    {
        return Permission::checkMember($member, 'CMS_ACCESS_ADMIN');
    }

    public function getData()
    {
        $data = parent::getData();

        $data['Results'] = $this->getResults();

        return $data;
    }

    public function getResults()
    {
        $pages = Page::get();

        $results = ArrayList::create();

        $classExclusions = [
            'SilverStripe\CMS\Model\VirtualPage',
            'SilverStripe\CMS\Model\RedirectorPage',
            'SilverStripe\ErrorPage\ErrorPage',
            'PlasticStudio\SEO\Pages\HTMLSitemap',
        ];

        foreach ($pages as $page) {

            if (in_array($page->ClassName, $classExclusions)) {
                continue;
            }

            $reviewItems = ArrayList::create();
            
            if (!$page->MetaTitle) {
                $reviewItems->push(ArrayData::create([
                    'Title' => 'Meta Title is missing.',
                ]));
            }

            if (!$page->MetaDescription) {
                $reviewItems->push(ArrayData::create([
                    'Title' => 'Meta Description is missing.',
                ]));
            }            

            $defaultSlug = $this->convertToNewSlug(ClassInfo::ShortName($page));

            if ($page->URLSegment == $defaultSlug) {
                $reviewItems->push(ArrayData::create([
                    'Title' => 'URL needs updating.',
                ]));
            }

            // pages created but not editing not completed
            if ($page->Created == $page->LastEdited) {
                $reviewItems->push(ArrayData::create([
                    'Title' => 'Page created but not edited.'
                ]));
            } else if ($page->isPublished() == false && strtotime($page->Created) < strtotime('-2 minutes')) {
                // if is draft page and was created more than 2 minutes ago
                $reviewItems->push(ArrayData::create([
                    'Title' => 'New page was created but hasn\'t been published.',
                ]));
            }
            
            if ($reviewItems->count() > 0) {                
                $data = ArrayData::create(
                    [
                        'Title' => $page->Title,
                        'CMSEditLink' => '/admin/pages/edit/show/' . $page->ID,
                        'ReviewItems' => $reviewItems,
                    ]
                );

                $results->push($data);
            }                     
        }

        return $results;
    }

    function convertToNewSlug($string) {
        // Step 1: Insert hyphen before each uppercase letter (except the first one)
        $slug = preg_replace('/([a-z])([A-Z])/', '$1-$2', $string);
        
        // Step 2: Convert the entire string to lowercase
        $slug = strtolower($slug);
        
        // Step 3: Prepend 'new-' to the slug
        return 'new-' . $slug;
    }
}