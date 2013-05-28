$(document).ready(function(){
	
	if ($('.special_tabs').length){
		$('.special_tabs').each(function(){
			$(this).find('.tab-container').children().addClass("twelve columns");
		});
	}
	
	
	if ($('.service-item .designare_icon:not(img)').length){
			
		$('.service-item .designare_icon:not(img)').each(function(f){
			
			$(this).addClass('IErounderServices-'+f);
			var classYpslon = ".IErounderServices-"+f;
			
			DD_roundies.addRule(classYpslon, '50px');
			
			$(classYpslon).css('visibility','hidden');
			$(classYpslon).children('img').css('visibility','visible');
			
		});
		
	}
	
	if ($('.special_tabs > .tab-selector .designare_icon_special_tabs').length){
		
		$('.special_tabs > .tab-selector .designare_icon_special_tabs').each(function(e){
		
			$(this).addClass('IErounder-'+e);
			var classXis = ".IErounder-"+e;
		
			var imgUrl = $(this).attr('style').split('url(');
				imgUrl = imgUrl[1].split(') ');
				imgUrl = imgUrl[0];
				
			DD_roundies.addRule(classXis, '40px');
			$(this).append('<img src="'+imgUrl+'" style="padding: 12px;"/>');
			
		});
		
	} 
	
	/*
DD_roundies.addRule('.rounded', '5px');
	DD_roundies.addRule('.button', '3px');
*/
	
	
	if ($('.rounded').length){
		$('.rounded').each(function(){
			DD_roundies.addRule($(this),'5px');
		});
	}
	
	if ($('.button').length){
		$('.button').each(function(e){
			if (!$(this).parents('#slider_container').length){
				$(this).addClass('ierounder-'+e);
				$(this).css('filter','none');
				var ierounder = ".ierounder-"+e;
				DD_roundies.addRule(ierounder, '3px');
			}
		});
	}
		
	//DD_roundies.addRule('.button','3px');
	
	
	if (('iframe').length){
		$('iframe').attr('wmode','transparent');
	}
	
	if ($('.individual_ball').length){
		$('.individual_ball h2 .outer').remove();
		DD_roundies.addRule('.individual_ball h2 .centre', '116px');
		DD_roundies.addRule('.individual_ball h2 .inner', '116px');	
	}
	
	if ($('ul.ch-grid li a').length){
		$('ul.ch-grid li a').each(function(){
			$(this).unbind('mouseenter mouseleave');
			$(this).hover(function(){
				$(this).find('h3').stop().animate({'opacity':1},200);
			}, function(){
				$(this).find('h3').stop().animate({'opacity':0},200);
			})
		});
	}

});