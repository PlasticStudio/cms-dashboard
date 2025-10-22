<?php

namespace PlasticStudio\Extensions;

use SilverStripe\Core\Extension;
use SilverStripe\View\Requirements;

class DashboardAdminExtension extends Extension
{
    public function updateInit()
    {
        Requirements::css('plasticstudio/dashboard:client/css/dashboard-panels.css');

        $config = $this->owner->config();

        if ($panelAccentColor = $config->get('panel_accent_color')) {
            Requirements::customCSS(<<<CSS
.cms-content.DashboardAdmin .dashboard-panel {
    border-top-color: $panelAccentColor;
}
CSS
            );
        }
    }
}