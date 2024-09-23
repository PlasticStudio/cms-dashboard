(function ($) {
	$.entwine('ss', function ($) {

		$('.cms-content.DashboardAdmin .dashboard-panel__head').entwine({
			onclick: function () {
				$('.cms-content.DashboardAdmin .dashboard-panel__head').toggleClass('open');
				$('.cms-content.DashboardAdmin .dashboard-panel__head').next('.dashboard-panel__expandable').slideToggle().css('border', '1px solid red');
			}
		});
	});
})(jQuery);
