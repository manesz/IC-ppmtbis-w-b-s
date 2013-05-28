jQuery(document).ready(function($) {

	// The number of the next page to load (/page/x/).
	window.pageNum = parseInt(parseInt($('#loader-startPage').html()) + 1);
	
	// The maximum number of pages the current query can return.
	var max = parseInt($('#loader-maxPages').html());
	
	// The link of the next page of posts.
	var nextLink = $('.navigation .next-posts a').attr('href');
	
	/**
	 * Replace the traditional navigation with our own,
	 * but only if there is at least one page of new posts to load.
	**/
	if(window.pageNum <= max) {
		// Insert the "More Posts" link.
		
		$('.post-listing').each(function(){

			if ($(this).parents('.recentPosts_widget').length == 0){
				
				if ($(this).parents('.single').length == 0){
					var appendix = '<p id="pbd-alp-load-posts" style="position: relative; float: right; margin-bottom: 50px"><a style=" position: relative; float:right; margin-right: 10px;" href="javascript:;">'+ $('#freshlook_load_more_posts_text').html() +'</a></p>';
					$(this)
						.append('<div class="pbd-alp-placeholder-'+ window.pageNum +'"></div>')
						.append(appendix);		
				}
			
			}
			// Remove the traditional navigation.
			if ($(this).parents('.single').length == 0){ $('.navigation').remove(); }
		});
		
	}
	
	
	/**
	 * Load new posts when the link is clicked.
	 */	
	$('#pbd-alp-load-posts a').click(function(e) {
		
		// Are there more posts to load?
		if(window.pageNum <= max) {
		
			// Show that we're working.
			$(this).html(''+$('#freshlook_loading_posts_text').html()+'<img style="width:16px; height: 16px; margin-left: 5px; position: relative;" src="'+$('#templatepath').html()+'img/ajx_loading.gif">');
			
			window.first = true;
			
			
			
				$('.pbd-alp-placeholder-'+ pageNum).load( nextLink + ' .post',
					function() {
						//repair_hovers_blog(pageNum);
						// Update page number and nextLink.
						loadImages();
						initBlogs();
						onColorChange($('#styleColor').html());
						$('.pbd-alp-placeholder-'+ pageNum+' .post').each(function(){
							if ($(this).hasClass('recent')) $(this).remove();
						});
						
						//alert($('.pbd-alp-placeholder-'+ pageNum+' .post').first().attr('id'));
						
						if (window.first){
							window.first = false;
							if ($('#reading_option').html() != "scrollauto"){
								$('html,body').stop().animate({
							      "scrollTop": $('.pbd-alp-placeholder-'+ pageNum+' .post').first().offset().top
							    }, 1200, "easeInOutExpo", function () {
							      //window.location.hash = target;
							   	});	
							}
						}
						
						//alert(pageNum+': pageNum');
						window.pageNum = window.pageNum+1;
	
						////////////////////
						//
						//
						// experimentar com muitas mais páginas para ver se ta tudo ok
						nextLink = nextLink.replace(/\/page\/[0-9]?/, '/page/'+ pageNum); /* links /page/x/ */
						nextLink = nextLink.replace(/paged=[0-9]?/, "paged="+pageNum); /* links /?paged=x */
						//
						//
						//
						////////////////////
																			
						// Add a new placeholder, for when user clicks again.
						$('#pbd-alp-load-posts')
							.before('<div class="pbd-alp-placeholder-'+ parseInt(window.pageNum) +'"></div>')
						
						// Update the button message.
						if(pageNum <= max) {
							$('#pbd-alp-load-posts a').text($('#freshlook_load_more_posts_text').html());
							if ($('#reading_option').html() === "scrollauto") {
								window.clearInterval(window.interval);
								window.interval = setInterval('monitorScrollTop()', 1000 );
							}
						} else {
							$('#pbd-alp-load-posts a').text($('#freshlook_no_more_posts_text').html());
							window.clearInterval(window.interval);
						}
					}
				).fadeIn(5000);	
			
			
			
		} else {
			//$('#pbd-alp-load-posts a').append('.');
			window.clearInterval(window.interval);
		}	
		return false;
	});
});