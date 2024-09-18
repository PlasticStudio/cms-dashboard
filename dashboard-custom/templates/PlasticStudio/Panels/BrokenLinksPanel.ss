<div class="dashboard-panel dashboard-panel__broken-links">
    
    <div class="dashboard-panel__head">
        <h2>Broken Links</h2>
        <button class="dashboard-panel__toggle-button" @click="toggleExpandablePanel('broken-links')">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill-rule="evenodd" clip-rule="evenodd"><path d="M23.245 20l-11.245-14.374-11.219 14.374-.781-.619 12-15.381 12 15.391-.755.609z"/></svg>
        </button>
    </div>

    <div class="dashboard-panel__body">

        <% if $Results %>
            <table class="table">
                <thead>
                    <tr>
                        <th>Status Code</th>
                        <th>Internal broken link</th>
                        <th>Found on</th>
                        <th>Link text</th>
                    </tr>
                </thead>
                <tbody>
                    <% loop $Results %>
                        <tr class="broken-link">
                            <td>
                                <span class="broken-link__code broken-link__code--code-$StatusCode">$StatusCode</span>
                            </td>
                            <td>
                                <a href="$CrawledUrl">$CrawledUrl</a>
                            </td>
                            <td>
                                <a href="$FoundOnUrl">$FoundOnUrl</a>
                            </td>
                            <td>
                                $LinkText
                            </td>
                            <td>
                                <a href="#">Ignore (TODO)</a>
                            </td>                 
                        </tr>
                    <% end_loop %>
                </tbody>
            </table>
        <% else %>
            <p>No broken links found.</p>
        <% end_if %>

    </div>
</div>