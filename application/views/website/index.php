<?php //require_once("header.php");
$this->load->view("website/header");
$baseUrl = base_url();
$arrData = $this->CPanel_model->site_configList(1);


$arrHotJob = $this->CPanel_model->postList(0, true);
?>

<div class="everything" xmlns="http://www.w3.org/1999/html">

<!-- COLOR Switcher (hidden by default) -->
<div id="option_wrapper" style="display: none;">

    <div class="inner">
        <div id="colorpicker"></div>
        <form style="margin: 20px 20px 0 28px;position: relative;top:12px;">
            <input type="text" id="color" name="color" value="#7AB317" />
        </form>
    </div>

</div>

<div class="option_btn settings-close" style="display: none;"></div>
<!-- END OF COLOR Switcher -->

<?php //require_once("header-content.php");?>
<?php
$this->load->view("website/header-content");?>

<!-- START: INFO ABOVE MENU
<div class="info_above_menu">
    <div class="container">
        <div class="info_above_menu_left eight columns">
            Awesome html5 theme by Designare. <a href="http://themeforest.net/item/freshlook-responsive-multipurpose-html5-template/4452404?ref=Designare">Buy it on Themeforest  →</a>
        </div>
        <div class="info_above_menu_right eight columns">
            Email: <a href=mailto:geral@designarethemes.com> geral@designarethemes.com </a> &nbsp; | &nbsp; Tel: +351 966 666 666
        </div>
    </div>
</div>
-->
<!-- END: INFO ABOVE MENU -->

<!-- START: CAMERA SLIDER -->
<div id="slider_container">
    <?php $this->load->view("website/front-image-slide"); ?>
</div>
<!-- END: CAMERA SLIDER -->

<!-- START: CONTENT -->
<div id="white_content">
<div id="wrapper">
<div class="container">
<div class="reset_960">
<div id="post" class="post page article">

<div class="entry-content">

<!-- START: SERVICES ICONS -->
<div id='service-29' class='shortcode-services default'>

    <h3>Welcome to <span style="color: #7ab317;">PROMPTBIS</span></h3>
    <p>&nbsp;</p>
<!--    <p>PROMPT has been established by a team of professionals highly experienced in many fields of expertise i.e. human resources, accounting, finance, asset management, logistics and information technology, etc.   The company aims to provide one-stop services of business consultations and solutions on the principles of highly quality, punctually, customer satisfaction and cost effectiveness.   To maximize customers' satisfaction and return on investment, we continuously maintain our standardization and develop our organization to serve the better in the future.</p><br/>-->
    <p><?php echo $arrData[0]->front_content; ?></p><br/>

    <div class='fix'></div>
</div>
<!-- END: SERVICES ICONS -->

<!-- HOT JOBS -->
<div class="main_cols container" style="margin-bottom: 30px;">
    <h3>HOT <span style="color: #7ab317;">JOBS</span></h3>
    <?php foreach ($arrHotJob as $key => $value):?>
    <div class="eight columns">
        <img src="http://demo.ideacorners.com/promptbis/assets/website/images/option-icon-favorite.png"/>
        <a href="<?php echo $webUrl; ?>website/post/<?php echo $value->id; ?>"><?php echo $value->title; ?></a>
    </div>
    <?php endforeach; ?>
</div>
<!-- END: HOT JOBS -->

<!-- 1/2 + 1/2 COLUMNS -->
<div class="main_cols container">
    <br />
    <!-- 1/2 COLUMN -->
    <div class="eight columns" onclick="if(this.innerHTML == &quot;Type your text here…&quot;) this.innerHTML = &quot; &quot;">
        <!-- START: FLEXSLIDER -->
        <div id="myslider-1" class="flexslider clearfix" style="overflow:hidden;">
            <h4 class="flex-title"></h4>

            <ul class="slides">
                <li>
                    <a href='javascript:;'><img src='http://designarethemes.com/themes/freshlookwp/wp-content/uploads/2012/11/1.jpg' alt=''></a>

                    <p class='flex-caption'><span class='caption-title'>Unlimited Colors & Sidebars</span></p>
                </li>

                <li>
                    <a href='javascript:;'><img src='http://designarethemes.com/themes/freshlookwp/wp-content/uploads/2012/11/3.jpg' alt=''></a>

                    <p class='flex-caption'><span class='caption-title'>Mobile Ready & Ultra Responsive</span></p>
                </li>

                <li>
                    <a href='javascript:;'><img src='http://designarethemes.com/themes/freshlookwp/wp-content/uploads/2012/11/4.jpg' alt='' ></a>

                    <p class='flex-caption'><span class='caption-title'>Clean &amp; Fresh Design</span></p>
                </li>

                <li>
                    <a href='javascript:;'><img src='http://designarethemes.com/themes/freshlookwp/wp-content/uploads/2012/11/2.jpg' alt=''></a>

                    <p class='flex-caption'><span class='caption-title'>Top Notch Support!</span></p>
                </li>
            </ul>
        </div>
        <!-- END: FLEXSLIDER -->

        <!-- START: FLEXSLIDER SCRIPT-->
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
        <!-- END: SCRIPT -->
    </div>

    <!-- 1/2 COLUMN -->
    <div class="eight columns" onclick="if(this.innerHTML == &quot;Type your text here…&quot;) this.innerHTML = &quot; &quot;">
        <h3>So, What is the <span style="color: rgb(85, 85, 85);">PROMPTBIS service</span> ?</h3><br/>

        <!-- START: ACCORDEON -->
        <div id="accordion" class="shortcode-accs default">
            <h2 onclick="changeAccord(this)" class="current" style="cursor: pointer; color: rgb(85, 85, 85);">Payroll Services</h2>

            <div class="pane acc-sec" style="opacity: 1; padding-bottom: 20px; display: block;">
                <p>PROMPT has the capacity and expertise to provide full payroll services to your employees.   We can take away the added pressure that the staff can put on your company administration.</p>
            </div><!--/.section-->

            <h2 onclick="changeAccord(this)" style="cursor: pointer; color: rgb(85, 85, 85);">Work Permit / VISA</h2>

            <div class="pane acc-sec" style="opacity: 0; padding-bottom: 0px;">
                <p>PROMPT provides high quality legal professional services in applying Non-immigrant Visa and Work Permit for you.</p>
            </div><!--/.section-->

            <h2 onclick="changeAccord(this)" style="cursor: pointer; color: rgb(85, 85, 85);" class="">Search and Selection</h2>

            <div class="pane acc-sec" style="display: none; opacity: 0; padding-bottom: 0px;">
                <p>PROMPT provides recruitment services throughout all levels of staff and management positions across all areas of business.</p>
            </div><!--/.section-->

            <h2 onclick="changeAccord(this)" style="cursor: pointer; color: rgb(85, 85, 85);">HR Consultant</h2>

            <div class="pane acc-sec" style="opacity: 1; padding-bottom: 20px;">
                <p>PROMPT will be a partner to client in Human Resources service and support to maximize and achieve its business objectives.</p>
            </div><!--/.section-->
        </div>
        <!-- END: ACCORDEON -->

    </div>
</div>

<!-- START: FEATURED BOXWITH SIMPLE BORDER-->
<div><div class="featured-box simpleborder">
    <div class="fancyb">
        <h3 style="font-size: 23px;text-align: left;width: 77%;clear: right;float: left;top: 10px;position: relative;left: 13px;">Subscript PROMPTBIS newsletter</h3>
        <p style="text-align: left; color: #999;width: 72%; position: relative; float: left;top: 9px;">
            <span style="font-size: 18px;left: 13px;position: relative;left: 13px;font-weight: 100;color: #999;top:2px;">get PROMPTBIS news!</span>
        </p>
        <p style="text-align: right;width: 22%;float: right;position: relative;top: -18px;right: 8px;">
            <a class="button big yellow">
                <span class="des-">GET IT</span>
            </a>
        </p>
    </div>
</div>
</div><br />
<!-- END: FEATURED BOX WITH SIMPLE BORDER -->

<!-- FACEBOOK BOX -->
<div class="default">
    <iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2FPROMPT%2F246528425359362&amp;width=292&amp;height=290&amp;show_faces=true&amp;colorscheme=light&amp;stream=false&amp;show_border=false&amp;header=true&amp;appId=121360188027071" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100%; height:240px;" allowTransparency="true"></iframe>
</div>
<!-- END: FACEBOOK BOX -->

</div><!-- .entry-content -->

</div><!-- #post -->

</div>


<script type="text/javascript">

    $(document).ready(function(){

        var styleColor = $("#styleColor").html();
        /* slideshow */
        window.firstSlider = true;
        window.sliderIndex = 0;

        window.firstLoad = true;

        if ($('#slider_container').length){

            $('#slider_container').camera({
                pagination: true,
                loader: 'bar',
                fx: 'random',
                transPeriod: 500,
                barPosition: 'bottom',
                loaderStroke: 3,
                loaderPadding: 0,
                loaderOpacity: .6,
                loaderColor: 'rgba(0,0,0,.3)',
                height: '400px',
                time: 6000,
                hover: true,
                playPause: false,
                pauseOnClick: false,
                autoAdvance: true,
                thumbnails: false,
                imagePath: $('#templatepath').html() + "images/",
                onLoaded: function(){
                    if (window.firstSlider){
                        //$('#white_content > div').prepend($('#slider_container .camera_pag').html());
                        $('#white_content > #wrapper').prepend('<div class="cameracontrols" style="position: absolute; height: 66px; right: 2%; top: -66px; z-index: 99;  "><div class="controls-mover" style="position: relative; float: left; top: 33px;"><div class="camera-controls-toggler closed" style="position: relative; float: right; padding: 5px 0px; display: inline-block; clear: both; background: #95c245; color: white; font-weight: bold; font-size: 14px; cursor: pointer; width: 34px; text-align: center; border-bottom: 3px solid '+$('#styleColor').html()+';" onclick="toggleCameraControls($(this));" >+</div><div class="cameraholder" /></div></div>');
                        $('#slider_container .camera_pag_ul').clone(true, true).prependTo($('#white_content .cameraholder'));
                        $('#white_content .cameraholder').prepend('<div id="triangle-bottomleft" /><div class="vert-sep" style="display: inline-block; position: absolute; float: right; width: 1px; height: 17px; top: 9px; right: 33px; background: #628f12;" />');

                        var classPlaying = "playing";
                        classPlaying = "paused";

                        $('#white_content .cameraholder #triangle-bottomleft').html('<div id="play_pause" class="'+classPlaying+'" onclick="playpause($(this));"/>');

                        $('.camera_caption .container').css({'opacity': 1, 'filter': 'alpha(opacity=100)', 'display':'block'});

                        var ind = parseInt($('#slider_container .camera_pag_ul .cameracurrent').index('li'),10);
                        window.sliderIndex = ind;

                        window.firstSlider = false;

                        $('.camera_prev').hover(function(){
                            $(this).css('opacity', 1);
                        }, function(){
                            $(this).css('opacity', .6);
                        });
                        $('.camera_next').hover(function(){
                            $(this).css('opacity', 1);
                        }, function(){
                            $(this).css('opacity', .6);
                        });

                    }

                    if ($('#bodyLayoutType').html() == "boxed"){
                        $('.camera_caption').each(function(){
                            $(this).find('.container > .eight.columns').css('margin-right','0px');
                            $(this).find('.container > .eight.columns').eq(0).css('margin-left','20px');
                        });
                    }

                },
                onStartTransition: function(){
                    var ind = 0;
                    //ind = parseInt($('#slider_container .camera_pag_ul .cameracurrent').index('li'),10);

                    for (var x=0; x< $('#slider_container .camera_pag_ul li').length; x++){
                        if ($('#slider_container .camera_pag_ul li').eq(x).hasClass('cameracurrent')){
                            ind = x;
                        }
                    }

                    //console.log(ind);
                    //var ind = $('#slider_container .camera_pag_ul li').find('.cameracurrent').index();
                    $('#white_content .camera_pag_ul').find('.cameracurrent').removeClass('cameracurrent');
                    $('#white_content .camera_pag_ul li').eq(ind).addClass('cameracurrent');
                    //$('.camera_target_content .cameraContent:eq('+ind+')').unbind('hover');

                    var source = $('#slider_container .camera_pag_ul li').eq(ind).html();

                    $('.camera_target_content .cameraContents').children().eq(ind).unbind('mouseenter mouseleave');

                },
                onEndTransition: function(){

                    if ($('.cameracurrent .camera_caption').length){
                        if ($('.cameracurrent .camera_caption').find('.title').length){
                            var animation = $('.cameracurrent .camera_caption').find('.title').attr('class').split(' ');
                            type = animation[0];
                            animation = animation[animation.length-1];
                            animateElement($('.cameracurrent .camera_caption').find('.title'), type, animation);
                        }
                        if ($('.cameracurrent .camera_caption').find('.text').length){
                            var animation = $('.cameracurrent .camera_caption').find('.text').attr('class').split(' ');
                            type = animation[0];
                            animation = animation[animation.length-1];
                            animateElement($('.cameracurrent .camera_caption').find('.text'), type, animation);
                        }
                        if ($('.cameracurrent .camera_caption').find('.image').length){
                            var animation = $('.cameracurrent .camera_caption').find('.image').attr('class').split(' ');
                            type = animation[0];
                            animation = animation[animation.length-1];
                            animateElement($('.cameracurrent .camera_caption').find('.image'), type, animation);
                        }
                        if ($('.cameracurrent .camera_caption').find('.button').length){
                            var animation = $('.cameracurrent .camera_caption').find('.button').attr('class').split(' ');
                            type = animation[0];
                            animation = animation[animation.length-1];
                            animateElement($('.cameracurrent .camera_caption').find('.button'), type, animation);
                        }

                    }

                }
            });

        }

    });

    function toggleCameraControls($toggle){
        if ($toggle.hasClass('closed')){

            $toggle.parents('.controls-mover').stop().animate({
                'top': '0px'
            }, 500, 'easeInOutExpo');

            $toggle.removeClass('closed').addClass('open').html('-');
        } else {

            $toggle.parents('.controls-mover').stop().animate({
                'top': '33px'
            }, 500, 'easeInOutExpo');

            $toggle.removeClass('open').addClass('closed').html('+');
        }
    }

</script>

</div>
</div><!-- #primary -->
</div><!-- enf of .container -->
</div><!-- end of wrapper -->

<?php //require_once("footer.php");
$this->load->view("website/footer");
?>

