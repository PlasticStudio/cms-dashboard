(function ($) {
	$.entwine('ss', function ($) {

		$('.cms-content.DashboardAdmin .website-health__expandable-toggle').entwine({
			onclick: function () {
				$('.cms-content.DashboardAdmin .website-health__expandable-toggle').toggleClass('open');
				$('.cms-content.DashboardAdmin .website-health__expandable').slideToggle();
			}
		});
	});
})(jQuery);
