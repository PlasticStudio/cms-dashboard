<?php

namespace PlasticStudio\Panels;

use Page;
use SilverStripe\Security\Permission;
use Plastyk\Dashboard\Model\DashboardPanel;
use Plastyk\Dashboard\Admin\DashboardAdmin;
use SilverStripe\ORM\ArrayList;
use SilverStripe\View\ArrayData;
use SilverStripe\Core\ClassInfo;
use SilverStripe\SiteConfig\SiteConfig;
use SilverStripe\View\Requirements;
use SilverStripe\ORM\FieldType\DBHTMLText;

class WebsiteHealthPanel extends DashboardPanel
{

    public function init()
    {
        parent::init();
        Requirements::css('plasticstudio/dashboard:client/css/website-health-panel.css');
        Requirements::javascript('plasticstudio/dashboard:client/js/website-health-panel.js');
    }
    
    public function canView($member = null)
    {
        $permission = Permission::checkMember($member, 'CMS_ACCESS_ADMIN');

        $allowed_panels = DashboardAdmin::config()->allowed_panels;
        $allowed = false;

        if ($allowed_panels && in_array(ClassInfo::class_name($this), $allowed_panels)) {
            $allowed = true;
        }

        if ($permission && $allowed) {
            return true;
        } else {
            return false;
        }
    }

    public function getData()
    {
        $data = parent::getData();

        $data['Results'] = $this->getResults();
        $data['Content'] = $this->getContent();

        return $data;
    }

    public function getContent() {
        return DBHTMLText::create()->setValue('<p>An overview of items that need attention to improve your site SEO.');
    }

    public function getResults()
    {
        $pages = Page::get()->exclude([
            'ClassName' => 'SilverStripe\CMS\Model\VirtualPage',
            'ClassName' => 'SilverStripe\CMS\Model\RedirectorPage',
            'ClassName' => 'SilverStripe\ErrorPage\ErrorPage',
            'ClassName' => 'PlasticStudio\SEO\Pages\HTMLSitemap',
        ]);
        $results = ArrayList::create();

        // Settings
        $siteConfig = SiteConfig::current_site_config();
        $siteConfigEditLink = '/admin/settings';
        $settingsItems = ArrayList::create();

        if ($siteConfig->Title == 'Your Site Name') {
            $settingsItems->push(ArrayData::create([
                'Title' => 'Site Title needs updating.',
            ]));
        }

        if ($siteConfig->EmailRecipients == '') {
            $settingsItems->push(ArrayData::create([
                'Title' => 'Email Recipients are missing.',
            ]));
        }

        if (!$siteConfig->Logo) {
            $settingsItems->push(ArrayData::create([
                'Title' => 'Site Logo is missing.',
            ]));
        }

        if ($settingsItems->count() > 0) {
            $data = ArrayData::create(
                [
                    'Title' => 'Settings',
                    'CMSEditLink' => $siteConfigEditLink,
                    'ReviewItems' => $settingsItems,
                    'ReviewItemsCount' => $settingsItems->count(),
                ]
            );

            $results->push($data);
        }

        // Pages
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

            // // pages created but not editing not completed
            // if ($page->Created == $page->LastEdited) {
            //     $reviewItems->push(ArrayData::create([
            //         'Title' => 'Page created but not edited.'
            //     ]));
            // } else if ($page->isPublished() == false && strtotime($page->Created) < strtotime('-2 minutes')) {
            //     // if is draft page and was created more than 2 minutes ago
            //     $reviewItems->push(ArrayData::create([
            //         'Title' => 'New page was created but hasn\'t been published.',
            //     ]));
            // }
            
            if ($reviewItems->count() > 0) {                
                $data = ArrayData::create(
                    [
                        'Title' => $page->Title,
                        'CMSEditLink' => '/admin/pages/edit/show/' . $page->ID,
                        'ReviewItems' => $reviewItems,
                        'ReviewItemsCount' => $reviewItems->count(),
                    ]
                );

                $results->push($data);
            }                     
        }

        return $results->Sort('ReviewItemsCount DESC')->Limit(10);
    }

    private function convertToNewSlug($string) {
        // Step 1: Insert hyphen before each uppercase letter (except the first one)
        $slug = preg_replace('/([a-z])([A-Z])/', '$1-$2', $string);
        
        // Step 2: Convert the entire string to lowercase
        $slug = strtolower($slug);
        
        // Step 3: Prepend 'new-' to the slug
        return 'new-' . $slug;
    }
}