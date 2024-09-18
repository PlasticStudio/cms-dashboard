<?php

namespace Skeletor\Extensions;

use SilverStripe\Core\Extension;
use SilverStripe\View\Requirements;

class DashboardAdminExtension extends Extension
{
    public function init()
    {
        parent::init();
        Requirements::css('plasticstudio/dashboard:client/dist/index.css');
        Requirements::css('plasticstudio/dashboard:client/dist/index.js');
    }

}