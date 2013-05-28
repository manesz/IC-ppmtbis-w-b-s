$(function () {

	for (var i = 0; i < $(".serviceballs").length; i++){
	
		$shortcodeservice = $(".serviceballs").eq(i);
		
		if ($(window).width() > 957){
			$shortcodeservice.find("#banner ul li:first-child").css({ "left": "-31px" });
			$shortcodeservice.find("#banner ul li:nth-child(2)").css({ "left": "165px" });
			$shortcodeservice.find("#banner ul li:nth-child(2) ul").css({"left":"260px"});
			$shortcodeservice.find("#banner ul li:nth-child(3)").css({ "left": "363px" });
			$shortcodeservice.find("#banner ul li:last-child").css({ "left": "560px" });	
		} else {
			$shortcodeservice.find("#banner ul li:first-child").css({ "left": "-50px" });
			$shortcodeservice.find("#banner ul li:nth-child(2)").css({ "left": "100px" });
			$shortcodeservice.find("#banner ul li:nth-child(3)").css({ "left": "250px" });
			$shortcodeservice.find("#banner ul li:last-child").css({ "left": "400px" });
		}
		
		$shortcodeservice.find("#banner ul li h2").unbind('click');
		$shortcodeservice.find("#banner ul li h2").click(function(e){
		
			target = $(this).parent().attr("id");
			$service = $(this).parents('.serviceballs');
			
			
			if ($(window).width() > 957){
				// Check if target section is either 1st or 2nd                             
		        if ($(this).parent().is(":first-child")) {
		            // If this section is open, close it
		            if ($(this).parent().hasClass("open")) {
		                $("#" + target + " .servicesScroller").slideUp("100", function () {
		                   $service.find("#banner ul li:first-child").animate({ "left": "-31px" }, '1200');
		                   $service.find("#banner ul li:nth-child(2)").animate({ "left": "165px" }, '1200');
		                   $service.find("#banner ul li:nth-child(3)").animate({ "left": "363px" }, '1200');
		                   $service.find("#banner ul li:last-child").animate({ "left": "560px" }, '1200');
		                });
		                $(this).parent().removeClass("open");
		            }
		            else {
		                // Check if a section is already open
		                if ($service.find("#banner ul li.open").length == 0) {
		                   $service.find("#banner ul li:nth-child(2)").animate({ "left": "445px" }, '1200');
		                   $service.find("#banner ul li:nth-child(3)").animate({ "left": "545px" }, '1200');
		                   $service.find("#banner ul li:last-child").animate({ "left": "645px" }, '1200');
		                    $("#" + target + " > ul").slideDown("slow", function(){
			                    $(this).tinyscrollbar({scroll: true});
		                    });
		                    $(this).parent().addClass("open");
		                }
		                else {
		                   $service.find("#banner ul li.open > ul").slideUp("100", function () {
		                       $service.find("#banner ul li:first-child").animate({ "left": "-31px" }, '1200');
		                       $service.find("#banner ul li:nth-child(2)").animate({ "left": "165px" }, '1200');
		                       $service.find("#banner ul li:nth-child(3)").animate({ "left": "363px" }, '1200');
		                       $service.find("#banner ul li:last-child").animate({ "left": "560px" }, '1200', function () {
		                           $service.find("#banner ul li.open").removeClass("open");
		                           $service.find("#banner ul li:nth-child(2)").animate({ "left": "445px" }, '1200');
		                           $service.find("#banner ul li:nth-child(3)").animate({ "left": "545px" }, '1200');
		                           $service.find("#banner ul li:last-child").animate({ "left": "645px" }, '1200');
		                            $("#" + target + " > ul").slideDown("slow", function(){
			                            $(this).tinyscrollbar({scroll: true});
		                            });
		                            $("#" + target).addClass("open");
		                        });
		                    });
		                }
		            }
		        }
		        else if ($(this).parent().is(":nth-child(2)")) {
		            // If this section is open, close it
		            if ($(this).parent().hasClass("open")) {
		                $("#" + target + " > ul").slideUp("100", function () {
		                	$service.find("#banner ul li:first-child").animate({ "left": "-31px" }, '1200');
			                $service.find("#banner ul li:nth-child(2)").animate({ "left": "165px" }, '1200');
		    	            $service.find("#banner ul li:nth-child(3)").animate({ "left": "363px" }, '1200');
		        	        $service.find("#banner ul li:last-child").animate({ "left": "560px" }, '1200');
		                });
		                $(this).parent().removeClass("open");
		            }
		            else {
		                // Check if a section is already open
		                if ($service.find("#banner ul li.open").length == 0) {
		                	$service.find("#banner ul li:nth-child(1)").animate({ "left": "-80px" }, '1200');
		                	$service.find("#banner ul li:nth-child(2)").animate({ "left": "70px" }, '1200');
		                   $service.find("#banner ul li:nth-child(3)").animate({ "left": "545px" }, '1200');
		                   $service.find("#banner ul li:last-child").animate({ "left": "645px" }, '1200');
		                    $("#" + target + " > ul").slideDown("slow", function(){
			                    $(this).tinyscrollbar({scroll: true});
		                    });
		                    $(this).parent().addClass("open");
		                }
		                else {
		                   $service.find("#banner ul li.open > ul").slideUp("100", function () {
		                       $service.find("#banner ul li:first-child").animate({ "left": "-31px" }, '1200');
		                       $service.find("#banner ul li:nth-child(2)").animate({ "left": "165px" }, '1200');
		                       $service.find("#banner ul li:nth-child(3)").animate({ "left": "363px" }, '1200');
		                       $service.find("#banner ul li:last-child").animate({ "left": "560px" }, '1200', function () {
		                           $service.find("#banner ul li.open").removeClass("open");
		                           $service.find("#banner ul li:nth-child(1)").animate({ "left": "-80px" }, '1200');
				                	$service.find("#banner ul li:nth-child(2)").animate({ "left": "70px" }, '1200');
				                   $service.find("#banner ul li:nth-child(3)").animate({ "left": "545px" }, '1200');
				                   $service.find("#banner ul li:last-child").animate({ "left": "645px" }, '1200');
		                            $("#" + target + " > ul").slideDown("slow", function(){
			                            $(this).tinyscrollbar({scroll: true});
		                            });
		                            $("#" + target).addClass("open");
		                        });
		                    });
		                }
		            }
		        }
		        else if ($(this).parent().is(":nth-child(3)")) {
		        	$(this).siblings('ul').css('left', '260px');
		            // If this section is open, close it
		            if ($(this).parent().hasClass("open")) {
		                $("#" + target + " > ul").slideUp("100", function () {
		                   $service.find("#banner ul li:first-child").animate({ "left": "-31px" }, '1200');
		                   $service.find("#banner ul li:nth-child(2)").animate({ "left": "165px" }, '1200');
		                   $service.find("#banner ul li:nth-child(3)").animate({ "left": "363px" }, '1200');
		                   $service.find("#banner ul li:last-child").animate({ "left": "560px" }, '1200');
		                });
		                $(this).parent().removeClass("open");
		            }
		            else {
		                // Check if a section is already open
		                if ($service.find("#banner ul li.open").length == 0) {
		                   $service.find("#banner ul li:first-child").animate({ "left": "-80px" }, '1200');
		                   $service.find("#banner ul li:nth-child(2)").animate({ "left": "20px" }, '1200');
		                   $service.find("#banner ul li:nth-child(3)").animate({ "left": "120px" }, '1200');
		                   $service.find("#banner ul li:last-child").animate({ "left": "645px" }, '1200');
		                    $("#" + target + " > ul").slideDown("slow", function(){
			                    $(this).tinyscrollbar({scroll: true});
		                    });
		                    $(this).parent().addClass("open");
		                }
		                else {
		                   $service.find("#banner ul li.open > ul").slideUp("100", function () {
		                       $service.find("#banner ul li:nth-child(2)").animate({ "left": "165px" }, '1200');
		                       $service.find("#banner ul li:nth-child(3)").animate({ "left": "363px" }, '1200');
		                       $service.find("#banner ul li:last-child").animate({ "left": "560px" }, '1200');
		                       $service.find("#banner ul li:first-child").animate({ "left": "-31px" }, '1200', function () {
		                           $service.find("#banner ul li.open").removeClass("open");
		                           $service.find("#banner ul li:first-child").animate({ "left": "-80px" }, '1200');
				                   $service.find("#banner ul li:nth-child(2)").animate({ "left": "20px" }, '1200');
				                   $service.find("#banner ul li:nth-child(3)").animate({ "left": "120px" }, '1200');
				                   $service.find("#banner ul li:last-child").animate({ "left": "645px" }, '1200');
		                            $("#" + target + " > ul").slideDown("slow", function(){
			                            $(this).tinyscrollbar({scroll: true});
		                            });
		                            $("#" + target).addClass("open");
		                        });
		                    });
		                }
		            }
		        }
		        else {
		        	$(this).siblings('ul').css('left', '260px');
		            // If this section is open, close it
		            if ($(this).parent().hasClass("open")) {
		                $("#" + target + " > ul").slideUp("100", function () {
		                    $service.find("#banner ul li:first-child").animate({ "left": "-31px" }, '1200');
			                $service.find("#banner ul li:nth-child(2)").animate({ "left": "165px" }, '1200');
		    	            $service.find("#banner ul li:nth-child(3)").animate({ "left": "363px" }, '1200');
		        	        $service.find("#banner ul li:last-child").animate({ "left": "560px" }, '1200');
		                });
		                $(this).parent().removeClass("open");
		            }
		            else {
		                // Check if a section is already open
		                if ($service.find("#banner ul li.open").length == 0) {
		                   $service.find("#banner ul li:first-child").animate({ "left": "-80px" }, '1200');
		                   $service.find("#banner ul li:nth-child(2)").animate({ "left": "20px" }, '1200');
		                   $service.find("#banner ul li:nth-child(3)").animate({ "left": "120px" }, '1200');
		                   $service.find("#banner ul li:last-child").animate({ "left": "220px" }, '1200');
		                    $("#" + target + " > ul").slideDown("slow", function(){
			                    $(this).tinyscrollbar({scroll: true});
		                    });
		                    $(this).parent().addClass("open");
		                }
		                else {
		                   $service.find("#banner ul li.open > ul").slideUp("100", function () {
		                       $service.find("#banner ul li:nth-child(2)").animate({ "left": "165px" }, '1200');
		                       $service.find("#banner ul li:nth-child(3)").animate({ "left": "363px" }, '1200');
		                       $service.find("#banner ul li:last-child").animate({ "left": "560px" }, '1200');
		                       $service.find("#banner ul li:first-child").animate({ "left": "-31px" }, '1200', function () {
		                           $service.find("#banner ul li.open").removeClass("open");
		                           $service.find("#banner ul li:nth-child(3)").animate({ "left": "120px" }, '1200');
		                           $service.find("#banner ul li:nth-child(2)").animate({ "left": "20px" }, '1200');
		                           $service.find("#banner ul li:first-child").animate({ "left": "-80px" }, '1200');
		                           $service.find("#banner ul li:last-child").animate({ "left": "220" }, '1200');
		                            $("#" + target + " > ul").slideDown("slow", function(){
			                            $(this).tinyscrollbar({scroll: true});
		                            });
		                            $("#" + target).addClass("open");
		                        });
		                    });
		                }
		            }
		        }

			} else {
				
				
				/* lower window resolution */
				// Check if target section is either 1st or 2nd                             
		        if ($(this).parent().is(":first-child")) {
		            // If this section is open, close it
		            if ($(this).parent().hasClass("open")) {
		                $("#" + target + " .servicesScroller").slideUp("100", function () {
		                   $service.find("#banner ul li:first-child").animate({ "left": "-50px" }, '1200');
		                   $service.find("#banner ul li:nth-child(2)").animate({ "left": "100px" }, '1200');
		                   $service.find("#banner ul li:nth-child(3)").animate({ "left": "250px" }, '1200');
		                   $service.find("#banner ul li:last-child").animate({ "left": "400px" }, '1200');
		                });
		                $(this).parent().removeClass("open");
		            }
		            else {
		                // Check if a section is already open
		                if ($service.find("#banner ul li.open").length == 0) {
		                	$service.find("#banner ul li:first-child").animate({ "left": "-80px" }, '1200');
		                   $service.find("#banner ul li:nth-child(2)").animate({ "left": "300px" }, '1200');
		                   $service.find("#banner ul li:nth-child(3)").animate({ "left": "380px" }, '1200');
		                   $service.find("#banner ul li:last-child").animate({ "left": "460px" }, '1200');
		                    $("#" + target + " > ul").slideDown("slow", function(){
			                    $(this).tinyscrollbar({scroll: true});
		                    });
		                    $(this).parent().addClass("open");
		                }
		                else {
		                   $service.find("#banner ul li.open > ul").slideUp("100", function () {
			                   $service.find("#banner ul li:first-child").animate({ "left": "-80px" }, '1200');
		                       $service.find("#banner ul li:nth-child(2)").animate({ "left": "100px" }, '1200');
		                       $service.find("#banner ul li:nth-child(3)").animate({ "left": "250px" }, '1200');
		                       $service.find("#banner ul li:last-child").animate({ "left": "400px" }, '1200', function () {
		                           $service.find("#banner ul li.open").removeClass("open");
		                           $service.find("#banner ul li:nth-child(2)").animate({ "left": "300px" }, '1200');
		                           $service.find("#banner ul li:nth-child(3)").animate({ "left": "380px" }, '1200');
		                           $service.find("#banner ul li:last-child").animate({ "left": "460px" }, '1200');
		                            $("#" + target + " > ul").slideDown("slow", function(){
			                            $(this).tinyscrollbar({scroll: true});
		                            });
		                            $("#" + target).addClass("open");
		                        });
		                    });
		                }
		            }
		        }
		        else if ($(this).parent().is(":nth-child(2)")) {
		            // If this section is open, close it
		            if ($(this).parent().hasClass("open")) {
		                $("#" + target + " > ul").slideUp("100", function () {
		                	$service.find("#banner ul li:first-child").animate({ "left": "-50px" }, '1200');
		                   $service.find("#banner ul li:nth-child(2)").animate({ "left": "100px" }, '1200');
		                   $service.find("#banner ul li:nth-child(3)").animate({ "left": "250px" }, '1200');
		                   $service.find("#banner ul li:last-child").animate({ "left": "400px" }, '1200');
		                });
		                $(this).parent().removeClass("open");
		            }
		            else {
		                // Check if a section is already open
		                if ($service.find("#banner ul li.open").length == 0) {
		                	$service.find("#banner ul li:nth-child(1)").animate({ "left": "-80px" }, '1200');
		                	$service.find("#banner ul li:nth-child(2)").animate({ "left": "0px" }, '1200');
		                   $service.find("#banner ul li:nth-child(3)").animate({ "left": "380px" }, '1200');
		                   $service.find("#banner ul li:last-child").animate({ "left": "460px" }, '1200');
		                    $("#" + target + " > ul").slideDown("slow", function(){
			                    $(this).tinyscrollbar({scroll: true});
		                    });
		                    $(this).parent().addClass("open");
		                }
		                else {
		                   $service.find("#banner ul li.open > ul").slideUp("100", function () {
		                       $service.find("#banner ul li:first-child").animate({ "left": "-50px" }, '1200');
		                       $service.find("#banner ul li:nth-child(2)").animate({ "left": "100px" }, '1200');
		                       $service.find("#banner ul li:nth-child(3)").animate({ "left": "250px" }, '1200');
		                       $service.find("#banner ul li:last-child").animate({ "left": "400px" }, '1200', function () {
		                           $service.find("#banner ul li.open").removeClass("open");
		                           $service.find("#banner ul li:nth-child(1)").animate({ "left": "-80px" }, '1200');
				                	$service.find("#banner ul li:nth-child(2)").animate({ "left": "0px" }, '1200');
				                   $service.find("#banner ul li:nth-child(3)").animate({ "left": "380px" }, '1200');
				                   $service.find("#banner ul li:last-child").animate({ "left": "460px" }, '1200');
		                            $("#" + target + " > ul").slideDown("slow", function(){
			                            $(this).tinyscrollbar({scroll: true});
		                            });
		                            $("#" + target).addClass("open");
		                        });
		                    });
		                }
		            }
		        }
		        else if ($(this).parent().is(":nth-child(3)")) {
		        	$(this).siblings('ul').css('left', '180px');
		            // If this section is open, close it
		            if ($(this).parent().hasClass("open")) {
		                $("#" + target + " > ul").slideUp("100", function () {
		                   $service.find("#banner ul li:first-child").animate({ "left": "-50px" }, '1200');
		                   $service.find("#banner ul li:nth-child(2)").animate({ "left": "100px" }, '1200');
		                   $service.find("#banner ul li:nth-child(3)").animate({ "left": "250px" }, '1200');
		                   $service.find("#banner ul li:last-child").animate({ "left": "400px" }, '1200');
		                });
		                $(this).parent().removeClass("open");
		            }
		            else {
		                // Check if a section is already open
		                if ($service.find("#banner ul li.open").length == 0) {
		                   $service.find("#banner ul li:first-child").animate({ "left": "-80px" }, '1200');
		                   $service.find("#banner ul li:nth-child(2)").animate({ "left": "0px" }, '1200');
		                   $service.find("#banner ul li:nth-child(3)").animate({ "left": "80px" }, '1200');
		                   $service.find("#banner ul li:last-child").animate({ "left": "460px" }, '1200');
		                    $("#" + target + " > ul").slideDown("slow", function(){
			                    $(this).tinyscrollbar({scroll: true});
		                    });
		                    $(this).parent().addClass("open");
		                }
		                else {
		                   $service.find("#banner ul li.open > ul").slideUp("100", function () {
		                       $service.find("#banner ul li:nth-child(2)").animate({ "left": "100px" }, '1200');
		                       $service.find("#banner ul li:nth-child(3)").animate({ "left": "250px" }, '1200');
		                       $service.find("#banner ul li:last-child").animate({ "left": "400px" }, '1200');
		                       $service.find("#banner ul li:first-child").animate({ "left": "-50px" }, '1200', function () {
		                           $service.find("#banner ul li.open").removeClass("open");
		                           $service.find("#banner ul li:first-child").animate({ "left": "-80px" }, '1200');
				                   $service.find("#banner ul li:nth-child(2)").animate({ "left": "0px" }, '1200');
				                   $service.find("#banner ul li:nth-child(3)").animate({ "left": "80px" }, '1200');
				                   $service.find("#banner ul li:last-child").animate({ "left": "460px" }, '1200');
		                            $("#" + target + " > ul").slideDown("slow", function(){
			                            $(this).tinyscrollbar({scroll: true});
		                            });
		                            $("#" + target).addClass("open");
		                        });
		                    });
		                }
		            }
		        }
		        else {
		        	$(this).siblings('ul').css('left', '180px');
		            // If this section is open, close it
		            if ($(this).parent().hasClass("open")) {
		                $("#" + target + " > ul").slideUp("100", function () {
		                   $service.find("#banner ul li:first-child").animate({ "left": "-50px" }, '1200');
		                   $service.find("#banner ul li:nth-child(2)").animate({ "left": "100px" }, '1200');
		                   $service.find("#banner ul li:nth-child(3)").animate({ "left": "250px" }, '1200');
		                   $service.find("#banner ul li:last-child").animate({ "left": "400px" }, '1200');
		                });
		                $(this).parent().removeClass("open");
		            }
		            else {
		                // Check if a section is already open
		                if ($service.find("#banner ul li.open").length == 0) {
		                   $service.find("#banner ul li:first-child").animate({ "left": "-80px" }, '1200');
		                   $service.find("#banner ul li:nth-child(2)").animate({ "left": "0px" }, '1200');
		                   $service.find("#banner ul li:nth-child(3)").animate({ "left": "80px" }, '1200');
		                   $service.find("#banner ul li:last-child").animate({ "left": "160px" }, '1200');
		                    $("#" + target + " > ul").slideDown("slow", function(){
			                    $(this).tinyscrollbar({scroll: true});
		                    });
		                    $(this).parent().addClass("open");
		                }
		                else {
		                   $service.find("#banner ul li.open > ul").slideUp("100", function () {
		                       $service.find("#banner ul li:nth-child(2)").animate({ "left": "100px" }, '1200');
		                       $service.find("#banner ul li:nth-child(3)").animate({ "left": "250px" }, '1200');
		                       $service.find("#banner ul li:last-child").animate({ "left": "400px" }, '1200');
		                       $service.find("#banner ul li:first-child").animate({ "left": "-50px" }, '1200', function () {
		                           $service.find("#banner ul li.open").removeClass("open");
		                           $service.find("#banner ul li:nth-child(3)").animate({ "left": "80px" }, '1200');
		                           $service.find("#banner ul li:nth-child(2)").animate({ "left": "0px" }, '1200');
		                           $service.find("#banner ul li:first-child").animate({ "left": "-80px" }, '1200');
		                           $service.find("#banner ul li:last-child").animate({ "left": "160" }, '1200');
		                            $("#" + target + " > ul").slideDown("slow", function(){
			                            $(this).tinyscrollbar({scroll: true});
		                            });
		                            $("#" + target).addClass("open");
		                        });
		                    });
		                }
		            }
		        }

				
				
			}
		
		});
	}
});