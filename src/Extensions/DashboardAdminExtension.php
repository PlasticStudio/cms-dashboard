<?php

namespace Skeletor\Extensions;

use SilverStripe\Core\Extension;
use SilverStripe\View\Requirements;

class DashboardAdminExtension extends Extension
{
    public function updateInit()
    {
        Requirements::css('plasticstudio/dashboard:css/dashboard-panels.css');
    }
}