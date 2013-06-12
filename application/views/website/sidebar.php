<?php
$arrHotJob = $this->CPanel_model->postList(0, true);
?>

<!-- SEARCH WIDGET -->
<div id="search-2" class="widget widget_search">
    <form role="search" method="get" id="searchform" action="<?php echo $webUrl; ?>website/search">
        <div>
            <label class="screen-reader-texts" for="s">Search for:</label>
            <input type="text" value="Find what you want..."
                   onfocus="if ($(this).val() === 'Find what you want...') $(this).val('');"
                   onblur="if ($(this).val() === '') $(this).val('Find what you want...');" name="s" id="s"/>
            <input type="submit" id="searchsubmit" value="Search"/>
        </div>
    </form>
</div>
<!-- END OF SEARCH WIDGET -->

<!-- VIDEO WIDGET -->
<div id="video_widget-2" class="widget video_widget">

    <div class="video_widget">

        <div class="video_frame">
            <iframe src="http://player.vimeo.com/video/47828920?title=0&amp;byline=0&amp;portrait=0&amp;autoplay=0"
                    width="205" height="150"></iframe>
        </div>
    </div>
</div>
<!-- END OF VIDEO WIDGET -->

<!-- RECENT POSTS -->
<div class="recentPostsSidebar_widget">

<!--    <h2>Recent Posts</h2>-->
    <h2>Hot Jobs</h2>

    <ul class="recentposts_listing">
        <?php foreach ($arrHotJob as $key => $value):
        ?>
        <li><a href="<?php echo $webUrl; ?>website/post/<?php echo $value->id; ?>"><?php echo $value->title; ?></a></li>
        <?php endforeach; ?>
        <!-- 1RST POST -->
        <!--        <li>-->
        <!--            <div class="recentPostsSidebar slider"></div>-->
        <!---->
        <!--            <div class="rc-container">-->
        <!--                <a class="the_title" href="single-left.php">Perfect for your Business</a><br />-->
        <!--                <span style="float:left;font-size: 11px; color: #999;font-weight: normal;" class="blog-i">by:&nbsp;</span>-->
        <!--                <a style="font-size:11px;" class="the_author" href="?author=1">admin</a>-->
        <!--            </div>-->
        <!--        </li>-->


        <!-- 2ND POST -->
        <!--        <li>-->
        <!--            <div class="recentPostsSidebar video"></div>-->
        <!---->
        <!--            <div class="rc-container">-->
        <!--                <a class="the_title" href="single-left.php">Powerful Corporate theme</a><br />-->
        <!--                <span style="float:left;font-size: 11px; color: #999;font-weight: normal;" class="blog-i">by:&nbsp;</span>-->
        <!--                <a style="font-size:11px;" class="the_author" href="?author=1">admin</a>-->
        <!--            </div>-->
        <!--        </li>-->


        <!-- 3RD POST -->
        <!--        <li>-->
        <!--            <div class="recentPostsSidebar text"></div>-->
        <!---->
        <!--            <div class="rc-container">-->
        <!--                <a class="the_title" href="single-left.php">Welcome to Freshlook!</a><br />-->
        <!--                <span style="float:left;font-size: 11px; color: #999;font-weight: normal;" class="blog-i">by:&nbsp;</span>-->
        <!--                <a style="font-size:11px;" class="the_author" href="?author=1">admin</a>-->
        <!--            </div>-->
        <!--        </li>-->


        <!-- 4TH POST -->
        <!--        <li>-->
        <!--            <div class="recentPostsSidebar video"></div>-->
        <!---->
        <!--            <div class="rc-container">-->
        <!--                <a class="the_title" href="single-left.php">The Man Who Sold The World</a><br />-->
        <!--                <span style="float:left;font-size: 11px; color: #999;font-weight: normal;" class="blog-i">by:&nbsp;</span>-->
        <!--                <a style="font-size:11px;" class="the_author" href="?author=1">admin</a>-->
        <!--            </div>-->
        <!--        </li>-->


        <!-- 5TH POST -->
        <!--        <li>-->
        <!--            <div class="recentPostsSidebar image"></div>-->
        <!---->
        <!--            <div class="rc-container">-->
        <!--                <a class="the_title" href="single-left.php">Ultra responsive WP</a><br />-->
        <!--                <span style="float:left;font-size: 11px; color: #999;font-weight: normal;" class="blog-i">by:&nbsp;</span>-->
        <!--                <a style="font-size:11px;" class="the_author" href="?author=1">admin</a>-->
        <!--            </div>-->
        <!--        </li>-->

    </ul>
</div>
<!-- END OF RECENT POSTS -->

<!-- FLICKR -->
<div id="flickr_widget-2" class="widget flickr_widget">
    <div class="flickr_container">
        <div class="title">
            <h4>Flickr Widget</h4>
        </div>
        <ul id="flickr" class="thumbs"></ul>
        <script>
            $(document).ready(function () {
                //flicker gadget
                $('#flickr').jflickrfeed({
                    limit: 12,
                    qstrings: {
                        id: ''
                    },
                    itemTemplate: '<li>' +
                        '<a rel="prettyPhoto[gallery1]" href="{{image}}" title="{{title}}">' +
                        '<img src="{{image_s}}" alt="{{title}}" />' +
                        '</a>' +
                        '</li>'
                }, function (data) {
                    $('#flickr a').prettyPhoto({autoplay_slideshow: false, deeplinking: false, show_title: false, social_tools: ''});
                });
            });
        </script>
    </div>
    <!-- END OF FLICKR -->
</div>