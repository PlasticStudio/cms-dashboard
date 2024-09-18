<?php

namespace PlasticStudio\Panels;

use OhDear\PhpSdk\OhDear;
use SilverStripe\ORM\ArrayList;
use SilverStripe\View\ArrayData;
use SilverStripe\Security\Permission;
use Plastyk\Dashboard\Model\DashboardPanel;
use Plastyk\Dashboard\Admin\DashboardAdmin;
use SilverStripe\View\Requirements;

class BrokenLinksPanel extends DashboardPanel
{
    public function init()
    {
        parent::init();
        Requirements::css('plasticstudio/dashboard:client/css/broken-links-panel.css');
        Requirements::javascript('plasticstudio/dashboard:client/js/broken-links-panel.js');
    }

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
        // https://ohdear.app/docs/integrations/the-oh-dear-php-sdk
        // Connect to Oh Dear Rest API
        $apiKey = DashboardAdmin::config()->ohdear_api_key ?: false;
        $ohDear = new OhDear($apiKey);
        $siteID = DashboardAdmin::config()->ohdear_site_id ?: false;

        if (!$apiKey || !$siteID) {
            return false;
        }

        $brokenLinks = $ohDear->site($siteID)->brokenLinks();
        $results = ArrayList::create();

        foreach ($brokenLinks as $link) {

            $data = ArrayData::create(
                [
                    'StatusCode' => $link->statusCode,
                    'CrawledUrl' => $link->crawledUrl,
                    'FoundOnUrl' => $link->foundOnUrl,
                    'LinkText' => $link->linkText,
                ]
            );
            $results->push($data);            
        }

        return $results;
    }
}