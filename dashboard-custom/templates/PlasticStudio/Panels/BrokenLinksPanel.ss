<div class="dashboard-panel broken-links">
    
    <div class="broken-links__expandable-toggle">
        <h2>Broken Links</h2>
        <button class="broken-links__toggle-button">
            <% include Includes/svg/ChevronIcon %>
        </button>
    </div>

    <div class="broken-links__expandable">

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