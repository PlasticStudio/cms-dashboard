(function ($) {
	$.entwine('ss', function ($) {

		$('.cms-content.DashboardAdmin .dashboard-panel__broken-links .dashboard-panel__panel-head').entwine({
			onclick: function () {
				$('.cms-content.DashboardAdmin .dashboard-panel__broken-links .dashboard-panel__panel-head').toggleClass('open');
				$('.cms-content.DashboardAdmin .dashboard-panel__broken-links .dashboard-panel__expandable').slideToggle();
			}
		});
	});
})(jQuery);
