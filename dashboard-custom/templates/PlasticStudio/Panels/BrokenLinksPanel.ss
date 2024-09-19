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
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill-rule="evenodd" clip-rule="evenodd"><path d="M14 4h-13v18h20v-11h1v12h-22v-20h14v1zm10 5h-1v-6.293l-11.646 11.647-.708-.708 11.647-11.646h-6.293v-1h8v8z"/></svg>
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