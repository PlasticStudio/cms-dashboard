<?php

namespace PlasticStudio\Extensions;

use SilverStripe\Core\Extension;
use SilverStripe\Security\Permission;
use SilverStripe\Core\ClassInfo;
use Plastyk\Dashboard\Admin\DashboardAdmin;
use SilverStripe\Security\Security;

class QuickLinksPanelExtension extends Extension
{
    public function canView($member = null)
    {
        $permission = Permission::checkMember($member, 'CMS_ACCESS_ADMIN');

        $allowed_panels = DashboardAdmin::config()->allowed_panels;
        $allowed = false;

        if ($allowed_panels && in_array(ClassInfo::class_name($this->owner->ClassName), $allowed_panels)) {
            $allowed = true;
        }

        if ($permission && $allowed) {
            return true;
        } else {
            return false;
        }
    }
    
    // public function updateData(&$data)
    // {
    //     $member = Security::getCurrentUser();

    //     $data['CanViewProperties'] = Permission::checkMember($member, 'CMS_ACCESS_PropertiesAdmin') && class_exists(PropertiesAdmin::class);
    //     $data['CanView'] = $data['CanView'] || $data['CanViewProperties'];
    // }
}