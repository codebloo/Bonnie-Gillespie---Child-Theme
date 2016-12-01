jQuery(document).ready(function($){
  $('.logo_slider').slick({
	   infinite: true,
	  slidesToShow: 6,
	 dots: true,
	speed: 500,
	  arrows: false 
  });
  

  jQuery('.red_carpet_gallery a').featherlightGallery({
      previousIcon: '«',
      nextIcon: '»',
      galleryFadeIn: 300,
      openSpeed: 300
  });

  
  
});