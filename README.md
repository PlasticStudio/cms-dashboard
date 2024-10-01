# Dashboard

CMS dashboard for SilverStripe 5, uses plastyk/silverstripe-dashboard and extends with custom panels.

## Config
- Create local dashboard.yml in /_config
- Update panel accent colour to site specific
- Add client ID from OhDear
`
---
Name: plasticstudio-dashboard
---
Plastyk\Dashboard\Admin\DashboardAdmin:
  contact_email: 'support@psdigital.co.nz'
  panel_accent_color: '#14e885'
`

### Website health panel
Custom panel that checks for missing meta title, meta description and setting email recipients.

### Member activity panel
Custom panel that outputs members who recently logged in

### Broken links panel
Custom panel which connects to OhDear API to retrieve broken links
- NOTE: OhDear client id needs to be added to dashboard.yml