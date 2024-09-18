(function ($) {
	$.entwine('ss', function ($) {

		console.log('broken-links-panel.js');

		$('.cms-content.DashboardAdmin .broken-links__expandable-toggle').entwine({
			onclick: function () {
				$('.cms-content.DashboardAdmin .broken-links__expandable-toggle').toggleClass('open');
				$('.cms-content.DashboardAdmin .broken-links__expandable').slideToggle();
			}
		});
	});
})(jQuery);
