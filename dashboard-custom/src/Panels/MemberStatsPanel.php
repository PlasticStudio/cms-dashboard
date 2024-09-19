<?php

namespace PlasticStudio\Panels;

use SilverStripe\Security\Permission;
use Plastyk\Dashboard\Model\DashboardPanel;
use Plastyk\Dashboard\Admin\DashboardAdmin;
use SilverStripe\View\Requirements;
use SilverStripe\Core\ClassInfo;
use SilverStripe\Security\Member;

class MemberStatsPanel extends DashboardPanel
{
    public function init()
    {
        parent::init();
        Requirements::css('plasticstudio/dashboard:client/css/broken-links-panel.css');
        Requirements::javascript('plasticstudio/dashboard:client/js/broken-links-panel.js');
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

        return $data;
    }

    public function getResults()
    {
        $results = Member::get()->sort('FirstName DESC')->limit(8);

        return $results;
    }
}