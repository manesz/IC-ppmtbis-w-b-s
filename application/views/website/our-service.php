<?php require_once("header.php");?>

<?php require_once("header-content.php");?>

<?php require_once("title.php");?>

<div id="white_content">

    <div id="wrapper">

        <div class="container" style='border-top: 1px solid #ededed;'>

            <section id="primary" role="region" class="eleven columns" style="margin-top: 50px;">
                <div id="content">
                    <div class="post-listing" style="border-right: 1px solid #EDEDED; padding-right: 40px;">

                        <!-- START: FLEXSLIDER -->
                        <div id="myslider-1" class="flexslider clearfix">
                            <h4 class="flex-title"></h4>

                            <ul class="slides">
                                <li>
                                    <a href='javascript:;'><img src='http://designarethemes.com/themes/freshlookwp/wp-content/uploads/2012/11/1.jpg' alt='' ></a>

                                    <p class='flex-caption'><span class='caption-title'>Unlimited Colors & Sidebars</span></p>
                                </li>

                                <li>
                                    <a href='javascript:;'><img src='http://designarethemes.com/themes/freshlookwp/wp-content/uploads/2012/11/3.jpg' alt='' ></a>

                                    <p class='flex-caption'><span class='caption-title'>Mobile Ready & Ultra Responsive</span></p>
                                </li>

                                <li>
                                    <a href='javascript:;'><img src='http://designarethemes.com/themes/freshlookwp/wp-content/uploads/2012/11/4.jpg' alt='' ></a>

                                    <p class='flex-caption'><span class='caption-title'>Clean &amp; Fresh Design</span></p>
                                </li>

                                <li>
                                    <a href='javascript:;'><img src='http://designarethemes.com/themes/freshlookwp/wp-content/uploads/2012/11/2.jpg' alt='' ></a>

                                    <p class='flex-caption'><span class='caption-title'>Top Notch Support!</span></p>
                                </li>
                            </ul>
                        </div>
                        <script type="text/javascript">
                            $(document).ready(function(){
                                $('#myslider-1').flexslider({
                                    animation: "fade",
                                    slideDirection: "vertical",
                                    directionNav: true,
                                    slideshowSpeed: 5500,
                                    controlsContainer: '#myslider-1 .flex-container',
                                    pauseOnAction: false,
                                    pauseOnHover: true,
                                    keyboardNav: false,
                                    controlNav: false,
                                    start: function(slider) {
                                        $("#myslider-1 .slides li").eq(slider.currentSlide).find(".flex-caption").animate({'bottom' : '0'}, 500);
                                    } ,after: function(slider) {
                                        $("#myslider-1 .slides li").find(".flex-caption").each(function(){
                                            $(this).css('bottom', '-100px');
                                            if($(this).parent().hasClass('clone')){}
                                            else{
                                                $(this).animate({'bottom' : '-100px'}, 500);
                                            }
                                        });
                                        $("#myslider-1 .slides li").eq(slider.currentSlide).find(".flex-caption").animate({'bottom' : '0'}, 500);
                                    }
                                });
                            });
                        </script>


                        <br/><br/>
                        <h3>OUT SERVICE</h3></span></h3>
                        <div class="des-sc-dots-divider"></div>
                        <br/>
                        <br/>
                        <H4>Payroll Services</H4>
                        <p>PROMPT has the capacity and expertise to provide full payroll services to your employees.   We can take away the added pressure that the staff can put on your company administration.</p>

                        <H4>Work Permit / VISA</H4>
                        <p>PROMPT provides high quality legal professional services in applying Non-immigrant Visa and Work Permit for you.</p>

                        <H4>Search and Selection</H4>
                        <p>PROMPT provides recruitment services throughout all levels of staff and management positions across all areas of business.</p>

                        <H4>HR Consultant</H4>
                        <p>PROMPT will be a partner to client in Human Resources service and support to maximize and achieve its business objectives.</p>



                    </div>
                </div>
            </section>

            <section class="one column"></section>


            <div id="secondary" class="widget-area four columns" style="position: relative; float: right;">

                <?php require_once("sidebar.php");?>

            </div><!-- #secondary .widget-area -->
        </div><!-- #primary -->
    </div><!-- enf of .container -->
</div><!-- end of wrapper -->

<?php require_once("footer.php");?>