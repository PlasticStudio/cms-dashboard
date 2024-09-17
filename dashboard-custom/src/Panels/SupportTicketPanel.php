<?php

namespace Plastyk\Dashboard\Panels;

use Plastyk\Dashboard\Admin\DashboardAdmin;
use Plastyk\Dashboard\Model\DashboardPanel;
use SilverStripe\ORM\FieldType\DBField;
use SilverStripe\Security\Permission;
use SilverStripe\View\Requirements;

class SupportTicketPanel extends DashboardPanel
{
    public function canView($member = null)
    {
        return Permission::checkMember($member, 'CMS_ACCESS_ADMIN');
    }

    // public function init()
    // {
    //     parent::init();
    //     Requirements::css('plastyk/dashboard:css/dashboard-more-information-panel.css');
    // }

    public function getData()
    {
        $data = parent::getData();

        $data['ContactEmail'] = DashboardAdmin::config()->contact_email;

        return $data;
    }

    // public function getData()
    // {
    //     $data = parent::getData();

    //     $data['ContactEmail'] = DashboardAdmin::config()->contact_email ?: false;
    //     $data['ContactName'] = DashboardAdmin::config()->contact_name ?:
    //         _t('MoreInformationPanel.YOURWEBDEVELOPER', 'your web developer');
    //     $data['Content'] = $this->getContent();

    //     return $data;
    // }

}
