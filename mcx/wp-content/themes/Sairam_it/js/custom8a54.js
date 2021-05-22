//loading icons js
window.onload = function() {
        $(".loader").fadeOut(1e3)
    
    } 

//homepage counter
jQuery(document).ready(function($) {
            $('.counters').counterUp({
                delay: 10,
                time: 1000
            });
        });


//for search disable on keypress

$(document).ready(function(){
    $('.submitBtn').attr('disabled',true);
    $('#search').keyup(function(){
        if($(this).val().length !=0)
            $('.submitBtn').attr('disabled', false);            
        else
            $('.submitBtn').attr('disabled',true);
    })
});



$(function(){
			$('#vertical-ticker').totemticker({
				row_height	:	'113px',
				next		:	'#ticker-next',
				previous	:	'#ticker-previous',
				stop		:	'#stop',
				start		:	'#start',
				mousestop	:	true
			});
		});


$(document).ready(function() {    
    
    $(".slider-arrow").click(function() {
    $(this).hasClass("show") ? ($(".slider-arrow, .SimpleForm").animate({
        left: "-=300"
    }, 600, function() {}), $(".slider-arrow").removeClass("show")) : ($(".slider-arrow, .SimpleForm").animate({
        left: "+=300"
    }, 600, function() {}), $(".slider-arrow").removeClass("hide").addClass("show"))
}), 
        
        $('#owl1').owlCarousel({
	loop: true,
	margin: 10,
    autoplayTimeout:5000,    
	autoplay: true,
	responsive: {
		0: {
			items: 1,
		},
		600: {
			items: 2,
		},
		1000: {
			items: 5,
		}
	}
})
        
        
    
     
          $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    slideSpeed: 500,          
    nav:true,
        autoplay:true,
        autoplayTimeout:5000,
        autoplayHoverPause:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000: {
                        items: 1
                        , nav: true            
                        , navigationText: [
   "<i class='fa fa-angle-left'></i>"
   , "<i class='fa fa-angle-right'></i>"
]
                        , loop: false
                        , margin: 20
                    }
                }
            })
            $(".owl-prev").html('<i class="fa fa-angle-left"></i>');
            $(".owl-next").html('<i class="fa fa-angle-right"></i>');  
    
    $(".menu").slidingMenu();
     
    });


//menu hover
    if (screen.width > 767) {
    $('.searchs li.dropdown').hover(function () {
        $(this).find('.dropdown-menu').first().stop(true, true).delay(300).slideDown(300);
    }, function () {
        $(this).find('.dropdown-menu').first().stop(true, true).delay(300).slideUp(300);
    });    
	}

   

    
    $(function () {
    $('a[href="#search"]').on('click', function(event) {
        event.preventDefault();
        $('#search').addClass('open');
        $('#search > form > input[type="search"]').focus();
    });
    
    $('#search, #search button.close').on('click keyup', function(event) {
        if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
            $(this).removeClass('open');
        }
    });
    
    
    //Do not include! This prevents the form from submitting for DEMO purposes only!
//    $('form').submit(function(event) {
//        event.preventDefault();
//        return false;
//    })
});

function openNav() {
    document.getElementById("mySidenav").style.width = "100%";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}










//backtop top functions


jQuery(document).ready(function($){	
	var offset = 300,		
		offset_opacity = 1200,		
		scroll_top_duration = 700,	
		$back_to_top = $('.cd-top');

	$(window).scroll(function(){
		( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
		if( $(this).scrollTop() > offset_opacity ) { 
			$back_to_top.addClass('cd-fade-out');
		}
	});
	//smooth scroll to top
	$back_to_top.on('click', function(event){
		event.preventDefault();
		$('body,html').animate({
			scrollTop: 0 ,
		 	}, scroll_top_duration
		);
	});

});



$("#menu_list").mCustomScrollbar({
    axis:"y" // vertical and horizontal scrollbar
});