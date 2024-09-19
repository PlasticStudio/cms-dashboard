<div id="dashboard-app">
	
	$showPanel(Plastyk\Dashboard\Panels\UpdatePanel)

	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<h1>$SiteConfig.Title</h1>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-6">
				$showPanel(Plastyk\Dashboard\Panels\QuickLinksPanel)
			</div>
			<div class="col-lg-6">
				$showPanel(PlasticStudio\Panels\SupportTicketPanel)
			</div>
		</div>

		<% if $canViewPanel(Plastyk\Dashboard\Panels\RecentlyEditedPagesPanel) || $canViewPanel(PlasticStudio\Panels\WebsiteHealthPanel) || $canViewPanel(PlasticStudio\Panels\MemberStatsPanel) %>
			<div class="row">			
				
			</div>
			
			<div class="row">
				<div class="col-lg-6 col-xl-4">
					$showPanel(Plastyk\Dashboard\Panels\RecentlyEditedPagesPanel)
				</div>

				<div class="col-lg-6 col-xl-4">
					$showPanel(PlasticStudio\Panels\WebsiteHealthPanel)
				</div>

				<div class="col-lg-6 col-xl-4">
					$showPanel(PlasticStudio\Panels\MemberStatsPanel)
				</div>
			</div>
		<% end_if %>

		<% if $canViewPanel(PlasticStudio\Panels\BrokenLinksPanel) %>
			<div class="row">
				<div class="col-12">
					$showPanel(PlasticStudio\Panels\BrokenLinksPanel)
				</div>
			</div>
		<% end_if %>

	</div>

</div>