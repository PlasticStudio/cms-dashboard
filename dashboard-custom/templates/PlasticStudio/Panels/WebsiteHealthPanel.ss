<div class="dashboard-panel dashboard-panel__website-health">
    <h2>Website Health</h2>

    <% if $Results %>

        <% loop $Results %>
            <div class="result">
                <% if $ReviewItems %>

                    <div class="dashboard-panel__toggle-wrapper">
                        <h3>$Title</h3>
                        <button class="dashboard-panel__toggle-button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill-rule="evenodd" clip-rule="evenodd"><path d="M23.245 20l-11.245-14.374-11.219 14.374-.781-.619 12-15.381 12 15.391-.755.609z"/></svg>
                        </button>
                    </div>
                    <div class="dashboard-panel__expandable">                    
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