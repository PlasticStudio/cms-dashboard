<div class="dashboard-panel quick-links-panel">

    <% if $CanViewPages %>
        <a href="{$AdminURL}/pages/">
            <span class="dashboard-icon fa fa-sitemap" aria-hidden="true"></span>
            <% _t('CMSPagesController.MENUTITLE','Pages') %>
        </a>
    <% end_if %>

    <% if $CanViewUsers %>
        <a href="{$AdminURL}/security/">
            <span class="dashboard-icon fa fa-users" aria-hidden="true"></span>
            <% _t('SecurityAdmin.MENUTITLE','Security') %>
        </a>
    <% end_if %>

    <%-- <% if $CanViewProperties %> --%>
        <a href="{$AdminURL}/properties/">
            <span class="dashboard-icon fa fa-building" aria-hidden="true"></span>
            Properties
        </a>

        <a href="{$AdminURL}/properties/Property/EditForm/field/Property/item/new">
            <span class="dashboard-icon fa fa-plus" aria-hidden="true"></span>
            New Property
        </a>
    <%-- <% end_if %> --%>

    <% if $CanViewSettings %>
        <a href="{$AdminURL}/settings/">
            <span class="dashboard-icon fa fa-cogs" aria-hidden="true"></span>
            <% _t('CMSSettingsController.MENUTITLE','Settings') %>
        </a>
    <% end_if %>

</div>