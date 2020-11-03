		jQuery(document).ready(function() {
		var divwidth = jQuery(".main-slider-area").width();
			 
         if(divwidth>1200)
		 {
	          var auto_width = true;

		 }else
		 {
	          var auto_width = false;
		 }

		 var owl = jQuery('.owl-carousel');
		  owl.owlCarousel({
			nav: false,
			smartSpeed:1000,
			navSpeed:10000,
			loop: true,
			mouseDrag: true,
			onDragged: drag_callback,
			responsive: {
			  0: {
				items: 1,
				autoWidth:false,
			  },
			  600: {
				items: 1,
				autoWidth:false,
			  },
			  1000: {
				items: 1,
				autoWidth: auto_width,
			  }
			}
		  });

	  
jQuery('.owl-controls .owl-prev').click(function() {
    jQuery('.banner-slider').trigger('next.owl.carousel',[1000]);
    jQuery('.top-slider').trigger('next.owl.carousel',[1000]);

})
// Go to the previous item
jQuery('.owl-controls .owl-next').click(function() {
    jQuery('.banner-slider').trigger('prev.owl.carousel',[1000]);
    jQuery('.top-slider').trigger('prev.owl.carousel',[1000]);

})  


function drag_callback(event)
  {
	var dire = event.relatedTarget['_drag']['direction'];
   // jQuery(".banner-slider").not(this).trigger("dragged.owl.carousel");

	if (dire === "left") {
			jQuery('.banner-slider').trigger('next.owl.carousel',[1000]);
		} else {
			jQuery('.banner-slider').trigger('prev.owl.carousel',[1000]);
		}
  }

jQuery('.owl-dot').click(function(){owl.trigger('to.owl.carousel', [jQuery(this).index(), 300]);});
 //Random index generator
 function randomPosition(){
 var r_hb = jQuery('#carousel-custom-dots li').length;
 var randomize = null;
 
 randomize=1
 
 if (randomize != 0) {
 return (Math.floor(Math.random()* r_hb));
 }
 else { return 0 ;}
 }
 //Sort random function
 function random(owlSelector){
 owlSelector.children().sort(function(){
 return Math.round(Math.random()) - 0.5;
 }).each(function(){
 jQuery(this).appendTo(owlSelector);
 });
 }

});