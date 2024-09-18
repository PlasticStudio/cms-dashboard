<?php

namespace PlasticStudio\Panels;

use Plastyk\Dashboard\Admin\DashboardAdmin;
use Plastyk\Dashboard\Model\DashboardPanel;
use SilverStripe\ORM\FieldType\DBField;
use SilverStripe\Security\Permission;
use SilverStripe\SiteConfig\SiteConfig;
use SilverStripe\View\Requirements;

class SupportTicketPanel extends DashboardPanel
{
    public function canView($member = null)
    {
        return Permission::checkMember($member, 'CMS_ACCESS_ADMIN');
    }

    public function init()
    {
        parent::init();
        Requirements::css('plasticstudio/dashboard:client/css/support-ticket-panel.css');
    }

    public function getData()
    {
        $data = parent::getData();

        $data['ContactEmail'] = DashboardAdmin::config()->contact_email ?: false;

        $data['Content'] = $this->getContent();

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

    public function getContent() {

        $contactEmail = DashboardAdmin::config()->contact_email ?: false;
        $siteName = SiteConfig::current_site_config()->Title;

        $content = '<p>Contact us if you would like any submit a support ticket or would like any assistance.</p>';
        $content .= '<p><a href="mailto:' . $contactEmail . '?subject=New support request from ' . $siteName . '" target="_blank" class="btn btn-primary">Request support</a></p>';
        return DBField::create_field('HTMLText', $content);
    }

}
