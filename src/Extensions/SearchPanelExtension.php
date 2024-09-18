<?php

namespace PlasticStudio\Extensions;

use SilverStripe\Core\Extension;
use SilverStripe\Security\Permission;
use SilverStripe\Core\ClassInfo;
use Plastyk\Dashboard\Admin\DashboardAdmin;

class SearchPanelExtension extends Extension
{
    public function canView($member = null)
    {
        $permission = Permission::checkMember($member, 'CMS_ACCESS_ADMIN');

        $allowed_panels = DashboardAdmin::config()->allowed_panels;
        $allowed = false;

        if ($allowed_panels && in_array(ClassInfo::ClassName($this->owner), $allowed_panels)) {
            $allowed = true;
        }

        if ($permission && $allowed) {
            return true;
        } else {
            return false;
        }
    }
}