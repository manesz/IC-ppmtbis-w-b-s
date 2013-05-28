<?php //require_once("header.php");
$this->load->view("website/header");
?>

<div class="everything">

    <!-- COLOR Switcher (hidden by default) -->
    <div id="option_wrapper" style="display: none;">

        <div class="inner">
            <div id="colorpicker"></div>
            <form style="margin: 20px 20px 0 28px;position: relative;top:12px;">
                <input type="text" id="color" name="color" value="#7AB317"/>
            </form>
        </div>

    </div>

    <div class="option_btn settings-close" style="display: none;"></div>
    <!-- END OF COLOR Switcher -->

    <?php //require_once("header-content.php");
    $this->load->view("website/header-content");
    ?>

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

    <div id="map" style=" width: 100%; height: 350px ;"></div>
    <input type="hidden" id="gm_lat" value="13.7500"/>
    <input type="hidden" id="gm_lng" value="100.4833"/>

    <div id="white_content" style="margin-top: 10px;"> <!-- begin white-content -->
        <div id="wrapper"> <!-- begin wrapper -->

            <div class="main_cols container">
                <div class="sixteen columns">
                    <br/>

                    <h1 style="font-size: 38px !important; font-weight: normal; color: #ccc; top: -20px; position: relative;">
                        We&#8217;d love to hear from you.</h1>

                    <div class="des-sc-dots-divider" style="top:-10px; position:relative;"></div>
                </div>
            </div>

            <div class="main_cols container">

                <div class="eight columns">

                    <!-- START: FLEXSLIDER -->
                    <div id="myslider-1" class="flexslider clearfix">
                        <h4 class="flex-title"></h4>

                        <h3>Welcome to <span style="color: #7ab317;">PROMPTBIS</span></h3>

                        <p>&nbsp;</p>
                        <!--<p>PROMPT has been established by a team of professionals highly experienced in many fields of expertise i.e. human resources, accounting, finance, asset management, logistics and information technology, etc.   The company aims to provide one-stop services of business consultations and solutions on the principles of highly quality, punctually, customer satisfaction and cost effectiveness.   To maximize customers' satisfaction and return on investment, we continuously maintain our standardization and develop our organization to serve the better in the future.</p><br/>-->
                        <p><?php echo $arrData->contact_content; ?></p><br/>

                        <div class="eight columns">
                            <h4>Additional Information</h4>
                            <p>
<!--                                <strong>Phone:</strong> (02) 694-3997<br/>-->
<!--                                <strong>Fax:</strong> (02) 694-3996<br/>-->
<!--                                <strong>Email:</strong>-->
                                <strong>Phone:</strong> <?php echo $arrData->contact_phone; ?><br/>
                                <strong>Fax:</strong> <?php echo $arrData->contact_fax;?><br/>
                                <strong>Email:</strong>
                                <a class="inlineAdmedialink" href="email:"><?php echo $arrData->contact_email; ?></a><br/>

                            <div class='socialdiv'>
                                <br/>
                                <ul>
                                    <li>
                                        <a href=http://www.facebook.com target='_blank' class='facebook'
                                           title='Facebook' style="cursor: pointer;"></a>
                                    </li>
                                    <li>
                                        <a href=http://www.twitter.com target='_blank' class='twitter'
                                           title='Twitter' style="cursor: pointer;"></a>
                                    </li>
                                    <!--                                        <li>-->
                                    <!--                                            <a href=http://www.stumbleupon.com target='_blank' class='linkedin' title='LinkedIn'></a>-->
                                    <!--                                        </li>-->
                                    <!--                                        <li>-->
                                    <!--                                            <a href=http://www.twitter.com target='_blank' class='vimeo' title='Vimeo'></a>-->
                                    <!--                                        </li>-->
                                    <!--                                        <li>-->
                                    <!--                                            <a href=http://www.stumbleupon.com target='_blank' class='picasa' title='Picasa'></a>-->
                                    <!--                                        </li>-->
                                </ul>
                            </div>
                            <br/><br/>

                            <!--                                <h4>Secondary Office</h4>-->
                            <!--                                <p><strong>Phone:</strong> (003) 001-7722<br />-->
                            <!--                                    <strong>Fax:</strong> +08 (003) 001-7722<br />-->
                            <!--                                    <strong>Email:</strong>-->
                            <!--                                    <a class="inlineAdmedialink" href="#">japan@freshlook.com</a><br />-->
                            <!--                                    <br />-->
                            <!--                                <div class="mapelas" id="map-394665123" style="width: 240px; height: 140px; border: 3px solid #eee"></div>-->
                            <!--                                <input type="hidden" id="gm_lat" value="35.331709" />-->
                            <!--                                <input type="hidden" id="gm_lng" value="137.460938" />-->

                        </div>

                    </div>
                    <script type="text/javascript">
                        $(document).ready(function () {
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
                                start: function (slider) {
                                    $("#myslider-1 .slides li").eq(slider.currentSlide).find(".flex-caption").animate({'bottom': '0'}, 500);
                                }, after: function (slider) {
                                    $("#myslider-1 .slides li").find(".flex-caption").each(function () {
                                        $(this).css('bottom', '-100px');
                                        if ($(this).parent().hasClass('clone')) {
                                        }
                                        else {
                                            $(this).animate({'bottom': '-100px'}, 500);
                                        }
                                    });
                                    $("#myslider-1 .slides li").eq(slider.currentSlide).find(".flex-caption").animate({'bottom': '0'}, 500);
                                }
                            });
                        });
                    </script>

                </div>

                <div class="eight columns">
                    <h4>Drop us a line</h4>

                    <div class="contact-form">
                        <div class="message_success form_success"></div>
                        <form method="post" action="#" class="validateform">
                            <ul class="forms">
                                <li>
                                    <label for="name">Name</label><input type="text" name="name"
                                                                         class="yourname txt corner-input"
                                                                         onfocus="checkerror(this)"
                                                                         onblur="var v = $(this).val(); $('.yourname_val').html(v);">

                                    <div class="yourname_val" style="display:none"></div>
                                </li>
                                <li>
                                    <label for="email">Email</label><input style="margin: 10px 0;" type="text"
                                                                           name="email"
                                                                           class="youremail txt corner-input"
                                                                           onfocus="checkerror(this)"
                                                                           onblur="var v = $(this).val(); $('.youremail_val').html(v);">

                                    <div class="youremail_val" style="display:none"></div>
                                </li>
                                <li>
                                    <label for="message">Message</label><textarea name="message"
                                                                                  class="yourmessage textarea message corner-input"
                                                                                  rows=20 cols=30
                                                                                  onfocus="checkerror(this)"
                                                                                  onblur="var v = $(this).val(); $('.yourmessage_val').html(v);"></textarea>

                                    <div class="yourmessage_val" style="display:none"></div>
                                </li>
                                <li>
                                    <a style="font-family: Arial, sans-serif;" id="send-comment" href="javascript:;"
                                       onclick="sendemail($(this),'geral@designarethemes.com', 'From Your Website', 'Please enter a name.', 'Please enter a valid email.', 'Please give us a message.', 'Thanks! We will back to you soon...', 'Ups! Something wrong. Try again.')"
                                       class="submit button medium yellow">Send</a>
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>
            <br/>

            <div class="container"> <!-- begin container -->

                <div class="post"> <!-- begin post -->

                    <div class="entry">

                        <div class="main_cols container">


                            <div class="eight columns">

                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>

</div><!-- end of wrapper -->

<?php //require_once("footer.php");
$this->load->view("website/footer");
?>

