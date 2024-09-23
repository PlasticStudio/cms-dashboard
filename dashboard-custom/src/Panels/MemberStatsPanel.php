<?php

namespace PlasticStudio\Panels;

use SilverStripe\Security\Permission;
use Plastyk\Dashboard\Model\DashboardPanel;
use Plastyk\Dashboard\Admin\DashboardAdmin;
use SilverStripe\View\Requirements;
use SilverStripe\Core\ClassInfo;
use SilverStripe\Security\Member;
use SilverStripe\ORM\ArrayList;
use SilverStripe\View\ArrayData;

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
        $members = Member::get()->filter([
            'LastVisited:GreaterThan' => date('c', strtotime('-6 months')),
        ])->sort('LastVisited DESC')->limit(8);

        $results = ArrayList::create();

        foreach ($members as $member) {

            $lastVisit = date('d/m/Y H:i:s', strtotime($member->LastVisited));

            $data = ArrayData::create(
                [
                    'Name' => $member->FirstName . ' ' . $member->Surname,  
                    'LastVisited' => $lastVisit,
                ]
            );
            $results->push($data); 
        }

        return $results;
    }
}