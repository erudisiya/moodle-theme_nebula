/*!
  custom js
  */
jQuery( document ).ready(function($) {
    $("#sidePanOpener").click(function(){
		$(".sidePanel").toggleClass('hiden');
		$(".mainArea").toggleClass('big');
		$('.panelClose').toggleClass('open');
        if ($(".mainArea").hasClass('big')){
            var open = 0;
        } else {
            var open = 1;
        }
        var url = $(".mainArea").attr("attr-wwwroot");
        console.log(url);
        $.ajax({
            url: url+'/theme/nebula/leftsideajax.php',
            type: 'post',
            data: {open : open},
            dataType: 'json',
            success:function(response){
                
                

            }
        });
	});

});

$('.owlCcarousel').owlCarousel({
    loop:false,
    dots: false,
    margin:30,
    nav:true,
    navText: ["<i class='fa fa-chevron-right'></i>","<i class='fa fa-chevron-left'></i>"],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        990:{
            items:1
        },
        1260:{
            items:2
        },
        1440:{
            items:3
        }
    }
})


$.each($(".owl-carousel .owl-item") , function(key, val){
    var anyColorNumber = Math.trunc( Math.random() * 10);
    var colorSelector = "";
    if(anyColorNumber <= 2){
        colorSelector = "#a3bccb";
        //console.log(anyColorNumber , colorSelector);
     }else if( anyColorNumber >= 3 &&  anyColorNumber <= 6){
        colorSelector = "#46e1c4";
                 console.log(anyColorNumber , colorSelector);
    
    }else if( anyColorNumber <= 9) {
        colorSelector = "#3ba6e6";
        //console.log(anyColorNumber , colorSelector);
    
    }
 $(this).children().children(".coursePhoto").css("background", colorSelector)
})
//$(".owl-carousel .coursePhoto").css("background", colorSelector)

$('.owlCcarousel1').owlCarousel({
    loop:false,
    dots: false,
    margin:30,
    nav:true,
    navText: ["<i class='fa fa-chevron-right'></i>","<i class='fa fa-chevron-left'></i>"],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:2
        },
        1200:{
            items:3
        },
        1600:{
            items:5
        }
    }
})