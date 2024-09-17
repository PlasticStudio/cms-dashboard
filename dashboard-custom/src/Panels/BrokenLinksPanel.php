<?php

use SilverStripe\Dev\Debug;
use SilverStripe\ORM\ArrayList;
use SilverStripe\View\ArrayData;
use SilverStripe\Security\Permission;
use Plastyk\Dashboard\Model\DashboardPanel;

class BrokenLinksPanel extends DashboardPanel
{
    public function canView($member = null)
    {
        if (!Permission::checkMember($member, 'CMS_ACCESS_PropertiesAdmin')) {
            return false;
        }

        return parent::canView($member);
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
        $apiKey = "NSHqPBUdV3EOpqSmQr6QjoQHUgGbDI3JkFpiWCVjb94a5b47";
        $ohDear = new OhDear\PhpSdk\OhDear($apiKey);

        // get all sites
        // $sites = $ohDear->sites();

        $siteID = '40394';

        $brokenLinks = $ohDear->site($siteID)->brokenLinks();

        // Debug::show($brokenLinks);
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