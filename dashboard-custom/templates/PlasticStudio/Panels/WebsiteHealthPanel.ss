<div class="dashboard-panel website-health">

    <%-- <div class="website-health__expandable-toggle"> --%>
        <h3 class="website-health__title">Website Health</h3>
        <%-- <span class="dashboard-icon fa fa-chevron-right" aria-hidden="true"></span>
    </div> --%>

    <% if $Content %>
        <div class="website-health__content">
            $Content
        </div>
    <% end_if %>

    <%-- <div class="website-health__expandable"> --%>

        <% if $Results %>

            <% loop $Results %>
                
                <% if $ReviewItems %>
                    <div class="result">

                    <p class="result__title"><a href="$CMSEditLink">$Title</a></p>
                                    
                    <ul class="result__list">
                        <% loop $ReviewItems %>
                            <li>$Title</li>
                        <% end_loop %>
                    </ul>
                

                    <%-- <div class="result__expand-trigger">
                        <h3 class="result__title">$Title</h3>
                        <span class="dashboard-icon fa fa-chevron-right" aria-hidden="true"></span>
                    </div>
                    <div class="result__expandable">                    
                        <ul class="result__list">
                            <% loop $ReviewItems %>
                                <li>$Title</li>
                            <% end_loop %>
                        </ul>
                        <a href="$CMSEditLink">Edit page</a>
                    </div> --%>
                    </div>
                <% end_if %>
                
            <% end_loop %>

        <% end_if %>

    <%-- </div> --%>

</div>