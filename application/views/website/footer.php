<?php
$arrData = $this->CPanel_model->site_configList(1);
$arrHotJob = $this->CPanel_model->postList(0, true);
$arrJobsMenu = $this->Website_model->getListJobMenu();
$arrPageTypeOurService = $this->CPanel_model->pageList(0, 2);

?>
<!-- START FOOTER -->
<div id="big_footer">
<div class="white_content_arrow">
    seta
</div>


<!-- Lightbox2 JS -->
<script src="<?php echo $assetUrl; ?>plugin/lightbox/js/jquery-1.7.2.min.js"></script>
<script src="<?php echo $assetUrl; ?>plugin/lightbox/js/jquery-ui-1.8.18.custom.min.js"></script>
<script src="<?php echo $assetUrl; ?>plugin/lightbox/js/jquery.smooth-scroll.min.js"></script>
<script src="<?php echo $assetUrl; ?>plugin/lightbox/js/lightbox.js"></script>

<!-- TWITTER SCROLLER SCRIPT -->
<script type="text/javascript">
    jQuery(function($){
        $(".tweet_scroll_text").tweet({
            username: "DesignareThemes",
            page: 1,
            avatar_size: 0,
            count: 5,
            loading_text: "loading ..."
        }).bind("loaded", function() {
                    var ul = $(this).find(".tweet_list");
                    var ticker = function() {
                        setTimeout(function() {
                            ul.find('li:first').animate( {marginTop: '-4em'}, 500, function() {
                                $(this).detach().appendTo(ul).removeAttr('style');
                            });
                            ticker();
                        }, 5000);
                    };
                    ticker();
                });
    });

    jQuery(document).ready(function($) {
//        $('a').smoothScroll({
//            speed: 1000,
//            easing: 'easeInOutCubic'
//        });

        $('.showOlderChanges').on('click', function(e){
            $('.changelog .old').slideDown('slow');
            $(this).fadeOut();
            e.preventDefault();
        })
    });
</script>

<!-- TWITTER SCROLLER -->
<div id="tweet_scroll_place">
    <div class="container tweet_bird">
        <div class="tweet_scroll_text sixteen columns"></div>
    </div>
</div>

<div id="footer_content">
    <div class="container">
        <div class="four columns">
            <div class="footer-widget widget_text" id="text-3">
                <h4>PROMPTBIS CONTACT</h4>
                <hr>

                <!-- SOCIAL ICONS -->
                <div class="textwidget">
                    <div>
                        <?php echo $arrData[0]->contact_address;?><br/>
                        Phone : <?php echo $arrData[0]->contact_phone;?><br/>
                        Fax : <?php echo $arrData[0]->contact_fax;?><br/>
                        Email : <?php echo $arrData[0]->contact_email;?><br/>
                    </div>
                </div>
            </div>
        </div>

        <div class="four columns">
            <div class="footer-widget widget_categories" id="">
                <h4>HOT JOBS</h4>

                <ul>
                    <?php foreach ($arrHotJob as $key => $value):
                    ?>
                    <li><a href="<?php echo $webUrl; ?>website/post/<?php echo $value->id; ?>"><?php echo $value->title; ?></a></li>
                    <?php endforeach; ?>
<!--                    <li>-->
<!--                        <div class="recentPostsSidebar slider"></div>-->
<!---->
<!--                        <div class="rc-container">-->
<!--                            <a class="the_title" href="single-right.html">Perfect for your Business</a><br>-->
<!--                            <span style="float:left;font-size: 11px; color: #999;font-weight: normal;" class="blog-i">by:&nbsp;</span><a style="font-size:11px;" class="the_author" href="#">admin</a>-->
<!--                        </div>-->
<!--                    </li>-->
                </ul>
            </div>
        </div>

        <div class="four columns">
            <div class="footer-widget widget_categories" id="categories-2">
                <h4>LASTEST JOBS</h4>
                <hr>

            <ul class="sub-menu">
                <?php $oldID = ""; ?>
                <?php foreach ($arrJobsMenu as $key => $value) : ?>
                <li><a href="#"><?php echo $value->type_name; ?> / <?php echo $value->title; ?></a></li>
                <?php endforeach; ?>
            </ul>
            </div>
        </div>

        <div class="four columns">
            <div class="footer-widget contact_form_widget" id="contactform_widget-2">
                <div class="title">
                    <h4>CONTACT FORM WIDGET</h4>
                </div>

                <!-- CONTACT FORM WIDGET -->
                <div class="contact-form">
                    <div class="message_success form_success"></div>
                    <script>
                        var urlSendEmail = "<?php echo $webUrl; ?>website/sendEmail";
                        var emailSender = '<?php echo $arrData[0]->contact_email;?>';
                        //var emailSender = 'info@ideacorners.com';
                    </script>
                    <form method="post" action="#" class="validateform" id="frmFooterSendEmail">
                        <ul class="forms">
                            <li>
                                <label for="name">Name</label><input type="text" name="name" id="name" class="yourname txt corner-input" onfocus="checkerror(this)" onblur="var v = $(this).val(); $('.yourname_val').html(v);">

                                <div class="yourname_val" style="display:none"></div>
                            </li>
                            <li>
                                <label for="email">Email</label><input type="text" name="email" id="email" class="youremail txt corner-input" onfocus="checkerror(this)" onblur="var v = $(this).val(); $('.youremail_val').html(v);">

                                <div class="youremail_val" style="display:none"></div>
                            </li>
                            <li>
                                <label for="message">Message</label>
                                <textarea name="message" id="message" class="yourmessage textarea message corner-input"
                                          rows="20" cols="30" onfocus="checkerror(this)"
                                          onblur="var v = $(this).val(); $('.yourmessage_val').html(v);"></textarea>
                                <div class="yourmessage_val" style="display:none"></div>
                            </li>
                            <li>
                                <a id="send-comment" href="javascript:;" onclick="sendemail($(this),
                                emailSender, 'CONTACT FORM WIDGET', 'Name Error', 'Email Error',
                                'Message Error', 'Message Sent', 'Message Failed',
                                document.getElementById('frmFooterSendEmail'))"
                                   class="submit button small black round_corners">Send</a>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="copys">
    <div class="container">
        <div class="copys_left eight columns">
            © Copyrights 2013
        </div>

        <div class="copys_right eight columns">
            <ul id="footer_menu" class="footer_menu">
                <li class="menu-item">
                    <a href="<?php echo $webUrl; ?>">Home</a>
                </li>

                <li class="menu-item">
                    <a href="#">Site Map</a>
                </li>

                <li class="menu-item">
                    <a href="#">Site terms</a>
                </li>

                <li class="menu-item">
                    <a href="#">Support</a>
                </li>

                <li class="menu-item">
                    <a href="#">Buy theme</a>
                </li>
            </ul>
        </div>
    </div>
</div>
</div>
<!-- end of everything -->

<!-- GOOGLE ANALYTICS -->

<!-- END OF GOOGLE ANALYTICS -->


<!-- BODY TYPE: OPTIONS: full | boxed -->
<div id="bodyLayoutType" style="display:none;">full</div>

<!-- if body type == boxed, choose between "image", "pattern" or "color" -->
<div id="bodyBoxedType" class="image" style="display:none;">http://designarethemes.com/themes/freshlookwp/wp-content/uploads/2012/11/1353782739bigsize.jpg</div>

<div id="templatepath" style="display:none;">http://designarethemes.com/test/FLhtml/</div>

<div id="homeURL" style="display:none;">http://designarethemes.com/test/FLhtml/</div>

<!-- GENERAL COLOR TO BE APPLIED -->
<div id="styleColor" style="display:none;">#7AB317</div>



<!-- IMAGE LOADER -->
<div style="display:none;" class="loadinger"><img alt="loading" src="<?php echo base_url(); ?>assets/img/ajx_loading.gif"></div>
</body>
</html>
