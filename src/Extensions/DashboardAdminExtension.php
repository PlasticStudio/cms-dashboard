<?php

namespace Skeletor\Extensions;

use SilverStripe\Core\Extension;
use SilverStripe\View\Requirements;

class DashboardAdminExtension extends Extension
{
    public function init()
    {
        // parent::init();
        Requirements::javascript('client/dist/index.js');
        Requirements::css('client/dist/index.css');
    }

}