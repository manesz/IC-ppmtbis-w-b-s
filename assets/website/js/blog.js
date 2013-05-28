$(window).load(function(){
	if ($('.pics').length){
		$('.pics').each(function(){ 
				$(this).css('opacity',1).css('margin-left', '-'+($(this).width() - $(this).parent().width())/2+'px');
			if ($(this).height() > $(this).parents('.slides').siblings('flex-direction-nav').height() && !$(this).parents('.single').length){
				if (!$(this).parents('.flexslider').hasClass('five'))
					$(this).css('opacity',1);//.css('margin-top', '-'+($(this).height() - $(this).parents('.slides').siblings('flex-direction-nav').height())/2+'px');
			} 
		});
	}
});

$(document).ready(function(){
	initBlogs();
});


function initBlogs(){

	$('.metas_container').each(function(){
			
		if (!$(this).find('.tags').html().length){
			$(this).find('.tags').css({
				marginLeft: 0,
				paddingLeft: 0
			});
		}
				
	});	
	
	if($('.flexslider').length){
		$('.flexslider').each(function(){
			if ($(this).parents('.single').length){
				$(this).flexslider({
					animation: "slide",
					controlNav: false,
					directionNav: true,
					touch: true,
					after: function(slider){
						$(slider).find('.magnifier')
							.unbind('click')
							.bind('click', function(){
								$(slider).find('li:not(".clone")').eq(slider.currentSlide).find('a').trigger('click');
							});
					},
					start: function(slider){
						$(slider).css('float','right');
						$(slider).find('.magnifier').bind('click', function(){
							$(slider).find('li:not(".clone")').eq(slider.currentSlide).find('a').trigger('click');
						});
					}
				});
				$(this).find('a.pretty').prettyPhoto({deeplinking: false, show_title: false, social_tools: '', theme: 'pp_default'});					
			} else {
				$(this).flexslider({
					animation: "slide",
					controlNav: false,
					directionNav: true,
					touch: true,
					start:function(slider){
						if (!$(slider).parents('.blogarchive.fullwidth').length){
							$(slider).find('img').each(function(){
							
								var finalHeight = 400;
	
								$(this).css('width','auto').css('max-width','100000px');
								var origWidth = $(this).width();
								var origHeight = $(this).height();
								var ratio = origWidth / origHeight;
								var finalWidth = origHeight * ratio;							
								$(this).width(finalWidth).height(finalHeight);
								
							});	
						}
					}
				});
			}
		});
	}
	
		
	if ($('audio').length){
		$('audio:not(".recentPostsAudio")').each(function(){
			if ($(this).parents('.fullwidth').length){
				$(this).mediaelementplayer({
	    			flashName: 'flashmediaelement.swf',
	    			enableAutosize: true,
	    			audioWidth: '100%'
	    		});
			} else {
				if (!$(this).parents('.single').length){
					$(this).mediaelementplayer({
		    			flashName: 'flashmediaelement.swf',
		    			enableAutosize: true,
		    			audioWidth: '100%'
		    		});				
				}
				else {
					$(this).mediaelementplayer({
		    			flashName: 'flashmediaelement.swf',
		    			enableAutosize: true,
		    			audioWidth: '100%'
		    		});			
				}
			}
		});
	}
	
	
	/*single stuff*/
	if ($('.single').length){
		$('a.pretty').prettyPhoto({deeplinking: false, show_title: false, social_tools: '', theme: 'pp_default'});
		
		if ($('.single .featured-image-thumb .magnifier').length){
			$('.single .featured-image-thumb .magnifier').bind('click', function(){
				$(this).siblings('a.pretty').trigger('click');
			});
		}
			
	}
	
	$('a.comment-reply-link').each(function(){
		if ($(this).attr('href').indexOf('#') != -1){
			$(this).bind('click', function(){
				$('html,body').animate({scrollTop: $(this).offset().top - 80}, 222, 'jswing');
			});
		}
	});

	if ($('.pics').length){
		$('.pics').each(function(){ 
				$(this).css('opacity',1).css('margin-left', '-'+($(this).width() - $(this).parent().width())/2+'px');
			if ($(this).height() > $(this).parents('.slides').siblings('flex-direction-nav').height() && !$(this).parents('.single').length){
				if (!$(this).parents('.flexslider').hasClass('five'))
					$(this).css('opacity',1).css('margin-top', '-'+($(this).height() - $(this).parents('.slides').siblings('flex-direction-nav').height())/2+'px');
			} 
		});
	}
	
	if ($('.featured-image-thumb').length){
		$('.featured-image-thumb').each(function(){
			//alert($(this).find('a img').height()+'+'+$(this).height());
			if ($(this).find('a img').height() < $(this).find('.hover_the_thumbs').height()){
				$(this).find('a img').css({'width':'auto', 'height':'100%'});
			}
		});		
	}

	
}

function monitorScrollTop(){

	var scrollTop = getScrollTop();
	
	//window.loadingPoint = parseInt(($(document).height() - $(window).height() - $('#footer').height() - 80),10);
	window.loadingPoint = parseInt(($('#pbd-alp-load-posts').offset().top - $(window).height() + 50),10);

	console.log(scrollTop +'+'+window.loadingPoint);
	
	if (scrollTop >= window.loadingPoint){
		clearInterval(window.interval);
		//alert(scrollTop);
		$('#pbd-alp-load-posts a').click();
	}

}

function getScrollTop(){
    if(typeof pageYOffset!= 'undefined'){
        //most browsers
        return pageYOffset;
    }
    else{
        var B= document.body; //IE 'quirks'
        var D= document.documentElement; //IE with doctype
        D= (D.clientHeight)? D: B;
        return D.scrollTop;
    }
}