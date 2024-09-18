<div class="dashboard-panel website-health">

    <div class="website-health__expandable-toggle">
        <h2 class="website-health__title">Website Health</h2>
        <span class="dashboard-icon fa fa-chevron-right" aria-hidden="true"></span>
    </div>

    <div class="website-health__expandable">

        <% if $Results %>

            <% loop $Results %>
                <div class="result">
                    <% if $ReviewItems %>

                        <div class="result__expand-trigger">
                            <h3>$Title</h3>
                            <span class="dashboard-icon fa fa-chevron-right" aria-hidden="true"></span>
                        </div>
                        <div class="result__expandable">                    
                            <ul>
                                <% loop $ReviewItems %>
                                    <li>$Title</li>
                                <% end_loop %>
                            </ul>
                            <a href="$CMSEditLink">Edit page</a>
                        </div>
                    <% end_if %>
                </div>
            <% end_loop %>

        <% end_if %>

    </div>

</div>