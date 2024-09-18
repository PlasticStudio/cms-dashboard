<?php

namespace PlasticStudio\Extensions;

use SilverStripe\Core\Extension;
use SilverStripe\Security\Permission;
use SilverStripe\Security\Security;

class QuickLinksPanelExtension extends Extension
{
    public function updateData(&$data)
    {
        $member = Security::getCurrentUser();

        $data['CanViewProperties'] = Permission::checkMember($member, 'CMS_ACCESS_PropertiesAdmin') && class_exists(PropertiesAdmin::class);
        $data['CanView'] = $data['CanView'] || $data['CanViewProperties'];


        // get list of model admin classes form yml
        $modelAdminClasses = DashboardAdmin::config()->model_admin_classes ?: false;

        // create an array of model admin classes, checking if the user has permission to view them
        // include the urlSegment of the model admin class and the icon
        $data['ModelAdminClasses'] = [];
        if ($modelAdminClasses) {
            foreach ($modelAdminClasses as $modelAdminClass) {
                $canView = Permission::checkMember($member, 'CMS_ACCESS_' . $modelAdminClass['urlSegment']);
                $data['ModelAdminClasses'][] = [
                    'Title' => $modelAdminClass['title'],
                    'URLSegment' => $modelAdminClass['urlSegment'],
                    'Icon' => $modelAdminClass['icon'],
                    'CanView' => $canView
                ];
            }

        }

    }
}