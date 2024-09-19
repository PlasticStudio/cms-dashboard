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

            <% loop $Results.Sort('ReviewItemsCount') %>
                
                <% if $ReviewItems %>
                    <div class="result">

                    <p class="result__title">
                        <a href="$CMSEditLink">
                            $Title
                            <span><svg xmlns="http://www.w3.org/2000/svg" fill="none" height="24" viewBox="0 0 24 24" width="24"><path d="M10 6H6C4.89543 6 4 6.89543 4 8V18C4 19.1046 4.89543 20 6 20H16C17.1046 20 18 19.1046 18 18V14M14 4H20M20 4V10M20 4L10 14" stroke="#4A5568" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg></span>                        
                        </a>
                    </p>
                                    
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