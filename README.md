# Dashboard

CMS dashboard for SilverStripe 5, uses plastyk/silverstripe-dashboard and extends with custom panels.

## Install

```
composer require plasticstudio/dashboard
```

## Config
- Create local dashboard.yml in /_config
- Update panel accent colour to site specific
- Add client ID from OhDear
- Update list of default panels if required
```
---
Name: PROJECT_NAME-dashboard
---
Plastyk\Dashboard\Admin\DashboardAdmin:
  contact_email: 'support@psdigital.co.nz'
  panel_accent_color: '#14e885'
  ohdear_api_key: 'NSHqPBUdV3EOpqSmQr6QjoQHUgGbDI3JkFpiWCVjb94a5b47'
  # ohdear_site_id: '40394' // get from OhDear site page
  allowed_panels:
    - Plastyk\Dashboard\Panels\UpdatePanel
    - Plastyk\Dashboard\Panels\QuickLinksPanel
    - Plastyk\Dashboard\Panels\RecentlyEditedPagesPanel
    - PlasticStudio\Panels\SupportTicketPanel
    - PlasticStudio\Panels\WebsiteHealthPanel
    - PlasticStudio\Panels\BrokenLinksPanel
    - PlasticStudio\Panels\MemberStatsPanel
```

### Website health panel
Custom panel that checks for missing meta title, meta description and setting email recipients.

### Member activity panel
Custom panel that outputs members who recently logged in

### Broken links panel
Custom panel which connects to OhDear API to retrieve broken links
- NOTE: OhDear client id needs to be added to dashboard.yml
