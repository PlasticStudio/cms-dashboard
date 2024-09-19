<div class="dashboard-panel member-stats">
    <h3 class="member-stats__title">Member Activity</h3>
	
    <% if $Results %>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Last Visited</th>
                </tr>
            </thead>
            <tbody>
                <% loop $Results %>
                    <tr>
                        <td>
                            $Name
                        </td>
                        <td>
                            <$LastVisited
                        </td>
                    </tr>
                <% end_loop %>
            </tbody>
        </table>
    <% end_if %>
</div>
