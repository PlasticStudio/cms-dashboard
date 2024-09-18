(function ($) {
	$.entwine('ss', function ($) {

		$('.cms-content.DashboardAdmin .website-health__expandable-toggle').entwine({
			onclick: function () {
				$('.cms-content.DashboardAdmin .website-health__expandable-toggle').toggleClass('open');
				$('.cms-content.DashboardAdmin .website-health__expandable').slideToggle();
			}
		});
		
        $('.cms-content.DashboardAdmin .website-health .result__expand-trigger').entwine({
			onclick: function () {
				$('.cms-content.DashboardAdmin .website-health .result__expand-trigger').toggleClass('open');
				this.siblings('.result__expandable').toggleClass('open');
			}
		});
	});
})(jQuery);
