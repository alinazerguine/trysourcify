$.fn['swiperSlider'] = function() {
	return this.each(function() {
		var config = $.extend({}, $(this).data('swiper'), {
			nextButton: '.swiper-button-next',
			prevButton: '.swiper-button-prev',
			autoHeight: true
		});

		var slider = new Swiper(this, config);
		var thumbs = $(this).next('.project-media-thumbs');

		if (thumbs.size() > 0) {
			var sliderThumbs = new Swiper(thumbs.get(0), {
				spaceBetween: 10,
				centeredSlides: true,
				slidesPerView: 5,
				touchRatio: 0.2
			});

			slider.params.control = sliderThumbs
			sliderThumbs.params.control = slider

			thumbs.on('click', '.swiper-slide', function() {
				var slideIndex = $(this).index();
				console.log(slideIndex)

				slider.slideTo(slideIndex)
				// sliderThumbs.slideTo(slideIndex)

				// Remove an active class
				thumbs.find('.swiper-slide-active').removeClass('swiper-slide-active')
				thumbs.find('.swiper-slide:nth(' + slideIndex + ')').addClass('swiper-slide-active')
			})
		}
	});
};
