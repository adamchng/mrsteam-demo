$(document).ready(function(){
	
	//First page only
	$('.generator .arrow-left img').hide();
	
	//Next Button
	$('.arrow-right img').click(function(){
		if ($('#main').hasClass('product-page')) {
			$('.more-info-button').trigger('click');
			if (!$('.more-info').length && !$('.tech-info').length) {
				z = $('.page-nav .active').next('li').find('a:eq(0)');
				window.location = z.attr('href') + "#content";
			}
		} else if ($('#main').hasClass('more-page')) {
			$('.tech-info-button').trigger('click');
			if (!$('.tech-info').length) {
				z = $('.page-nav .active').next('li').find('a:eq(0)');
				window.location = z.attr('href') + "#content";
			}
		} else if ($('#main').hasClass('tech-page')) {
			z = $('.page-nav .active').next('li').find('a:eq(0)');
			window.location = z.attr('href') + "#content";
		}
	});
	
	//Back Button
	$('.arrow-left img').click(function(){
		if ($('#main').hasClass('product-page')) {
			z = $('.page-nav .active').prev('li').find('a:eq(0)');
			window.location = z.attr('href') + "#content";
		} else if ($('#main').hasClass('more-page')) {
			$('.product-button').trigger('click');
		} else if ($('#main').hasClass('tech-page')) {
			$('.more-info-button').trigger('click');
		}
	});
	
	// Product tabs from middle-nav
	$('.product-button').click(function(){
		$('.more-info, .tech-info').hide();
		$('.more-info-button, .tech-info-button').removeClass('active');
		$('.product').show();
		$('.product-button').addClass('active');
		$('#main').removeClass('more-page').removeClass('tech-page').addClass('product-page');
		if ($('#main').hasClass('generator')) {
			$('.generator .arrow-left img').hide();
		}
	});
	
	$('.more-info-button').click(function(){
		if (!$('.more-info').length) {
				return false;
		}
		$('.arrow-left img').show();
		$('.product, .tech-info').hide();
		$('.product-button, .tech-info-button').removeClass('active');
		$('.more-info').show();
		$('.more-info-button').addClass('active');
		$('#main').removeClass('product-page').removeClass('tech-page').addClass('more-page');
	});
	
	$('.tech-info-button').click(function(){
		if (!$('.tech-info').length) {
				return false;
		}
		$('.arrow-left img').show();
		$('.product, .more-info').hide();
		$('.product-button, .more-info-button').removeClass('active');
		$('.tech-info').show();
		$('.tech-info-button').addClass('active');
		$('#main').removeClass('product-page').removeClass('more-page').addClass('tech-page');
	});
	
	
	//Save/Selected
	$('.save-button').click(function(){
		$('.select').hide();
		$('.select-button').removeClass('active');
		$('.save').show();
		$('.save-button').addClass('active');
	});
	
	$('.select-button').click(function(){
		$('.save').hide();
		$('.save-button').removeClass('active');
		$('.select').show();
		$('.select-button').addClass('active');
	});
	
	$("#view-cart").colorbox({opacity: .6});
	
});