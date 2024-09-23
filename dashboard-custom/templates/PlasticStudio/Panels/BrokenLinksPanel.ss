<div class="dashboard-panel broken-links">
    
    <div class="broken-links__expandable-toggle">
        <h3 class="broken-links__title">Broken Links</h3>
        <span class="dashboard-icon fa fa-chevron-right" aria-hidden="true"></span>
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
                        <th>Edit</th>
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
                                <a class="broken-link__fix" href="$Fix">
                                    <span><svg xmlns="http://www.w3.org/2000/svg" fill="none" height="24" viewBox="0 0 24 24" width="24"><path d="M10 6H6C4.89543 6 4 6.89543 4 8V18C4 19.1046 4.89543 20 6 20H16C17.1046 20 18 19.1046 18 18V14M14 4H20M20 4V10M20 4L10 14" stroke="#4A5568" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg></span>
                                </a>
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