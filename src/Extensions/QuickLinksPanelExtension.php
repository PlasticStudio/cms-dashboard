<?php

namespace PlasticStudio\Extensions;

use SilverStripe\Core\Extension;
use SilverStripe\Security\Permission;
use SilverStripe\Security\Security;

class QuickLinksPanelExtension extends Extension
{
    // public function updateData(&$data)
    // {
    //     $member = Security::getCurrentUser();

    //     $data['CanViewProperties'] = Permission::checkMember($member, 'CMS_ACCESS_PropertiesAdmin') && class_exists(PropertiesAdmin::class);
    //     $data['CanView'] = $data['CanView'] || $data['CanViewProperties'];
    // }
}