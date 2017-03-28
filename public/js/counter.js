// Counter
(function($) {

	'use strict';

	if ($.isFunction($.fn['themePluginCounter'])) {

		$(function() {
			$('[data-plugin-counter]:not(.manual), .counters [data-to]').each(function() {
				var $this = $(this),
					opts;

				var pluginOptions = theme.fn.getOptions($this.data('plugin-options'));
				if (pluginOptions)
					opts = pluginOptions;

				$this.themePluginCounter(opts);
			});
		});

	}

}).apply(this, [jQuery]);