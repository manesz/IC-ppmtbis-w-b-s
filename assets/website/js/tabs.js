function changeTab(obj){

	$(obj).siblings('li').each(function(){
		$(this).find('a').removeClass('current').css('color','#999').css('border-top','1px solid #DDD');
	});
	
	$(obj).find('a').addClass('current').css('color', $('#option_wrapper #color').val()).css('border-top','1px solid '+$('#option_wrapper #color').val());
	
	//Show/Hide divs
	var objidx = $(obj).index();
	
	$(obj).parents('div.panes').find('div').each(function(){
		$(this).css('display', 'none');
		$(this).css('opacity', 0);
	})
	$(obj).parents('div.panes').find('div').eq(objidx).css('display', 'block');
	$(obj).parents('div.panes').find('div').eq(objidx).animate({'opacity': 1},1000);
}

function changeAccord(obj){

	$(obj).parent().find('h2').each(function(){
		$(this).removeClass('current').css('color','#555');
	});
	
	$(obj).addClass('current').css('color',$('#option_wrapper #color').val());
	
	$(obj).siblings('div.pane').each(function(){
		if (!$(this).prev().hasClass('current')) {
			//$(this).animate({ 'max-height': 0, 'padding-bottom': 0, 'opacity': 0 }, 500);
			$(this).slideUp(500).animate({'padding-bottom': 0, 'opacity': 0}, 500, function(){
				$(obj).next().slideDown(500).animate({'padding-bottom': '20px', 'opacity': 1}, 500, function(){
					$(obj).next().css('display','block');
					if ($(this).parents('.special_tabs').length){
					
						if ($(this).parents('.special_tabs').find('.tab-container > .content.current').height()> $(this).parents('.special_tabs').find('.tab-selector').height())
							$(this).parents('.special_tabs').animate({'height': $(this).parents('.special_tabs').find('.tab-container > .content.current').height()}, 200, 'easeInOutExpo');
						else 
							$(this).parents('.special_tabs').animate({'height': $(this).parents('.special_tabs').find('.tab-selector').height()}, 200, 'easeInOutExpo');
						
					}
				});
			});
			
			/*
$(obj).next().slideDown( 500, function(){
				
			});
*/
		}
	});
}

function toggleTrigger(obj){
	/*
var theHeight = 'auto';
	if ( $(obj).parents('.shortcode-toggle').hasClass('closed') ){
		theHeight = parseInt($(obj).parent().siblings('.toggle-content').getHiddenDimensions().height) + 'px';
	}
*/
	//alert(theHeight);
	$(obj).parent().siblings('.toggle-content').slideToggle(1000, 'easeInOutExpo', function(){
		
		if ($(this).parents('.special_tabs').length){
				
			if ($(this).parents('.special_tabs').find('.tab-container > .content.current').height()> $(this).parents('.special_tabs').find('.tab-selector').height())
				$(this).parents('.special_tabs').animate({'height': $(this).parents('.special_tabs').find('.tab-container > .content.current').height()}, 200, 'easeInOutExpo');
			else 
				$(this).parents('.special_tabs').animate({'height': $(this).parents('.special_tabs').find('.tab-selector').height()}, 200, 'easeInOutExpo');
			
		}
		
	});
	
	/*
.animate({
		'height': theHeight
	}, {
		duration: 1000,
		easing: 'easeInOutExpo'
	});
*/
	
	if ($(obj).parents('.shortcode-toggle').hasClass('open')) {
		//close
		$(obj).parents('.shortcode-toggle').removeClass('open').addClass('closed');
		$(obj).html( $(obj).parents('.shortcode-toggle').find('#title_closed').val() );
	}
	else {
		//open
		$(obj).parents('.shortcode-toggle').addClass('open').removeClass('closed');
		$(obj).html( $(obj).parents('.shortcode-toggle').find('#title_open').val() );
	} 
	
}