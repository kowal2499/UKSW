jQuery(document).ready(function() {

	/**
	 * Lightbox
	 */

	jQuery('a.js-lightbox').simpleLightbox();

	/**
	 * Slider na stronie głównej
	 */
	jQuery('#owl-simple').owlCarousel(
		{
			items: 1,
			autoplay: true,
			autoplayTimeout: 4500,
			autoplayHoverPause: false,
			loop: true,
			animateOut: 'fadeOut'
		});

	/**
	 * Ajaxowy lazy load wiadomości
	 */

	var NewsNavigation = function(el) {
		this.$el = jQuery(document).find(el);

		if (this.$el.length) {

			this.$container = this.$el.find('.news-container');
			this.$loading = this.$el.find('.loading');

			this.$prev = this.$el.find('.previous');
			this.$next = this.$el.find('.next');
			this.$nonce = this.$el.find('#_wpnonce');
			this.template = this.$el.find('#js-news-navigation-template').html();

			this.$prev.on('click', this.clickHandler.bind(this));
			this.$next.on('click', this.clickHandler.bind(this));

			this.goToPage(1)
		}
	};

	NewsNavigation.prototype.goToPage = function(page) {
		var self = this;

		this.$loading.fadeIn(200, function() {
			jQuery.post({
				url: _settings.url,
				data: {
					page: page,
					nonce: self.$nonce.val(),
					action: 'uksw_news_navigation'
				},
				success: function(data) {
					self.$container.html('');

					var tpl = _.template(self.template);
					var html = '';

					data.data.news.forEach(function(item) {
						html += tpl(item);
					});

					self.$container.html(html);
					self.$loading.fadeOut(100);

					// przyciski

					if (data.data.next === 0) {
						self.$next.attr('data-goto', '');
						self.$next.addClass('hidden');
					} else {
						self.$next.attr('data-goto', data.data.next);
						self.$next.removeClass('hidden');
					}

					if (data.data.prev === 0) {
						self.$prev.attr('data-goto', '');
						self.$prev.addClass('hidden');
					} else {
						self.$prev.attr('data-goto', data.data.prev);
						self.$prev.removeClass('hidden');
					}
				},

				error: function (request, status, error) {
					self.$loading.fadeOut();
					console.log(request.responseText);
				}
			})
		});
	};

	NewsNavigation.prototype.clickHandler = function(e) {
		e.preventDefault();

		var $li = jQuery(e.currentTarget).closest('li');
		var page = parseInt($li.attr('data-goto'));

		if (!page) {
			return;
		}

		this.goToPage(page);

	};

	newsHomePage = new NewsNavigation('section#news-section');
	newsSidebar = new NewsNavigation('article#current-issues');

});