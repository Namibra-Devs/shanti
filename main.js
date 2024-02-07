
$(document).ready(function() {

  $(window).scroll(function(){
  	var scroll = $(window).scrollTop();
	  if (scroll > 100) {
	    $(".navbar").css("background" , "#f4f4f2");
	  }

	  else{
		  $(".navbar").css("background" , "transparent");  	
	  }
  })
 
    $(".owl-carousel").owlCarousel({
   
        autoPlay: 3000,
        items : 4,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,3],
        center: true,
        nav:true,
        loop:true,
        responsive: {
          600: {
            items: 4
          }
        }  
   
    });
   
  });

  
$(document).ready(function(){

})