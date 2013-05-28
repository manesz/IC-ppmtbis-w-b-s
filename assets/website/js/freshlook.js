$ = (jQuery);

$(window).resize(function(){

	checkMenu();
	/*
$('.camera_caption').css('top', $('.logo_and_menu').offset().top + $('.logo_and_menu').height() + 'px');
	if ($('#slider_container').length){
		if ($(window).width() < 1200){
			$('#white_content').css('margin-top', parseInt($('#slider_container .cameracurrent .camera_caption').height() - 46, 10) + 'px');
		} else {
			$('#white_content').css('margin-top', parseInt($('#slider_container .cameracurrent .camera_caption').height()-80 , 10)+ 'px');
		}	
	}
*/
	
});

function checkMenu(){
	
	if ($(window).width() < 980){
	
		$('#menulava a.selected').parents('li').last().css({
		  	'border-top': '3px solid white',
		  	'border-bottom': '3px solid '+$('#styleColor').html()
	  	});
	
		/*
$('header #menulava > li.current-menu-item, header #menulava > li.current-menu-ancestor').css({
		  	'border-top': '3px solid white',
		  	'border-bottom': '3px solid '+$('#styleColor').html()
	  	});
*/
	} else {
	
		$('#menulava a.selected').parents('li').last().css({
		  	'border-top': '3px solid '+$('#styleColor').html(),
		  	'border-bottom': '0px'
	  	});
	  		
		/*
$('header #menulava > li.current-menu-item, header #menulava > li.current-menu-ancestor').css({
		  	'border-top': '3px solid '+$('#styleColor').html(),
		  	'border-bottom': '0px'
	  	});
*/
	}
	
}



$(function(){

	if ($('#nav-below').length){
		$('#nav-below').children('div').each(function(){
			if ($(this).html().length < 1){
				$(this).css('display','none');
			}
		});		
	}	    
  
    
  //Generate Menu
	$('ul#menulava').supersubs({ 
      minWidth:    10,   // minimum width of sub-menus in em units 
      maxWidth:    22,   // maximum width of sub-menus in em units 
      extraWidth:  1     // extra width can ensure lines don't sometimes turn over 
                         // due to slight rounding differences and font-family 
  }).superfish({ 
      animation: {height:'show'},   // slide-down effect without fade-in 
      delay:     0,               // 1.2 second delay on mouseout 
      disableHI: true
  });
    
 $("header #menulava > li > a").each(function(){
 
 $( ".dropdown-menu" ).change(
      function() { 
      	if($(this).find("option:selected").val() != "")
          window.location = $(this).find("option:selected").val();
      }
  );

   
   $(this).find('span').eq($(this).find('span').length - 1).after($(this).children('p'));

 });
 
 

 
});

$(window).load(function(){

	if ($('.imgloader').length){
		$('.imgloader').each(function(){
			$(this).animate({opacity: 0}, 500, function(){
				$(this).remove();
			});
			$(this).siblings('img').animate({opacity: 1}, 500);
		});
	}
	
	if ($('.rp_style1_img').length){
		$('.rp_style1_img').each(function(){
			if ($(this).height() < $(this).parents('ul').siblings('.magnifier').height()){
				$(this).css({'width':'auto', 'height':'100%'}).addClass('altered');
			}
		});
	}

});

function loadImages(){
	/* images loader*/
	$('#white_content img').each(function(){
	
			/*nao aplicavel nestas condições*/
		if (
			!$(this).hasClass('loaded') &&
			!$(this).parents('.flexslider').length &&
			!$(this).siblings('.da-animate').length &&
			!$(this).hasClass('icon') &&
			!$(this).hasClass('designare_icon') &&
			!$(this).hasClass('img_thumb') &&
			!$(this).parent('a').parent('.post-thumb').length  &&
			!$(this).parents('.icons_container').length &&
			!$(this).parents('.hover_the_thumbs').length &&
			!$(this).parents('.camera_caption').length
		){
		
			$laimage = $(this);
			$(this).animate({opacity: 0}, 1);
			$(this).before('<div class="imgloader" />');
			
			
			if ($(this).parents('.featured-image-thumb').length){
				var height = 0;
				
				if ($(this).parents('.slides-item').length) height = "100%";
				else height = $(this).parents('.featured-image-thumb').height()+'px';
				
				
				$(this).siblings('.imgloader').css({
					'position':'absolute',
					'top': '0px',
					'left':'0px',
					'width':'100%',
					'height': height,
					'background': 'url('+$('#templatepath').html()+'img/ajx_loading.gif) no-repeat center center',
					'opacity': 1,
					'z-index': 9
				});	
			}
			
			if ($(this).parents('.entry-content').length){
				$laimage = $(this);
				$(this).siblings('.imgloader').css({
					'position':'absolute',
					'top': '0px',
					'left':'0px',
					'width':'100%',
					'height': $laimage.height(),
					'background': 'url('+$('#templatepath').html()+'img/ajx_loading.gif) no-repeat center center',
					'opacity': 1,
					'z-index': 9
				});
			}
			
			$(this).load(function(){
				$(this).siblings('.imgloader').animate({opacity: 0}, 500, function(){
					$(this).remove();
				});
				$(this).animate({opacity: 1}, 1000, function(){
					$(this).addClass('loaded');
				});
			});

		}
			
	});
}

function randomXToY(minVal,maxVal,floatVal)
{
  var randVal = minVal+(Math.random()*(maxVal-minVal));
  return typeof floatVal=='undefined'?Math.round(randVal):randVal.toFixed(floatVal);
}


function animateElement($el, type, animation){
	
	var delay = 0;
	switch (type){
		case "title": delay = 0; speedTrans = randomXToY(500,1500) ; break;
		case "text": delay = 300;  speedTrans = randomXToY(500,1500); break;
		case "image": delay = 300;  speedTrans = randomXToY(500,1500); break;
		case "button": delay = 900;  speedTrans = randomXToY(500,1500); break;
	}
	
	switch (animation){
		case "des_moveFromTop": 
			$el
				.css({'opacity':0, 'top':'-100%'})
				.delay(delay)
				.animate({ 'opacity': 1, 'top': '0px' },speedTrans, 'easeInOutExpo');
			break;
		case "des_moveFromBottom": 
			$el
				.css({'opacity':0, 'bottom':'-100%'})
				.delay(delay)
				.animate({ 'opacity': 1, 'bottom': '0px' },speedTrans, 'easeInOutExpo');
			break;
		case "des_moveFromLeft": 
			if (type == "text"){
				$el
					.css({'opacity':0, 'margin-left':'-100%'})
					.delay(delay)
					.animate({ 'opacity': 1, 'margin-left': '0px' },speedTrans, 'easeInOutExpo');
			} else {
				$el
					.css({'opacity':0, 'left':'-100%'})
					.delay(delay)
					.animate({ 'opacity': 1, 'left': '0px' },speedTrans, 'easeInOutExpo');	
			}
			break;
		case "des_moveFromRight": 
			if (type == "text"){
				$el
					.css({'opacity':0, 'margin-right':'-100%'})
					.delay(delay)
					.animate({ 'opacity': 1, 'margin-right': '0px' },speedTrans, 'easeInOutExpo');
			} else {
				$el
					.css({'opacity':0, 'right':'-100%'})
					.delay(delay)
					.animate({ 'opacity': 1, 'right': '0px' },speedTrans, 'easeInOutExpo');	
			}
			break;
		case "des_fade":
			$el
				.css({'opacity':0})
				.delay(delay)
				.animate({ 'opacity': 1},1500, 'easeInOutExpo');
			break;
	}
	
	
}

$(document).ready(function(){

	if (window.BrowserDetect.browser == "iPhone")
		$('.acc-substitute .pane p, #accordion .pane p').css({ 'font-size': '11px' });

	//THE BEAUTIFUL PREVIEW
	/* UNCOMMENT TO DISPLAY THE COLORPICKER */
	//$('#colorpicker').farbtastic('#color');
	
	onColorChange($('#styleColor').html());

	$(".option_btn").click(function(){
		if($("#option_wrapper").css("left")!="0px"){
			$("#option_wrapper").animate({left:"0px"},{duration:300});
			$(this).animate({left:"200px"},{duration:300});
			$(this).removeClass("settings-close").addClass("settings-open");
		}else{
			$("#option_wrapper").animate({left:"-230px"},{duration:300});
			$(".option_btn").animate({left:"0"},{duration:300});
			$(this).removeClass("settings-open").addClass("settings-close");
		}
	});

	if ($('#bodyLayoutType').html() == "boxed"){
	
		/*move elements around*/
		$('.fullwidth-container').prependTo('#white_content:not(.contacts)');
		$('#slider_container').prependTo('#white_content:not(.contacts)');
		//$('.cameracontrols').prependTo('#wrapper');
		$('#wrapper .cameracontrols').css('z-index','99');
		$('#slider_container .cameracontrols').css('display','none');
		$('#header_bg').prependTo('#white_content:not(.contacts)');
		$('.header_container').prependTo('#white_content:not(.contacts)');
		$('#big_footer').appendTo('#white_content:not(.contacts)');
		$('#map').prependTo('#white_content:not(.contacts) > #wrapper');
		$('#map').css('top','0px');
		$('#white_content').css({'margin':'20px auto', 'box-shadow':'rgb(81, 81, 81) 0 0 30px'});
		$('#white_content').append('<div class="clear" />');
		
		
		var bodyBoxedType = $('#bodyBoxedType').attr('class');

		switch (bodyBoxedType){
			case "color":  $('.everything').css('background', $('#bodyBoxedType').html()); break;
			case "image": $('.everything').css({
				'background-repeat':'no-repeat',
				'background-position':'center center',
				'-o-background-size':'100% 100%, auto',
				'-moz-background-size':'100% 100%, auto',
				'-webkit-background-size':'100% 100%, auto',
				'background-size':'100% 100%, auto',
				'background':'url('+$('#bodyBoxedType').html()+') no-repeat fixed',
				'background-size':'100% 100%'
			});
				break;
			case "pattern": $('body').css('background', 'url('+ $('#bodyBoxedType').html() +') 0 0 repeat fixed');
				break;
		} 
	
	}
	
	if ($('.info_above_menu').length){
		if ($('#bodyLayoutType').html() == "boxed")
			$('.info_above_menu').prependTo('#white_content:not(.contacts)').css('opacity',1);
		else 
			$('.info_above_menu').prependTo('.everything').css('opacity',1);
	}

	checkMenu();

	$('a.flex_this_thumb, a.pp-link').prettyPhoto({social_tools:''});
	
	var styleColor = $("#styleColor").html(); 
	for (var idx = 0; idx < $('header #menulava > li').length; idx++){
		
		if ($('header #menulava > li').eq(idx).find('.sub-menu').length){
			
			$('header #menulava > li').eq(idx).hover(function(){
				$(this).css("border-bottom", "3px solid "+styleColor);
			}, function(){
				$(this).css("border-bottom", "3px solid transparent");
			});
		}
	}

	/* images loader*/
	loadImages();

	if ($('.flexslider').length){
		$('.flexslider').css('overflow','hidden');
	}
	
	if($("#map").length > 0)
		initializeMaps();
	
	$('#map a').each(function(){
		$(this).hover(function(){
			$(this).find('.maphover').stop().animate({opacity: .6}, 300);
			$(this).find('.mapzoom').stop().animate({opacity: 1}, 300);
		}, function(){
			$(this).find('.maphover').stop().animate({opacity: 0}, 300);
			$(this).find('.mapzoom').stop().animate({opacity: 0}, 300);
		});
	});
	
	
  //Testemonials
  if($('body').find('#testimonials2').length > 0){
		$('body').find('#testimonials2').each(function(e){
			$(this).addClass('testi-'+e);
			var thisClass = ".testi-"+e;
			var $obj = $(thisClass);
			
			$obj
				.before('<div id="navT-'+e+'" class="navT">')
				.cycle({
			        fx: 'scrollUp', // choose your transition type, ex: fade, scrollUp, scrollRight, shuffle
					pager:  '#navT-'+e,
					fit: 1,
					width: '97.5%',
					after: function(currSlideElement){
						$('#navT-'+e+' a').css('background','#CCC');
						$('#navT-'+e+' .activeSlide').css('background',$('#option_wrapper #color').val());
						if (window.BrowserDetect.browser == "Explorer" && window.BrowserDetect.version == 8){
							currSlideElement.style.backgroundColor = "transparent";
						}
					},
					before: function(nextSlideElement){
						if (window.BrowserDetect.browser == "Explorer" && window.BrowserDetect.version == 8){
							nextSlideElement.style.backgroundColor = "transparent";
						}
					}
				});
				

		});
				
		
		$('#testimonials2').siblings('#navT').find('a').each(function(){ $(this).attr('href','javascript:;'); });
		
		$('#testimonials2').mouseover(function() {
		   $('#testimonials2').cycle('pause');
		});
		
		$('#testimonials2').mouseout(function() {
		   $('#testimonials2').cycle('resume');
		});
	}
	
	$(".tabs").tabs(".panes > div", {effect: "fade"});

	/*recent posts slider*/
	if($('.recentPosts .flexslider').length){
		$('.recentPosts .flexslider').each(function(){
			var flexwho = $(this).attr('id').toString();
			$('#'+flexwho).flexslider({
				controlNav: false,
				directionNav: true
			});
		});
	}
						
	/* search widget top */
	if ($('.search_toggler')){
		$('.search_toggler').each(function(){
			$(this)
				.unbind('click')
				.bind('click', function(){
					if ($(this).siblings('#s').hasClass('search_close')){
						$(this).siblings('#s').toggleClass('search_close');
						$(this).parents('#searchform').removeClass('ie_searcher_close').addClass('ie_searcher_open');
						$(this).siblings('#s').trigger('focus');
					} else {
						if ($(this).siblings('#s').val() == $(this).siblings('.search_box_text').html()){
							$(this).siblings('#s').toggleClass('search_close');
							$(this).parents('#searchform').removeClass('ie_searcher_open').addClass('ie_searcher_close');
						} else {
							$(this).siblings('#searchsubmit').trigger('click');
						}
					}
				});
		});	
	}
	
	/* social icons hover */
	if ($('.social_container')){
		$('.social_container').each(function(){
			$el = $(this);
			$(this)
				.unbind('mouseenter mouseleave')
				.hover(function(){
					$(this).stop().animate({
						'width': $(this).width() + $(this).children('.description').width() + 13 + 'px'
					}, 300, 'jswing');
				}, function(){
					$(this).stop().animate({'width':'27px'}, 300, 'jswing');
				});
			$(this).trigger('mouseenter').trigger('mouseleave');
		});
		$('#header .social').css('display','block');	
		$('#header .social, .search_top .search_toggler').delay(1000).animate({ 'opacity':1 }, 500);
		$('.search-top #s').delay(1000).animate({'opacity':0},500)
	}
	
	
	/*special tabs stuff*/
	if ($('.special_tabs').length){
	
		$('.special_tabs').each(function(){
		
			$el = $(this);
			
			$el.children("p").remove();

			$el.append('<div class="tab-selector four columns" />');
			$el.find('.label').appendTo($el.children('.tab-selector'));
			$el.append('<div class="tab-container eight columns" />');
			$el.find('.content').appendTo($el.children('.tab-container'));
			
			$el.find('.tab-selector > .label').eq(0).addClass('current').prepend('<span class="shadowtabstop"/><span class="shadowtabsbottom"/>');
			$el.find('.tab-selector > .label').eq(0).children('.designare_icon_special_tabs').css({'background-color': $('#styleColor').html()});
			$el.find('.tab-container > .content').eq(0).addClass('current').css({
				'opacity':1,
				'top':'0%'
			});
			if ($el.find('.tab-container > .content').eq(0).height() > $el.find('.tab-selector').height())
				$el.animate({'height': $el.find('.tab-container > .content').eq(0).height()}, 200, 'easeInOutExpo');
			//else $(this).parents('.special_tabs').animate({'height': $(this).parents('.tab-selector').height()}, 200, 'easeInOutExpo');
			for ( var i = 1; i < $el.find('.tab-container > .content').length; i++){
				$el.find('.tab-container > .content').eq(i).css({
					'position':'absolute',
					'top':'100%',
					'opacity':0
				});
			}
			
			
			$el.find('.tab-selector > .label').each(function(){
				
				$(this).click(function(){
					if (!$(this).hasClass('current')){
						var randid = $(this).attr('class').split(" ");
							randid = randid[1].toString();		
						$nextEl = $el.find('.tab-container > .content.'+randid);
						if ($nextEl.height() > $(this).parents('.tab-selector').height())
							$(this).parents('.special_tabs').animate({'height': $nextEl.height()}, 200, 'easeInOutExpo');
						else 
							$(this).parents('.special_tabs').animate({'height': $(this).parents('.tab-selector').height()}, 200, 'easeInOutExpo');
						$current = $el.find('.tab-container > .content.current');
						var id = $current.attr('class').split(" ");
							id = id[1];
						$current.animate({
							'top': '-100%',
							'opacity': 0
						}, 200, 'easeInOutExpo', function(){ 
							$current.css({'top':'100%', 'opacity':0}).removeClass('current'); 
							$el.find('.tab-selector > .label.'+id).children('.designare_icon_special_tabs').css({'background-color':'#666'});
							$el.find('.tab-selector > .label.'+id).removeClass('current');
							$el.find('.tab-selector > .label.'+id).children('.shadowtabstop').remove();
							$el.find('.tab-selector > .label.'+id).children('.shadowtabsbottom').remove();
							delete $current; 
						});
						$el.find('.tab-selector > .label.'+randid).children('.designare_icon_special_tabs').css({'background-color': $('#styleColor').html() });
						$el.find('.tab-selector > .label.'+randid).addClass('current').prepend('<span class="shadowtabstop"/><span class="shadowtabsbottom"/>');
						$el.find('.tab-selector > label.'+randid+' .tab_title').css('color', $('#styleColor').html());
						$el.find('.tab-container > .content.'+randid).addClass('current').animate({ 'top': '0%', 'opacity':1 },200, 'easeInOutExpo', function(){
							
							if (
								$(this).find('.shortcode-toggle').length ||
								$(this).find('.services-graph').length
							){
								$(this).css({
									'max-width':'70%',
									'width':'100%'
								});
							} else {
								$(this).css({
									'max-width':'',
									'width':''
								});
							}
						
							if ($(this).find('.services-graph').length){
								var id = $(this).find('.services-graph').attr('id');
								sliding_horizontal_graph(id,3000);
							}
							
							if (window.BrowserDetect.browser == "Explorer" && window.BrowserDetect.version == 8){
								if ($(this).find('.recent_testimonials').length){
									$(this).css('width','100%');
								}
							}
							
						});
					}		
				});
				
			});
			
		});
	}
	
	
});


/* Open Latest Project */
function openlProject(id, cid, type, style){
	$("#lastprojects-"+cid).find(".project_open").html("<div class='theLoading'><center><img src='"+$('#templatepath').html() + "img/ajx_loading.gif'></center></div>");
	
	var b = {
	    pid: id,
	    type: type,
	    randid: cid,
	    button_style: style
	};
	
  $.ajax({
    url: $("#templatepath").html() + "js/getProject.php",
    dataType: "json",
    type: "POST",
    data: b,
    cache: false,
    success: function (b, c, d) {
        if (b.response.error) {
            if (b.response.error == 1) {
                var e = b.response.content;
                
                $("#lastprojects-"+cid+" .project_open").html("").css("opacity", 0);
                $("#lastprojects-"+cid+" .project_open").html(e).text();
                $("#lastprojects-"+cid+" .project_open").html(htmlDecode($("#lastprojects-"+cid+" .project_open").html())); 
                $("#lastprojects-"+cid+" .project_open").animate({'opacity':1}, 1000);
                
                $("#p-slider-"+cid).flexslider({
                	animation: "slide",
                	slideDirection: "vertical",
                	directionNav: true,
                	slideshowSpeed: 6500,
                	controlsContainer: ".flex-container",
                	pauseOnAction: false,
                	pauseOnHover: true,
                	keyboardNav: false,
                	controlNav: true
                });   
                
                if(type=='video_collection'){
                	$("#lastprojects-"+cid + " #the_movies").html("<iframe src='"+$("#lastprojects-"+cid + " .v_links").eq(0).html()+"' width='100%' height='370' frameborder='0' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>");
                	
                	if (b.response.total > 1){
                		$('.project_images #the_movies').siblings('.movies-nav').remove();
                  	$('.project_images #the_movies').after('<ul class="flex-direction-nav movies-nav"><li><a class="prev" href="javascript:;">Previous</a></li><li><a class="next" href="javascript:;">Next</a></li></ul>');
                		
                		
                		$('.project_images #the_movies').siblings('.current_movie').remove();
                		$('.project_images #the_movies').after('<div style="display:none;" class="current_movie">0</div>');
                		
                		$('.movies-nav').find('.prev').click(function(e){
                			e.preventDefault();
                			var index = parseInt($('.current_movie').html());
                			var nextIndex = 0;
                			if (index == 0) nextIndex = $('.project_images #the_movies').siblings('.v_links').length - 1;
                			else nextIndex = index-1;
                			$("#lastprojects-"+cid + " #the_movies iframe").attr('src', $('.project_images #the_movies').siblings('.v_links').eq(nextIndex).html() );
                			$('.project_images #the_movies').siblings('.current_movie').html(nextIndex);
                			
                		});
                		$('.movies-nav').find('.next').click(function(e){
                			e.preventDefault();
                			var index = parseInt($('.current_movie').html());
                			var nextIndex = 0;
                			if (index == $('.project_images #the_movies').siblings('.v_links').length - 1) nextIndex = 0;
                			else nextIndex = index+1;
                			$("#lastprojects-"+cid + " #the_movies iframe").attr('src', $('.project_images #the_movies').siblings('.v_links').eq(nextIndex).html() );
                			$('.project_images #the_movies').siblings('.current_movie').html(nextIndex);

                		});
                		
                	}
                	
                	
                }

            } else {
                alert("An unexpected error occurred. Please try again.")
            }
        } else {
            alert("An unexpected error occurred. Please try again.")
        }
    },
    error: function (a, b, c) {
        alert("An error occurred while trying to connect with the server.");
    }
})


}

/***************************************************
                  SLIDING GRAPH
***************************************************/
function isScrolledIntoView(id)
{
    var elem = "#" + id;
    var docViewTop = $(window).scrollTop();
    var docViewBottom = docViewTop + $(window).height();

    if ($(elem).length > 0){
        var elemTop = $(elem).offset().top;
        var elemBottom = elemTop + $(elem).height();
    }

    return ((elemBottom >= docViewTop) && (elemTop <= docViewBottom)
      && (elemBottom <= docViewBottom) &&  (elemTop >= docViewTop) );
}



function sliding_horizontal_graph(id, speed){
    $("#" + id + " li span").each(function(i){
        var j = i + 1;                                           
        var cur_li = $("#" + id + " li:nth-child(" + j + ") span");
        var w = cur_li.attr("title");
        cur_li.animate({width: w + "%"}, speed);
    })
}

function graph_init(id, speed){
    $(window).scroll(function(){
        if (isScrolledIntoView(id)){
            sliding_horizontal_graph(id, speed);
        }
        else{
            //$("#" + id + " li span").css("width", "0");
        }
    })
    
    if (isScrolledIntoView(id)){
        sliding_horizontal_graph(id, speed);
    }
}

function htmlDecode(a) {
    var b = $("<div/>").html(a).text();
    return b
}

function playpause($el){
	if ($el.hasClass('playing')){
		$('#slider_container').cameraResume();
		$el.removeClass('playing').addClass('paused');
	} else {
		$('#slider_container').cameraPause();
		$el.removeClass('paused').addClass('playing');
	}
}

/******************************************************************************************************************
	
	 FreshLook - Quicksand Function
	
	******************************************************************************************************************/

function quicksandstart(obj){
(function($) {
	$.fn.sorted = function(customOptions) {
		var options = {
			reversed: false,
			by: function(a) {
				return a.text();
			}
		};
		$.extend(options, customOptions);
	
		$data = $(this);
		arr = $data.get();
		arr.sort(function(a, b) {
			
		   	var valA = options.by($(a));
		   	var valB = options.by($(b));
			if (options.reversed) {
				return (valA < valB) ? 1 : (valA > valB) ? -1 : 0;				
			} else {		
				return (valA < valB) ? -1 : (valA > valB) ? 1 : 0;	
			}
		});
		return $(arr);
	};

})(jQuery);

$(function() {

	var read_button = function(class_names) {
    var r = {
      selected: false,
      type: 0
    };
    for (var i=0; i < class_names.length; i++) {
      if (class_names[i].indexOf('selected-') == 0) {
        r.selected = true;
      }
      if (class_names[i].indexOf('segment-') == 0) {
        r.segment = class_names[i].split('-')[1];
      }
    };
    return r;
  };
  
  var determine_sort = function($buttons) {
    var $selected = $buttons.parent().filter('[class*="selected-"]');
    return $selected.find('a').attr('data-value');
  };
  
  var determine_kind = function($buttons) {
    var $selected = $buttons.parent().filter('[class*="selected-"]');
    return $selected.find('a').attr('data-value');
  };
  
  var $preferences = {
    duration: 800,
    easing: 'easeInOutQuad',
    adjustHeight: 'auto'
  };
  
  var $list = $('#'+obj+' .proj_list');
  var $data = $list.clone();
  
  var $controls = $('#'+obj+' ul.splitter');
  
  $controls.each(function(i) {
  
    
    var $control = $(this);
    var $buttons = $control.find('a');
    
    $buttons.bind('click', function(e) {
        	
      var $button = $(this);
      var $button_container = $button.parent();
      var button_properties = read_button($button_container.attr('class').split(' '));      
      var selected = button_properties.selected;
      var button_segment = button_properties.segment;

      if (!selected) {

        $buttons.parent().removeClass('selected-0').removeClass('selected-1').removeClass('selected-2');
        $button_container.addClass('selected-' + button_segment);
        
        var sorting_type = determine_sort($controls.eq(1).find('a'));
        var sorting_kind = determine_kind($controls.eq(0).find('a'));
        
        if (sorting_kind == 'all') {
          var $filtered_data = $data.find('li.view');
        } else {
          var $filtered_data = $data.find('li.' + sorting_kind);
        }
        
        if (sorting_type == 'size') {
          var $sorted_data = $filtered_data.sorted({
            by: function(v) {
              return parseFloat($(v).find('span').text());
            }
          });
        } else {
          var $sorted_data = $filtered_data.sorted({
            by: function(v) {
              return $(v).find('strong').text().toLowerCase();
            }
          });
        }
                
        $list.quicksand($sorted_data, $preferences, function(){
	        $('#projects-1 .da-thumbs > li').hoverdir();
	        if ($('.imgloader').length){
						$('.imgloader').each(function(){
							$(this).animate({opacity: 0}, 500, function(){
								$(this).remove();
							});
							$(this).siblings('img').animate({opacity: 1}, 500);
						});
					}

				onColorChange($('#color').attr('value'));
				thumbnailsBehavior();

        });
                
      }
      
      
      
      e.preventDefault();

    });
    
  }); 
});
}

function clickThumbsOverlay(obj){

//$('a.img-link').prettyPhoto({deeplinking: false, show_title: false, social_tools: '', theme: 'pp_default'});

/* PROJECTS - OPEN MORE INFO */
$("#"+obj+" .projectCategories").find("a").click(function (event) {
		
    var p_cat = $(this).attr("data-value");
    
    $("#"+obj+" .projectCategories").find("li.termCat").each(function(){
    	$(this).removeClass('selected-1');
    })
    
    $(this).parent("li.termCat").addClass('selected-1');    
    
    $("#"+obj+" .proj_list_overlay > li").each(function(e){
    	if(p_cat == "all"){
    		$(this).stop().animate({opacity: 1}, 1000);
    		if (window.BrowserDetect.browser == "Explorer" && window.BrowserDetect.version == 8){
    			$("#"+obj+" .proj_list_overlay li").eq(e).find('img').animate({'opacity':1}, 1000);
    			$("#"+obj+" .proj_list_overlay li").eq(e).find('.mask').css({'visibility':'visible'});
    		}
    	} else {
    		if($(this).hasClass(p_cat)){
    			$(this).stop().animate({opacity: 1}, 1000);
    			if (window.BrowserDetect.browser == "Explorer" && window.BrowserDetect.version == 8){
    				$("#"+obj+" .proj_list_overlay li").eq(e).find('img').animate({'opacity':1}, 1000);
    				$("#"+obj+" .proj_list_overlay li").eq(e).find('.mask').css({'visibility':'visible'});
    			}

    		} else {
    			$(this).stop().animate({opacity: 0.1}, 1000);
    			if (window.BrowserDetect.browser == "Explorer" && window.BrowserDetect.version == 8){
	    			$("#"+obj+" .proj_list_overlay li").eq(e).find('img').animate({'opacity':.1}, 1000);
	    			$("#"+obj+" .proj_list_overlay li").eq(e).find('.mask').css({'visibility':'hidden'});
	    		}

    		}
    	}
    });
  });

}


var BrowserDetect = {
    init: function () {
        this.browser = this.searchString(this.dataBrowser) || "An unknown browser";
        this.version = this.searchVersion(navigator.userAgent) || this.searchVersion(navigator.appVersion) || "an unknown version";
        this.OS = this.searchString(this.dataOS) || "an unknown OS"
    },
    searchString: function (a) {
        for (var b = 0; b < a.length; b++) {
            var c = a[b].string;
            var d = a[b].prop;
            this.versionSearchString = a[b].versionSearch || a[b].identity;
            if (c) {
                if (c.indexOf(a[b].subString) != -1) return a[b].identity
            } else if (d) return a[b].identity
        }
    },
    searchVersion: function (a) {
        var b = a.indexOf(this.versionSearchString);
        if (b == -1) return;
        return parseFloat(a.substring(b + this.versionSearchString.length + 1))
    },
    dataBrowser: [{
        string: navigator.userAgent,
        subString: "Chrome",
        identity: "Chrome"
    }, {
        string: navigator.userAgent,
        subString: "OmniWeb",
        versionSearch: "OmniWeb/",
        identity: "OmniWeb"
    }, {
        string: navigator.vendor,
        subString: "Apple",
        identity: "Safari",
        versionSearch: "Version"
    }, {
        prop: window.opera,
        identity: "Opera",
        versionSearch: "Version"
    }, {
        string: navigator.vendor,
        subString: "iCab",
        identity: "iCab"
    }, {
        string: navigator.vendor,
        subString: "KDE",
        identity: "Konqueror"
    }, {
        string: navigator.userAgent,
        subString: "Firefox",
        identity: "Firefox"
    }, {
        string: navigator.vendor,
        subString: "Camino",
        identity: "Camino"
    }, {
        string: navigator.userAgent,
        subString: "Netscape",
        identity: "Netscape"
    }, {
        string: navigator.userAgent,
        subString: "MSIE",
        identity: "Explorer",
        versionSearch: "MSIE"
    }, {
        string: navigator.userAgent,
        subString: "Gecko",
        identity: "Mozilla",
        versionSearch: "rv"
    }, {
        string: navigator.userAgent,
        subString: "Mozilla",
        identity: "Netscape",
        versionSearch: "Mozilla"
    }],
    dataOS: [{
        string: navigator.platform,
        subString: "Win",
        identity: "Windows"
    }, {
        string: navigator.platform,
        subString: "Mac",
        identity: "Mac"
    }, {
        string: navigator.userAgent,
        subString: "iPhone",
        identity: "iPhone/iPod"
    }, {
        string: navigator.platform,
        subString: "Linux",
        identity: "Linux"
    }]
};
BrowserDetect.init();


function initializeMaps(){
	            
  var latlng = new google.maps.LatLng($('#gm_lat').val(), $('#gm_lng').val());
	var myOptions = {
	  scrollwheel: false,
	  zoom: 15,
	  center: latlng,
	  mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	if(document.getElementById('map'))
		var map = new google.maps.Map(document.getElementById('map'), myOptions);
	
	// Creating a marker and positioning it on the map
	var marker = new google.maps.Marker({
	  position: new google.maps.LatLng($('#gm_lat').val(), $('#gm_lng').val()),
	  map: map
	});
	
	google.maps.event.addListener(map, "tilesloaded", function(){
		$('#map').find('.gmnoprint').eq(0).remove();
		google.maps.event.clearInstanceListeners(map);
	}, true);
	
	$('.mapelas').each(function(){
		
		var g_map = $(this).attr('id');
		var latlng = new google.maps.LatLng($(this).siblings('#gm_lat').val(), $(this).siblings('#gm_lng').val());
		var myOptions = {
		  scrollwheel: false,
		  zoom: 15,
		  center: latlng,
		  mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		if(document.getElementById(g_map))
			var g_map = new google.maps.Map(document.getElementById(g_map), myOptions);
		
		// Creating a marker and positioning it on the map
		var marker = new google.maps.Marker({
		  position: new google.maps.LatLng($(this).siblings('#gm_lat').val(), $(this).siblings('#gm_lng').val()),
		  map: g_map
		});
		
		google.maps.event.addListener(g_map, "tilesloaded", function(){
			$(this).find('.gmnoprint').eq(0).remove();
			google.maps.event.clearInstanceListeners(g_map);
		}, true);
		
	});

}

function onColorChange(color){

	$('#option_wrapper #color').attr('value', $('#styleColor').html());

	$('.post_type, p.designare_icon, .camera_next:hover span').css('background-color',' ');
	$('.post_type, p.designare_icon, .camera_next:hover span, .pricing_tab.highlight .title, .shortcode-toggle.open a').css("background-color",color);
	
	$('.camera-controls-toggler').css({'background':' ', 'border-bottom': ' '});
	$('.camera-controls-toggler').css({'background': $.xcolor.lighten(color) , 'border-bottom': '3px solid '+color});
	
	$('.cameraholder, .sf-menu li li.sfHover, .page_title_s2 .overlay_sep, .page_title_s3 .overlay_sep, #tweet_scroll_place, #navT .activeSlide').css('background', ' ');
	$('.cameraholder, .sf-menu li li.sfHover, .page_title_s2 .overlay_sep, .page_title_s3 .overlay_sep, #tweet_scroll_place, #navT .activeSlide').css('background', color );
	
	
	$('.cameraholder .vert-sep').css('background', ' ');
	$('.cameraholder .vert-sep').css('background', $.xcolor.darken(color));
	
	$('.color_logo, header #menulava > li.current-menu-item > a, #accordion h2.current, header #menulava > li.current-menu-ancestor > a, .shortcode-team .team-box h5, .acc-substitute h2.current, #tabs ul.tabs li a:hover, #tabs ul.tabs li a.current,  a.button.none:hover').css('color',color);
	
	var linksColor = color;
	if ($('#freshlook_links_color_hover').html() != "") linksColor = "#"+$('#freshlook_links_color_hover').html();
	
	$('.entry-breadcrumb a:hover, .blogarchive .post .the_title a:hover, .blogarchive .post .readmore a:hover, #footer_content .widget_links li a:hover, #footer_content .widget_categories li a:hover, #secondary .widget_links li a:hover, #secondary .widget_categories li a:hover, .recentposts_listing a.the_title:hover, #footer_content #recentPostsSidebar_widget .recentposts_listing a.the_title:hover, #footer_content #recentPostsSidebar_widget .recentposts_listing a.the_title:hover, #twitter_update_list li a:hover,.recentPosts .post .title_date .title a:hover,.blogarchive .post a.readmore:hover, .widget_pages li a:hover, .rc-container a:hover').css('color',linksColor)
	
	$('header #menulava > li.current-menu-item, header #menulava > li.current-menu-ancestor').css('border-top', '3px solid '+color);
	
	for (var idx = 0; idx < $('header #menulava > li').length; idx++){
		
		if ($('header #menulava > li').eq(idx).find('.sub-menu').length){
			
			$('header #menulava > li').eq(idx).hover(function(){
				$(this).css("border-bottom", "3px solid "+color);
			}, function(){
				$(this).css("border-bottom", "3px solid transparent");
			});
		}
	}
	
	$('ul.tabs li a.current').css('border-top', '1px solid '+color);
	
	$('.services-graph li span, .filterby .projectCategories li a:hover, .filterby .projectCategories li.active a').css('background', color);
	
	$('.socialdiv a[title]').removeAttr('style').css('background', ' ');
	$("<style type='text/css'> .socialdiv a[title]:hover:after{background: "+color+" !important;} ul.splitter li:not(.active) a{background: #333 !important;} ul.splitter li.active a{background: "+color+" !important;} ul.splitter li:hover a{background: "+color+" !important;} </style>").appendTo("head");
	
	$('.sf-menu li li').hover(function(){
		$(this).css('background',color);
	}, function(){
		$(this).css('background','white');
	});
	
	$('.magnify_this_thumb, .hyperlink_this_thumb').removeAttr('onmouseover onmouseout').unbind('hover').hover(function(){
		$(this).css('background',color); 
	}, function(){
		$(this).css('background','white');
	});
	
	
	$('.camera_next, .camera_prev').hover(function(){
		$(this).find('span').css("background-color",color);
	}, function(){
		$(this).find('span').css("background-color",'#999');
	});
	
	$('.jcarousel-prev-horizontal, .jcarousel-next-horizontal').hover(function(){
		$(this).css('background-color', color);
	}, function(){
		$(this).css('background-color', '#333');
	});

	$('#flickr li').each(function(){
		$(this).hover(function(){
			$(this).css('border','3px solid '+color);
		}, function(){
			$(this).css('border','3px solid #EDEDED');
		});
	});
	
	
	
	$('.sf-menu li li a').hover(function(){
		$(this).css('color','#FFF');
	}, function(){
		$(this).css('color','#666');
	});
	
	if ($('.post-thumb').length){
	
		if ($('.post-thumb').parents('#projects-1').length){
		
			$('.icons_container > div').each(function(){
				$(this).hover(function(){
					$(this).css('background',color);
				}, function(){
					$(this).css('background','white');
				});
			});
			
			$('.post-thumb').removeAttr('onmouseover onmouseout').hover(function(){
		
				var lefty_icons = "";
				var lefty_margin = "";
				if ($(this).hasClass('eight')) {
					lefty_icons = "45px";
					lefty_margin = "50px";
				}
				if ($(this).hasClass('one-third')) {
					lefty_icons = "30px";
					lefty_margin = "35px";	
				}
				if ($(this).hasClass('four')) {
					lefty_icons = "20px";
					lefty_margin = "25px";	
				}
			
				$(this).find('.hover_the_thumbs').css('background-color','rgba(0, 0, 0, 0.6)');
				$(this).find('.icons_container > div').eq(0).css('left', lefty_icons).css('opacity',1);
				$(this).find('.icons_container > div').eq(1).css('margin-left', lefty_margin).css('opacity',1);
			}, function(){
				$(this).find('.hover_the_thumbs').css('background-color','rgba(0, 0, 0, 0)');
				$(this).find('.icons_container > div').eq(0).css('left', '-15%').css('opacity',0);
				$(this).find('.icons_container > div').eq(1).css('margin-left', '105%').css('opacity',0);
			});
			$('.post-thumb:hover > div').css('background-color', color+' !important');	
			
		}
		
		else {
		
			if ($('.post-thumb').parents('.project_list_s4').length){
				
			} else {
				$('.post-thumb').removeAttr('onmouseover onmouseout').hover(function(){
					var lefty = "";
					if ($(this).parent('.eight.columns').length) lefty = "43%";
					if ($(this).parent('.one-third.column').length) lefty = "38%";
					if ($(this).parent('.four.columns').length) lefty = "35%";
							
					$(this).find('.hover_the_thumbs').css('background-color','rgba(0, 0, 0, 0.6)');
					$(this).find('.magnify_this_thumb').css('left', '51%').css('opacity',1);
					$(this).find('.hyperlink_this_thumb').css('left', lefty).css('opacity',1);
					$(this).children('div').css('background',color);
					$(this).find('.p_title a').css('color', 'white');
					$(this).find('.p_exerpt p').css('color', 'white');
					$(this).find('.p_title').css('border-top', '4px solid ' + $.xcolor.darken(color));
				}, function(){
					$(this).find('.hover_the_thumbs').css('background-color','rgba(0, 0, 0, 0)');
					$(this).find('.magnify_this_thumb').css('left', '-15%').css('opacity',0);
					$(this).find('.hyperlink_this_thumb').css('left', '105%').css('opacity',0);
					$(this).children('div').css('background','#EEE');
					$(this).find('.p_exerpt p').css('color', '');
					$(this).find('.p_title a').css('color', '');
					$(this).find('.p_title').css('border-top', '4px solid #DDD');
				});
				$('.post-thumb:hover > div').css('background-color', color+' !important');		
			}
			
		}
		
	}
	
	$('.option_btn.settings-open').css('background-color', color);
	
		
	$("a:not(.button)").each(function(){
		var c =  $(this).css("color");
		
		if($(this).parent().hasClass("termCat") || 
		   $(this).parent().hasClass('menu-item') ||
		   $(this).parent().hasClass('p_title')
		){}
		else{
			var linksColor = color;
			if ($('#freshlook_links_color_hover').html() != "") linksColor = "#"+$('#freshlook_links_color_hover').html();
			$(this).hover(function(){
		      $(this).css("color", linksColor);
		  }, function() {
		      $(this).css("color", c);
		  });
		 }
	});
	
	$('.recentposts_listing a.the_title').each(function(){
		var linksColor = color;
		if ($('#freshlook_links_color_hover').html() != "") linksColor = "#"+$('#freshlook_links_color_hover').html();
		$(this).hover(function(){
			$(this).css('color',linksColor);
		}, function(){
			$(this).css('color',' ');
		});
	});
	
	$("#wrapper a > img, #wrapper a > img").each(function(){
		var c =  $(this).css("color");
		
		$(this).hover(function(){
		    $(this).css("-webkit-box-shadow", color+" 0 0 6px");
		    $(this).css("box-shadow", color+" 0 0 6px");
		    $(this).css("-moz-box-shadow", color+" 0 0 6px");
		    $(this).css("background-color", color+" 0 0 6px");
		}, function() {
		    $(this).css("-webkit-box-shadow", "none");
		    $(this).css("box-shadow", "none");
		    $(this).css("-moz-box-shadow", "none");
		    $(this).css("background-color", "none");
		});

	});
	
	/*VERTICAL TABS*/
	$('.special_tabs .tab-selector .label.current .designare_icon_special_tabs').css('background-color', color);
	$('.special_tabs .tab-selector .label.current .tab_title').css('color', color);
	
}
