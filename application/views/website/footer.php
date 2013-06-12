<?php
$arrData = $this->CPanel_model->site_configList(1);
var_dump($arrData[0]);
?>
<!-- START FOOTER -->
<div id="big_footer">
<div class="white_content_arrow">
    seta
</div>

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
                <h4>28 SOCIAL ICONS</h4>
                <hr>

                <!-- SOCIAL ICONS -->
                <div class="textwidget">
                    <div class='socialdiv'>
                        <ul>
                            <li><a href="http://www.facebook.com" target='_blank' class='facebook' title='Facebook'></a></li>

                            <li><a href="http://www.twitter.com" target='_blank' class='twitter' title='Twitter'></a></li>

                            <li><a href="http://www.facebook.com" target='_blank' class='forrst' title='Forrst'></a></li>

                            <li><a href="http://www.stumbleupon.com" target='_blank' class='stumble' title='Stumble'></a></li>

                            <li><a href="http://www.stumbleupon.com" target='_blank' class='flickr' title='Flickr'></a></li>

                            <li><a href="http://www.stumbleupon.com" target='_blank' class='linkedin' title='LinkedIn'></a></li>

                            <li><a href="http://www.twitter.com" target='_blank' class='delicious' title='Delicious'></a></li>

                            <li><a href="http://www.facebook.com" target='_blank' class='skype' title='Skype'></a></li>

                            <li><a href="http://www.twitter.com" target='_blank' class='digg' title='Digg'></a></li>

                            <li><a href="http://www.facebook.com" target='_blank' class='google' title='Google'></a></li>

                            <li><a href="http://www.twitter.com" target='_blank' class='vimeo' title='Vimeo'></a></li>

                            <li><a href="http://www.stumbleupon.com" target='_blank' class='picasa' title='Picasa'></a></li>

                            <li><a href="http://www.facebook.com" target='_blank' class='deviantart' title='DeviantArt'></a></li>

                            <li><a href="http://www.twitter.com" target='_blank' class='behance' title='Behance'></a></li>

                            <li><a href="http://www.stumbleupon.com" target='_blank' class='tumblr' title='Tumblr'></a></li>

                            <li><a href="http://www.facebook.com" target='_blank' class='viddler' title='Viddler'></a></li>

                            <li><a href="http://www.twitter.com" target='_blank' class='instagram' title='Instagram'></a></li>

                            <li><a href="http://www.stumbleupon.com" target='_blank' class='myspace' title='MySpace'></a></li>

                            <li><a href="http://www.facebook.com" target='_blank' class='blogger' title='Blogger'></a></li>

                            <li><a href="http://www.twitter.com" target='_blank' class='zerply' title='Zerply'></a></li>

                            <li><a href="http://www.stumbleupon.com" target='_blank' class='wordpress' title='Wordpress'></a></li>

                            <li><a href="http://www.twitter.com" target='_blank' class='grooveshark' title='GrooveShark'></a></li>

                            <li><a href="http://www.stumbleupon.com" target='_blank' class='youtube' title='Youtube'></a></li>

                            <li><a href="http://www.facebook.com" target='_blank' class='reddit' title='Reddit'></a></li>

                            <li><a href="http://www.twitter.com" target='_blank' class='rss' title='RSS'></a></li>

                            <li><a href="http://www.stumbleupon.com" target='_blank' class='soundcloud' title='Soundcloud'></a></li>

                            <li><a href="http://www.stumbleupon.com" target='_blank' class='pinterest' title='Pinterest'></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="four columns">
            <div class="recentPostsSidebar_widget">
                <h2>RECENT POSTS</h2>

                <ul class="recentposts_listing">
                    <li>
                        <div class="recentPostsSidebar slider"></div>

                        <div class="rc-container">
                            <a class="the_title" href="single-right.html">Perfect for your Business</a><br>
                            <span style="float:left;font-size: 11px; color: #999;font-weight: normal;" class="blog-i">by:&nbsp;</span><a style="font-size:11px;" class="the_author" href="#">admin</a>
                        </div>
                    </li>

                    <li>
                        <div class="recentPostsSidebar video"></div>

                        <div class="rc-container">
                            <a class="the_title" href="single-right.html">Powerful Corporate theme</a><br>
                            <span style="float:left;font-size: 11px; color: #999;font-weight: normal;" class="blog-i">by:&nbsp;</span><a style="font-size:11px;" class="the_author" href="#">admin</a>
                        </div>
                    </li>

                    <li>
                        <div class="recentPostsSidebar text"></div>

                        <div class="rc-container">
                            <a class="the_title" href="single-none.html">Welcome to Freshlook!</a><br>
                            <span style="float:left;font-size: 11px; color: #999;font-weight: normal;" class="blog-i">by:&nbsp;</span><a style="font-size:11px;" class="the_author" href="#">admin</a>
                        </div>
                    </li>

                    <li>
                        <div class="recentPostsSidebar video"></div>

                        <div class="rc-container">
                            <a class="the_title" href="single-right.html">The Man Who Sold The World</a><br>
                            <span style="float:left;font-size: 11px; color: #999;font-weight: normal;" class="blog-i">by:&nbsp;</span><a style="font-size:11px;" class="the_author" href="#">admin</a>
                        </div>
                    </li>

                    <li>
                        <div class="recentPostsSidebar image"></div>

                        <div class="rc-container">
                            <a class="the_title" href="http://designarethemes.com/themes/freshlookwp/ultra-responsive-wp/">Ultra responsive WP</a><br>
                            <span style="float:left;font-size: 11px; color: #999;font-weight: normal;" class="blog-i">by:&nbsp;</span><a style="font-size:11px;" class="the_author" href="#">admin</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="four columns">
            <div class="footer-widget widget_categories" id="categories-2">
                <h4>BLOG CATEGORIES</h4>
                <hr>

                <ul>
                    <li class="cat-item cat-item-4"><a href="#" title="View all posts filed under Architecture">Architecture</a></li>

                    <li class="cat-item cat-item-5"><a href="#" title="View all posts filed under Business">Business</a></li>

                    <li class="cat-item cat-item-6"><a href="#" title="View all posts filed under Choice">Choice</a></li>

                    <li class="cat-item cat-item-7"><a href="#" title="View all posts filed under Music">Music</a></li>

                    <li class="cat-item cat-item-8"><a href="#" title="View all posts filed under Photoshop">Photoshop</a></li>

                    <li class="cat-item cat-item-9"><a href="#" title="View all posts filed under Slider + Captions">Slider + Captions</a></li>

                    <li class="cat-item cat-item-10"><a href="#" title="View all posts filed under Video">Video</a></li>

                    <li class="cat-item cat-item-11"><a href="#" title="View all posts filed under Web Design">Web Design</a></li>
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

                    <form method="post" action="#" class="validateform">
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
                                <textarea name="message" id="message" class="yourmessage textarea message corner-input" rows="20" cols="30" onfocus="checkerror(this)" onblur="var v = $(this).val(); $('.yourmessage_val').html(v);">
                                </textarea>

                                <div class="yourmessage_val" style="display:none"></div>
                            </li>

                            <li>
                                <a id="send-comment" href="javascript:;" onclick="sendemail($(this),'geral@designarethemes.com', 'Email Subject', 'Name Error', 'Email Error', 'Message Error', 'Message Sent', 'Message Failed')" class="submit button small black round_corners">Send</a>
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

<!-- BLOG PAGINATION RELATED OPTIONS -->
<div style="display:none;" id="loader-startPage">0</div>

<div style="display:none;" id="loader-maxPages"></div>

<div style="display:none;" id="loader-nextLink">http://designarethemes.com/themes/freshlookwp/page/2/</div>

<div style="display:none;" id="reading_option"></div>

<div style="display:none;" id="freshlook_no_more_posts_text">No more posts to load.</div>

<div style="display:none;" id="freshlook_load_more_posts_text">Load More Posts</div>

<div style="display:none;" id="freshlook_loading_posts_text">Loading posts...</div>

<div style="display:none;" id="freshlook_links_color_hover"></div>

<!-- IMAGE LOADER -->
<div style="display:none;" class="loadinger"><img alt="loading" src="img/ajx_loading.gif"></div>
</body>
</html>
