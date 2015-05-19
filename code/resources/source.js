$(document).ready(function() 
{
	/* --- Menu/Navigation Event Handling --- */
	
		$(document).on('click', '.navbutton', function()
		{
			if($('.navside').css('right') != '0px')
			{
				$(".navside").stop(true, false).animate({right: '0px'}, 500);
				$(".navbutton").stop(true, false).animate({right: '211px'}, 500);
				$(".navbar").toggleClass('navopen', true);
			}
			else
			{
				$(".navside").stop(true, false).animate({right: '-213px'}, 500);
				$(".navbutton").stop(true, false).animate({right: '0px'}, 500);
				$(".navbar").toggleClass('navopen', false);
			}
		});
	
	
	/* --- Slider Handling --- */
	
		var pauseTimer = false;

		var intervalTimer = setInterval(function () {
			if(pauseTimer == false)
			{
				moveRight();
			}
			else
			{
				pauseTimer = false;
			}
		}, 7000);

		var slideCount = $('.slider ul li').length;
		var slideWidth = $('.slider ul li').width();
		var slideHeight = $('.slider ul li').height();
		var sliderUlWidth = slideCount * slideWidth;
		
		function fixSlider()
		{
			slideCount = $('.slider ul li').length;
			slideWidth = $('.slider').width();
			slideHeight = $('.slider').height();
			sliderUlWidth = slideCount * slideWidth;
			
			$('.slider ul li').css({ width: slideWidth, height: slideHeight });
			
			$('.slider ul').css({ width: sliderUlWidth, marginLeft: - slideWidth });
		}
		
		fixSlider();
		$('.slider ul li:last-child').prependTo('.slider ul');

		function moveLeft() {
			$('.slider ul').stop(true, true).animate({
				left: + slideWidth
			}, 1000, function () {
				$('.slider ul li:last-child').prependTo('.slider ul');
				$('.slider ul').css('left', '');
			});
		};

		function moveRight() {
			$('.slider ul').stop(true, true).animate({
				left: - slideWidth
			}, 1000, function () {
				$('.slider ul li:first-child').appendTo('.slider ul');
				$('.slider ul').css('left', '');
			});
		};

		$(document).on('click', 'a.control_prev', function () {
			pauseTimer = true;
			event.preventDefault();
			moveLeft();
		});

		$(document).on('click', 'a.control_next', function () {
			pauseTimer = true;
			event.preventDefault();
			moveRight();
		});
		
		$( window ).resize(function() {
			fixSlider();
		});
		
	
	/* --- Blockslider Handling --- */
	
		var pauseTimer2 = false;

		var slideCount2 = $('.blockslider ul li').length;
		var slideWidth2 = $('.blockslider ul li').width();
		var slideHeight2 = $('.blockslider ul li').height();
		var sliderUlWidth2 = slideCount2 * (slideWidth2 + 30) + 30;
		var sliderDivWidth2 = sliderUlWidth2 - (slideWidth2 + 30);
		
		function fixSlider2()
		{
			slideCount2 = $('.blockslider ul li').length;
			slideWidth2 = $('.blockslider ul li').width();
			slideMarginWidth2 = $('.blockslider ul li').width();
			slideHeight2 = $('.blockslider ul li').height();
			sliderUlWidth2 = slideCount2 * (slideWidth2 + 30) + 30;
			sliderDivWidth2 = sliderUlWidth2 - (slideWidth2 + 30);
			
			if( $(window).width() < sliderDivWidth2 )
			{
				$('.blockslider ul').css({ width: sliderUlWidth2, marginLeft: - slideMarginWidth2 });
				$('.blockslider div.inner').css({ maxWidth: sliderDivWidth2 });
			}
			else
			{
				$('.blockslider ul').css({ width: sliderUlWidth2, marginLeft: 0 });
				$('.blockslider div.inner').css({ maxWidth: sliderUlWidth2 });
			}
		}
		
		function showSliderData(id)
		{
			$('.blockslider ul li').removeClass('selectedslide');
			$('.blockslider ul li[data-id="' + id + '"]').addClass('selectedslide');
			$('.sliderdata').slideUp();
			$('.sliderdata[data-id="' + id + '"]').slideDown();
			
			location.hash = id;
		}
		
		fixSlider2();
		
		if (window.location.hash.substr(1) != '')
		{
			var hashIndex = $('.blockslider ul li[data-id="' + window.location.hash.substr(1) + '"]').index();
			console.log(hashIndex);
			
			if(hashIndex == 0)
			{
				$('.blockslider ul li:last-child').prependTo('.blockslider ul');
			}
			else
			{
				for(i = 2; i <= hashIndex; i++)
				{
					$('.blockslider ul li:first-child').appendTo('.blockslider ul');
				}
			}
			
			$('.blockslider ul li[data-id="' + window.location.hash.substr(1) + '"]').addClass('selectedslide');
			$('.sliderdata[data-id="' + window.location.hash.substr(1) + '"]').css({display: 'block'});
		}
		else
		{
			var randomiser = Math.floor((Math.random() * slideCount2) + 1);
			for(i = 0; i <= randomiser; i++)
			{
				$('.blockslider ul li:last-child').prependTo('.blockslider ul');
			}
			
			$('.blockslider ul li:nth-child(2)').addClass('selectedslide');
			$('.sliderdata[data-id="' + $('.blockslider ul li:nth-child(2)').data('id') + '"]').css({display: 'block'});
		}
			
		function moveLeft2() {
			$('.blockslider ul').stop(true, true).animate({
				left: + slideWidth2 + 30
			}, 1000, function () {
				$('.blockslider ul li:last-child').prependTo('.blockslider ul');
				$('.blockslider ul').css('left', '');
			});
		};

		function moveRight2() {
			$('.blockslider ul').stop(true, true).animate({
				left: - slideWidth2 - 30
			}, 1000, function () {
				$('.blockslider ul li:first-child').appendTo('.blockslider ul');
				$('.blockslider ul').css('left', '');
			});
		};

		$(document).on('click', 'a.control_prev', function () {
			pauseTimer2 = true;
			event.preventDefault();
			moveLeft2();
		});

		$(document).on('click', 'a.control_next', function () {
			pauseTimer2 = true;
			event.preventDefault();
			moveRight2();
		});
		
		$( window ).resize(function() {
			fixSlider2();
		});
		
		$(document).on('click', '.blockslider ul li', function () {
			pauseTimer2 = true;
			showSliderData($(this).data('id'));
		});

		
		
	/* --- Miscellaneous Handling --- */
		
		$(".datepicker").datepicker(
		{
			changeMonth: true,
			changeYear: true,
			showButtonPanel: true,
			yearRange: "1900:2010"
		});
		
	
});