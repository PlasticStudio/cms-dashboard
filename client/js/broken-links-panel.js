(function ($) {
	$.entwine('ss', function ($) {

		$('.cms-content.DashboardAdmin .broken-links__expandable-toggle').entwine({
			onclick: function () {
				$('.cms-content.DashboardAdmin .broken-links__expandable-toggle').toggleClass('open');
				$('.cms-content.DashboardAdmin .broken-links__expandable').slideToggle();
			}
		});
	});
})(jQuery);
