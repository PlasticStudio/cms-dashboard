<?php

namespace PlasticStudio\Extensions;

use SilverStripe\Core\Extension;
use SilverStripe\View\Requirements;

class DashboardAdminExtension extends Extension
{
    public function updateInit()
    {
        Requirements::css('plasticstudio/dashboard:client/css/dashboard-panels.css');
    }
}