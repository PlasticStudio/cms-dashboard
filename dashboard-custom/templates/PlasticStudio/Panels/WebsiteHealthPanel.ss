<div class="dashboard-panel dashboard-panel__website-health">
    <h2>Website Health</h2>

    <% if $Results %>
        $Title
        <%-- <table class="table">
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
        </table> --%>
    <% end_if %>

</div>