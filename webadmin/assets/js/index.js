/* hides header on scroll */
$(window).scroll(function() {
    if($(this).scrollTop() > 20){
        $('#header-container').hide();
    }else{
        $('#header-container').show();
    }
});

/* package slide owl carousel */
$(document).ready(function(){
    $(".owl-package").owlCarousel({
        loop:true,
        margin:10,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                nav:false,
                loop:true
            },
            600:{
                items:3,
                nav:false,
                loop:true
            },
            1000:{
                items:3,
                nav:false,
                loop:true
            },

        }
    });


    $(".owl-testimonial").owlCarousel({
        loop:false,
        margin:10,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                nav:false,
                
            },
            600:{
                items:3,
                nav:false,
            },
            1000:{
                items:3,
                nav:false,
            },

        }
    });
});

