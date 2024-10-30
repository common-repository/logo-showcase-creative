jQuery( document ).ready(function($) {

	$( '.ccs-cls-logo-slider' ).each(function( index ) {
		
		var slider_id   = $(this).attr('id');
		var logo_conf 	= $.parseJSON( $(this).parent().closest('.ccs-cls-showcase-slider-wrp').find('.ccs-cls-slider-conf').text() );

		if( typeof(slider_id) != 'undefined' && slider_id != '' ) {
			jQuery('#'+slider_id).slick({
				dots				: (logo_conf.dots) == "true" ? true : false,
				arrows				: (logo_conf.arrows) == "true" ? true : false,
				infinite			: (logo_conf.loop) == "true" ? true : false,
				autoplay			: (logo_conf.autoplay) == "true" ? true : false,
				slidesToShow		: parseInt(logo_conf.slides_column),
				slidesToScroll		: parseInt(logo_conf.slides_scroll),
				rtl             	: (Cls.is_rtl == 1) ? true : false,
				mobileFirst    		: (Cls.is_mobile == 1) ? true : false,
				responsive: [{
				     breakpoint: 1023,
				     settings: {
				      slidesToShow : (parseInt(logo_conf.slides_column) > 3) ? 3 : parseInt(logo_conf.slides_column),
				      slidesToScroll : 1
				     }
				    },{
				     breakpoint: 640,
				     settings: {
				      slidesToShow : (parseInt(logo_conf.slides_column) > 2) ? 2 : parseInt(logo_conf.slides_column),
				      slidesToScroll : 1
				     }
				    },{
				     breakpoint: 479,
				     settings: {
				      slidesToShow : 1,
				      slidesToScroll : 1
				     }
				    },{
				     breakpoint: 319,
				     settings: {
				      slidesToShow: 1,
				      slidesToScroll: 1
				     }
				    }]
			});
		}
	});
});