<?php

namespace PlasticStudio\Panels;

use Page;
use SilverStripe\Security\Permission;
use Plastyk\Dashboard\Model\DashboardPanel;

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
        return \Page::get()->filter([
            'MetaTitle' => '',
        ]);
    }
}