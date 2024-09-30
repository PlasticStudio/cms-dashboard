<?php

namespace PlasticStudio\Panels;

use Plastyk\Dashboard\Admin\DashboardAdmin;
use Plastyk\Dashboard\Model\DashboardPanel;
use SilverStripe\ORM\FieldType\DBField;
use SilverStripe\Security\Permission;
use SilverStripe\SiteConfig\SiteConfig;
use SilverStripe\View\Requirements;
use SilverStripe\Core\ClassInfo;

class SupportTicketPanel extends DashboardPanel
{
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

        $content = '<p><a href="mailto:' . $contactEmail . '?subject=New support request from ' . $siteName . '" target="_blank" class="btn btn-primary">Request a support ticket</a></p>';
        
        return DBField::create_field('HTMLText', $content);
    }

}
