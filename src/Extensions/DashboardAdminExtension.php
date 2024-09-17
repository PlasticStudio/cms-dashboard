<?php

namespace Skeletor\Extensions;

use SilverStripe\Core\Extension;
use SilverStripe\View\Requirements;

class DashboardAdminExtension extends Extension
{
    public function init()
    {
        // parent::init();
        Requirements::javascript('app/client/dist/dashboardApp.js');
    }

}