
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


  // Counter
  const counters = document.querySelectorAll('.counters');
  let count = document.getElementById('count');
  const increase = document.getElementById('increase');
  const decrease = document.getElementById('decrease');

  const count1 = document.getElementById('count1');
  const increase1 = document.getElementById('increase1');
  const decrease1 = document.getElementById('decrease1');

  let value = 0;
  let value1 = 0;

  increase.addEventListener('click', () => {
    value++;
    count.textContent = value;
  })

  decrease.addEventListener('click', () => {
    count.textContent = value;
    if (value <= 0) {
      value = 0;
    } else {
      value--;
    }
  })

  increase1.addEventListener('click', () => {
    value1++;
    count1.textContent = value1;
  })

  decrease1.addEventListener('click', () => {
    count1.textContent = value;
    if (value1 <= 0) {
      value1 = 0;
    } else {
      value1--;
    }
  })
