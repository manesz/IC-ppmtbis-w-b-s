<?php
$arrHotJob = $this->CPanel_model->postList(0, true);
?>

<!-- SEARCH WIDGET -->
<script>
    function ckSearch(frm) {
        if (frm.s.value == "Find what you want..." || frm.s.value == "") {
            frm.s.select();
            return false;
        }
        return true;
    }
</script>
<div id="search-2" class="widget widget_search">
    <form role="search" method="get" id="searchform" onsubmit="return ckSearch(this);"
          action="<?php echo $webUrl; ?>website/search">
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

<!-- RECENT POSTS -->
<div class="recentPostsSidebar_widget">
    <h2>HOT JOBS</h2>

    <ul class="recentposts_listing">
        <?php foreach ($arrHotJob as $key => $value):
        ?>
        <li><a href="<?php echo $webUrl; ?>website/post/<?php echo $value->id; ?>"><?php echo $value->title; ?></a></li>
        <?php endforeach; ?>
    </ul>
</div>
<!-- END OF RECENT POSTS -->

<!-- FACEBOOK WIDGET -->
<div id="video_widget-2" class="widget video_widget">

    <div class="video_widget">

        <div class="video_frame">
            <iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2FPROMPT%2F246528425359362&amp;height=290&amp;show_faces=true&amp;colorscheme=light&amp;stream=false&amp;show_border=false&amp;header=true&amp;appId=121360188027071" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100%; height:335px;" allowTransparency="true"></iframe>
        </div>
    </div>
</div>
<!-- END OF FACEBOOK WIDGET -->
