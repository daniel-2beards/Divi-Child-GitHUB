// Custom JS goes here ------------
jQuery(document).ready(function($){
    "use strict";
    
    $(window).scroll(function(){
        if ($(window).scrollTop() >= 100){
			$('.xoo-wsc-basket').addClass('dark');
        } else {
			$('.xoo-wsc-basket').removeClass('dark');
        }
    });
    
    	//$('#summary').hide();


//     $('#summary-toggle').on('click',function() {
//     $('#summary, .active-panel').toggle(200);
//   }
// );

    if($('#summary').is(":visible")){
        $("#summary-toggle").hide();
    }

$('#summary-toggle').on('click', function() {
    $('.wizard-summary').show();
    $("#summary").fadeIn();
    $("#summary-toggle").hide();
    $('#variation_pa_fabric-color').hide();
	$('#variation_pa_body-size').hide();	
	$('#variation_pa_body-type').hide();	
	$('#variation_pa_head-size').hide();
	$('#variation_pa_closing').hide();
	$('.custom_initials').hide();
    // $('.variations').hide(); // 1sec
    $(".property").removeClass("clicked active");
});


    
    //$(".wizard-summary").removeClass("left");
    //$(".left-selected" ).remove();
    
	// $('.variations').hide();
	$('#variation_pa_fabric-color').hide();
	$('#variation_pa_body-size').hide();	
	$('#variation_pa_body-type').hide();	
	$('#variation_pa_head-size').hide();
	$('#variation_pa_closing').hide();
	$('.custom_initials').hide();

    $("#label-variation_pa_body-size").on('click', function(e){
        e.preventDefault();
        e.stopPropagation();
        $("#summary").hide(); 
        $("#summary-toggle").show();
        $("#variation_pa_body-size").fadeIn();
        $("#variation_pa_body-type").hide();	
        $("#variation_pa_head-size").hide();
        $("#variation_pa_closing").hide();
        $("#variation_pa_fabric-color").hide();
    });
    
    $("#label-variation_pa_body-type").on('click', function(e){
        e.preventDefault();
        e.stopPropagation();
        $("#summary").hide(); 
        $("#summary-toggle").show();
        $("#variation_pa_body-type").fadeIn();	
        $("#variation_pa_body-size").hide();
        $("#variation_pa_head-size").hide();
        $("#variation_pa_closing").hide();
        $("#variation_pa_fabric-color").hide();

    });

    $("#label-variation_pa_head-size").on('click', function(e){
        e.preventDefault();
        e.stopPropagation();
        $("#summary").hide(); 
        $("#summary-toggle").show();
        $("#variation_pa_head-size").fadeIn();
        $("#variation_pa_body-type").hide();	
        $("#variation_pa_body-size").hide();
        $("#variation_pa_closing").hide();
        $("#variation_pa_fabric-color").hide();

    });

    $("#label-variation_pa_closing").on('click', function(e){
        e.preventDefault();
        e.stopPropagation();
        $("#summary").hide();
        $("#summary-toggle").show(); 
        $("#variation_pa_closing").fadeIn();
        $("#variation_pa_body-size").hide();
        $("#variation_pa_body-type").hide();	
        $("#variation_pa_head-size").hide();
        $("#variation_pa_fabric-color").hide();

    });

    $("#label-variation_pa_fabric-color").on('click', function(e){
        e.preventDefault();
        e.stopPropagation();
        $("#summary").hide(); 
        $("#summary-toggle").show();
        $("#variation_pa_fabric-color").fadeIn();
        $("#variation_pa_closing").hide();
        $("#variation_pa_body-size").hide();
        $("#variation_pa_body-type").hide();	
        $("#variation_pa_head-size").hide();

    });

    $("#label-custom_initials").on('click', function(e){
        e.preventDefault();
        e.stopPropagation();
        $("#summary").hide(); 
        $("#summary-toggle").show();
        $('.custom_initials').fadeIn();
        $("#variation_pa_fabric-color").hide();
        $("#variation_pa_closing").hide();
        $("#variation_pa_body-size").hide();
        $("#variation_pa_body-type").hide();	
        $("#variation_pa_head-size").hide();

    });





// $(".property").click(function() {
//     if($(".property").hasClass("active")){
//         $(".property").removeClass("active");
        
//         //$(".wizard-summary").removeClass("left");
//         //$(".left-selected" ).remove();
        
//     }else{
//         $(this).addClass("clicked active");
//         //$(".wizard-summary").addClass("left");
//         $(this).parents(".property").removeClass("clicked active");

//         // if ($(".left-selected").length===0){
//         // $('<div/>', {
//         //     "class": 'left-selected',
//         //     text: 'Medium Weight Cotton / White'
//         // }).appendTo('.property-title');
//         // }
        
//             // $('#wizard .variation').eq($(this).index()).show()
//                 // .siblings().hide();
        
      
        
//         //$('div#wizard div div').hide();
//         //$('div#wizard div div').eq($(this).index()).show();
//         // console.log($('div#wizard div').eq($(this).index()));
//         //$('.wizard-summary').hide();
//         $("#summary-toggle").show(); 
//     }
//     $(this).addClass("active");


    
//     //$('<div class="left-selected"> Medium Weight Cotton / White </div>').appendTo('.property-title'); 
// });

	/* MEGA MENU */
	$('.mega-menu li.product1').on('mouseover', function(e){
        e.preventDefault();
        e.stopPropagation();
        $('.product2-img').attr('style','display:none !important'); 
		$('.product1-img').show(); 
	});
	$('.mega-menu').on('mouseover', function(e){
        e.preventDefault();
        e.stopPropagation();
        $('.product2-img').attr('style','display:none !important'); 
	});
	$('.mega-menu li.product2').on('mouseover', function(e){
        e.preventDefault();
        e.stopPropagation();
        $('.product1-img').attr('style','display:none !important'); 
		$('.product2-img').show(); 
	});
	$('.mega-menu li.product2').on('mouseover', function(e){
        e.preventDefault();
        e.stopPropagation();
        $('.product1-img').attr('style','display:none !important'); 
		$('.product2-img').show(); 
	});

});


