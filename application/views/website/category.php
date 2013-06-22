<?php
$this->load->view("website/header.php");
$this->load->view("website/functions.php");
$this->load->view("website/header-content.php");
$this->load->view("website/title.php");
$arrPageTypeOurService = $this->CPanel_model->pageList(0, 2);
$arrJobsMenu = $this->Website_model->getListJobMenu();
?>
    <div id="white_content">

    <div id="wrapper">

    <div class="container">
    <div class="reset_960">

    <article id="projects-1" class="post-119 page type-page status-publish hentry" role="article">


    <div class="entry-content">
    <div class="moreinfo_text sixteen columns">
        <div class="filterby">
            <div class="filterby_btn closed" onclick="toggleFilter($(this));">Filter by
                <div class="arrow-right"></div>
            </div>
            <ul class="projectCategories">
                <ul class="splitter">
                    <li id='term_id_-1' class='segment-1 selected-1 termCat active'>
                        <a class='no-flicker' href='javascript:;'
                           data-value='all'>ALL</a>
                    </li>
                    <?php
                    $oldType = "";
                    foreach ($arrJobsMenu as $key => $value):
                        if ($oldType != $value->type) {
                            $oldType = $value->type;
                            ?>
                                <li id='term_id_<?php echo $key + 1; ?>' class='segment-0 termCat'>
                                    <a href='javascript:;' class='no-flicker'
                                       data-value='filter-<?php echo $value->type; ?>'><?php echo $value->type_name; ?></a>
                                </li>
                       <?php }?>
                    <?php endforeach; ?>
                    <!--                    <li id='term_id_11' class='segment-0 termCat'>-->
                    <!--                        <a href='javascript:;' class='no-flicker' data-value='web-design'>Web Design</a>-->
                    <!--                    </li>-->
                    <!---->
                    <!--                    <li id='term_id_13' class='segment-0 termCat'>-->
                    <!--                        <a href='javascript:;' class='no-flicker' data-value='illustration'>Illustration</a>-->
                    <!--                    </li>-->
                    <!---->
                    <!--                    <li id='term_id_16' class='segment-0 termCat'>-->
                    <!--                        <a href='javascript:;' class='no-flicker' data-value='branding'>Branding</a>-->
                    <!--                    </li>-->
                    <!---->
                    <!--                    <li id='term_id_19' class='segment-0 termCat'>-->
                    <!--                        <a href='javascript:;' class='no-flicker' data-value='photography'>Photography</a>-->
                    <!--                    </li>-->
                </ul>
            </ul>
        </div>

    </div>
    <!-- #END moreinfo_text -->

    <div class="thumbnails_list">
    <ul id="da-thumbs" class="da-thumbs proj_list">

    <!-- 1RST ELEMENT -->
    <?php foreach ($arrData as $key => $value):?>
    <li data-id="id-1" class="filter-<?php echo $value->type; ?>  slides_item post-thumb view four columns ">
        <a href="<?php echo $webUrl; ?>website/post/<?php echo $value->id; ?>">
            <img src="http://designarethemes.com/themes/freshlookwp/wp-content/uploads/2012/11/thumb_1.jpg" class="nc4"
                 alt="<?php echo $value->title; ?>" title="<?php echo $value->title; ?>">
            <div>
                <span class="overlay_title"><?php echo $value->title; ?></span>
													<span class="overlay_categories">
														<span><?php echo $value->type_name; ?></span>
													</span>
													<span class="icons_container"
                                                          style="position:relative; width: 100%; float: left;">
<!--														<div class="magnify_this_thumb"-->
<!--                                                             style="position: relative; width: 30px; height: 30px; float:left; top: 20px; left: 45px; color: black; background: white;">-->
<!--                                                            <img-->
<!--                                                                src="http://designarethemes.com/themes/freshlookwp/wp-content/themes/freshlook/img/magnifying_glass_16x16.png"-->
<!--                                                                style="margin-top: 7px; margin-left: 7px; opacity: .8 !important;"-->
<!--                                                                alt=""/>-->
<!--                                                        </div>-->
														<div class="hyperlink_this_thumb"
                                                             onclick="window.location = '<?php echo $webUrl; ?>website/post/<?php echo $value->id; ?>';"
                                                             style="position: relative; width: 30px; height: 30px; top: 20px; float: left; margin-left: 50px; color: black; background: white;">
                                                            <img
                                                                src="http://designarethemes.com/themes/freshlookwp/wp-content/themes/freshlook/img/link_16x16.png"
                                                                style="margin-top: 7px; margin-left: 7px; opacity: .8 !important;"
                                                                alt=""/>
                                                        </div>
													</span>
            </div>
        </a>
        <a class="pp-link" style="display:none;"
           href="http://designarethemes.com/themes/freshlookwp/wp-content/uploads/2012/11/thumb_1.jpg"><?php echo $value->type_name; ?></a>
    </li>
    <?php endforeach; ?>

    <!--    <li data-id="id-1" class="branding  slides_item post-thumb view four columns ">-->
<!--        <a href="javascript:;">-->
<!--            <img src="http://designarethemes.com/themes/freshlookwp/wp-content/uploads/2012/11/thumb_1.jpg" class="nc4"-->
<!--                 alt="Winged Angel" title="Winged Angel">-->
<!---->
<!--            <div>-->
<!--                <span class="overlay_title">Winged Angel</span>-->
<!--													<span class="overlay_categories">-->
<!--														<span>Branding</span>-->
<!--													</span>-->
<!--													<span class="icons_container"-->
<!--                                                          style="position:relative; width: 100%; float: left;">-->
<!--														<div class="magnify_this_thumb"-->
<!--                                                             style="position: relative; width: 30px; height: 30px; float:left; top: 20px; left: 45px; color: black; background: white;">-->
<!--                                                            <img-->
<!--                                                                src="http://designarethemes.com/themes/freshlookwp/wp-content/themes/freshlook/img/magnifying_glass_16x16.png"-->
<!--                                                                style="margin-top: 7px; margin-left: 7px; opacity: .8 !important;"-->
<!--                                                                alt=""/>-->
<!--                                                        </div>-->
<!--														<div class="hyperlink_this_thumb"-->
<!--                                                             onclick="window.location = 'single-project.html';"-->
<!--                                                             style="position: relative; width: 30px; height: 30px; top: 20px; float: left; margin-left: 50px; color: black; background: white;">-->
<!--                                                            <img-->
<!--                                                                src="http://designarethemes.com/themes/freshlookwp/wp-content/themes/freshlook/img/link_16x16.png"-->
<!--                                                                style="margin-top: 7px; margin-left: 7px; opacity: .8 !important;"-->
<!--                                                                alt=""/>-->
<!--                                                        </div>-->
<!--													</span>-->
<!--            </div>-->
<!--        </a>-->
<!--        <a class="pp-link" style="display:none;"-->
<!--           href="http://designarethemes.com/themes/freshlookwp/wp-content/uploads/2012/11/thumb_1.jpg">prettyphoto</a>-->
<!--    </li>-->
    <!-- END OF 1RST ELEMENT -->

    <!-- 2ND ELEMENT -->
<!--    <li data-id="id-2" class="illustration  slides_item post-thumb view four columns ">-->
<!--        <a href="javascript:;">-->
<!--            <img src="http://designarethemes.com/themes/freshlookwp/wp-content/uploads/2012/11/thumb_2.jpg" class="nc4"-->
<!--                 alt="Not the end" title="Not the end">-->
<!---->
<!--            <div>-->
<!--                <span class="overlay_title">Not the end</span>-->
<!--													<span class="overlay_categories">-->
<!--														<span>Illustration</span>-->
<!--													</span>-->
<!--													<span class="icons_container"-->
<!--                                                          style="position:relative; width: 100%; float: left;">-->
<!--														<div class="magnify_this_thumb"-->
<!--                                                             style="position: relative; width: 30px; height: 30px; float:left; top: 20px; left: 45px; color: black; background: white;">-->
<!--                                                            <img-->
<!--                                                                src="http://designarethemes.com/themes/freshlookwp/wp-content/themes/freshlook/img/magnifying_glass_16x16.png"-->
<!--                                                                style="margin-top: 7px; margin-left: 7px; opacity: .8 !important;"-->
<!--                                                                alt=""/>-->
<!--                                                        </div>-->
<!--														<div class="hyperlink_this_thumb"-->
<!--                                                             onclick="window.location = 'single-project.html';"-->
<!--                                                             style="position: relative; width: 30px; height: 30px; top: 20px; float: left; margin-left: 50px; color: black; background: white;">-->
<!--                                                            <img-->
<!--                                                                src="http://designarethemes.com/themes/freshlookwp/wp-content/themes/freshlook/img/link_16x16.png"-->
<!--                                                                style="margin-top: 7px; margin-left: 7px; opacity: .8 !important;"-->
<!--                                                                alt=""/>-->
<!--                                                        </div>-->
<!--													</span>-->
<!--            </div>-->
<!--        </a>-->
<!--        <a class="pp-link" style="display:none;"-->
<!--           href="http://designarethemes.com/themes/freshlookwp/wp-content/uploads/2012/11/thumb_2.jpg">prettyphoto</a>-->
<!--    </li>-->
    <!-- END OF 2ND ELEMENT -->

    <!-- 3RD ELEMENT -->
<!--    <li data-id="id-3" class="branding illustration  slides_item post-thumb view four columns ">-->
<!--        <a href="javascript:;">-->
<!--            <img src="http://designarethemes.com/themes/freshlookwp/wp-content/uploads/2012/11/thumb_555.png"-->
<!--                 class="nc4" alt="Tap Wall &#8211; Boxed" title="Tap Wall &#8211; Boxed">-->
<!---->
<!--            <div>-->
<!--                <span class="overlay_title">Tap Wall &#8211; Boxed</span>-->
<!--													<span class="overlay_categories">-->
<!--														<span>Branding</span>-->
<!--														<span>Illustration</span>-->
<!--													</span>-->
<!--													<span class="icons_container"-->
<!--                                                          style="position:relative; width: 100%; float: left;">-->
<!--														<div class="magnify_this_thumb"-->
<!--                                                             style="position: relative; width: 30px; height: 30px; float:left; top: 20px; left: 45px; color: black; background: white;">-->
<!--                                                            <img-->
<!--                                                                src="http://designarethemes.com/themes/freshlookwp/wp-content/themes/freshlook/img/magnifying_glass_16x16.png"-->
<!--                                                                style="margin-top: 7px; margin-left: 7px; opacity: .8 !important;"-->
<!--                                                                alt=""/>-->
<!--                                                        </div>-->
<!--														<div class="hyperlink_this_thumb"-->
<!--                                                             onclick="window.location = 'single-project.html';"-->
<!--                                                             style="position: relative; width: 30px; height: 30px; top: 20px; float: left; margin-left: 50px; color: black; background: white;">-->
<!--                                                            <img-->
<!--                                                                src="http://designarethemes.com/themes/freshlookwp/wp-content/themes/freshlook/img/link_16x16.png"-->
<!--                                                                style="margin-top: 7px; margin-left: 7px; opacity: .8 !important;"-->
<!--                                                                alt=""/>-->
<!--                                                        </div>-->
<!--													</span>-->
<!--            </div>-->
<!--        </a>-->
<!--        <a class="pp-link" style="display:none;"-->
<!--           href="http://designarethemes.com/themes/freshlookwp/wp-content/uploads/2012/11/thumb_555.png">prettyphoto</a>-->
<!--    </li>-->
    <!-- END OF 3RD ELEMENT -->

    <!-- 4TH ELEMENT -->
<!--    <li data-id="id-4" class="photography  slides_item post-thumb view four columns ">-->
<!--        <a href="javascript:;">-->
<!--            <img src="http://designarethemes.com/themes/freshlookwp/wp-content/uploads/2012/11/thumb_33.png" class="nc4"-->
<!--                 alt="Refined Boxed" title="Refined Boxed">-->
<!---->
<!--            <div>-->
<!--                <span class="overlay_title">Refined Boxed</span>-->
<!--													<span class="overlay_categories">-->
<!--														<span>Photography</span>-->
<!--													</span>-->
<!--													<span class="icons_container"-->
<!--                                                          style="position:relative; width: 100%; float: left;">-->
<!--														<div class="magnify_this_thumb"-->
<!--                                                             style="position: relative; width: 30px; height: 30px; float:left; top: 20px; left: 45px; color: black; background: white;">-->
<!--                                                            <img-->
<!--                                                                src="http://designarethemes.com/themes/freshlookwp/wp-content/themes/freshlook/img/magnifying_glass_16x16.png"-->
<!--                                                                style="margin-top: 7px; margin-left: 7px; opacity: .8 !important;"-->
<!--                                                                alt=""/>-->
<!--                                                        </div>-->
<!--														<div class="hyperlink_this_thumb"-->
<!--                                                             onclick="window.location = 'single-project.html';"-->
<!--                                                             style="position: relative; width: 30px; height: 30px; top: 20px; float: left; margin-left: 50px; color: black; background: white;">-->
<!--                                                            <img-->
<!--                                                                src="http://designarethemes.com/themes/freshlookwp/wp-content/themes/freshlook/img/link_16x16.png"-->
<!--                                                                style="margin-top: 7px; margin-left: 7px; opacity: .8 !important;"-->
<!--                                                                alt=""/>-->
<!--                                                        </div>-->
<!--													</span>-->
<!--            </div>-->
<!--        </a>-->
<!--        <a class="pp-link" style="display:none;"-->
<!--           href="http://designarethemes.com/themes/freshlookwp/wp-content/uploads/2012/11/thumb_33.png">prettyphoto</a>-->
<!--    </li>-->
    <!-- END OF 4TH ELEMENT -->

    <!-- 5TH ELEMENT -->
<!--    <li data-id="id-5" class="branding illustration  slides_item post-thumb view four columns ">-->
<!--        <a href="javascript:;">-->
<!--            <img src="http://designarethemes.com/themes/freshlookwp/wp-content/uploads/2012/11/thumb_3.jpg" class="nc4"-->
<!--                 alt="TapWall" title="TapWall">-->
<!---->
<!--            <div>-->
<!--                <span class="overlay_title">TapWall</span>-->
<!--													<span class="overlay_categories">-->
<!--														<span>Branding</span>-->
<!--														<span>Illustration</span>-->
<!--													</span>-->
<!--													<span class="icons_container"-->
<!--                                                          style="position:relative; width: 100%; float: left;">-->
<!--														<div class="magnify_this_thumb"-->
<!--                                                             style="position: relative; width: 30px; height: 30px; float:left; top: 20px; left: 45px; color: black; background: white;">-->
<!--                                                            <img-->
<!--                                                                src="http://designarethemes.com/themes/freshlookwp/wp-content/themes/freshlook/img/magnifying_glass_16x16.png"-->
<!--                                                                style="margin-top: 7px; margin-left: 7px; opacity: .8 !important;"-->
<!--                                                                alt=""/>-->
<!--                                                        </div>-->
<!--														<div class="hyperlink_this_thumb"-->
<!--                                                             onclick="window.location = 'single-project.html';"-->
<!--                                                             style="position: relative; width: 30px; height: 30px; top: 20px; float: left; margin-left: 50px; color: black; background: white;">-->
<!--                                                            <img-->
<!--                                                                src="http://designarethemes.com/themes/freshlookwp/wp-content/themes/freshlook/img/link_16x16.png"-->
<!--                                                                style="margin-top: 7px; margin-left: 7px; opacity: .8 !important;"-->
<!--                                                                alt=""/>-->
<!--                                                        </div>-->
<!--													</span>-->
<!--            </div>-->
<!--        </a>-->
<!--        <a class="pp-link" style="display:none;"-->
<!--           href="http://designarethemes.com/themes/freshlookwp/wp-content/uploads/2012/11/thumb_3.jpg">prettyphoto</a>-->
<!--    </li>-->
    <!-- END OF 5TH ELEMENT -->

    <!-- 6TH ELEMENT -->
<!--    <li data-id="id-6" class="photography web-design  slides_item post-thumb view four columns ">-->
<!--        <a href="javascript:;">-->
<!--            <img src="http://designarethemes.com/themes/freshlookwp/wp-content/uploads/2012/11/thumb_4.jpg" class="nc4"-->
<!--                 alt="Refined" title="Refined">-->
<!---->
<!--            <div>-->
<!--                <span class="overlay_title">Refined</span>-->
<!--													<span class="overlay_categories">-->
<!--														<span>Photography</span>-->
<!--														<span>Web Design</span>-->
<!--													</span>-->
<!--													<span class="icons_container"-->
<!--                                                          style="position:relative; width: 100%; float: left;">-->
<!--														<div class="magnify_this_thumb"-->
<!--                                                             style="position: relative; width: 30px; height: 30px; float:left; top: 20px; left: 45px; color: black; background: white;">-->
<!--                                                            <img-->
<!--                                                                src="http://designarethemes.com/themes/freshlookwp/wp-content/themes/freshlook/img/magnifying_glass_16x16.png"-->
<!--                                                                style="margin-top: 7px; margin-left: 7px; opacity: .8 !important;"-->
<!--                                                                alt=""/>-->
<!--                                                        </div>-->
<!--														<div class="hyperlink_this_thumb"-->
<!--                                                             onclick="window.location = 'single-project.html';"-->
<!--                                                             style="position: relative; width: 30px; height: 30px; top: 20px; float: left; margin-left: 50px; color: black; background: white;">-->
<!--                                                            <img-->
<!--                                                                src="http://designarethemes.com/themes/freshlookwp/wp-content/themes/freshlook/img/link_16x16.png"-->
<!--                                                                style="margin-top: 7px; margin-left: 7px; opacity: .8 !important;"-->
<!--                                                                alt=""/>-->
<!--                                                        </div>-->
<!--													</span>-->
<!--            </div>-->
<!--        </a>-->
<!--        <a class="pp-link" style="display:none;"-->
<!--           href="http://designarethemes.com/themes/freshlookwp/wp-content/uploads/2012/11/thumb_4.jpg">prettyphoto</a>-->
<!--    </li>-->
    <!-- END OF 6TH ELEMENT -->

    <!-- 7TH ELEMENT -->
<!--    <li data-id="id-7" class="illustration photography  slides_item post-thumb view four columns ">-->
<!--        <a href="javascript:;">-->
<!--            <img src="http://designarethemes.com/themes/freshlookwp/wp-content/uploads/2012/11/thumb_5.jpg" class="nc4"-->
<!--                 alt="AlteredPart02" title="AlteredPart02">-->
<!---->
<!--            <div>-->
<!--                <span class="overlay_title">AlteredPart02</span>-->
<!--													<span class="overlay_categories">-->
<!--														<span>Illustration</span>-->
<!--														<span>Photography</span>-->
<!--													</span>-->
<!--													<span class="icons_container"-->
<!--                                                          style="position:relative; width: 100%; float: left;">-->
<!--														<div class="magnify_this_thumb"-->
<!--                                                             style="position: relative; width: 30px; height: 30px; float:left; top: 20px; left: 45px; color: black; background: white;">-->
<!--                                                            <img-->
<!--                                                                src="http://designarethemes.com/themes/freshlookwp/wp-content/themes/freshlook/img/magnifying_glass_16x16.png"-->
<!--                                                                style="margin-top: 7px; margin-left: 7px; opacity: .8 !important;"-->
<!--                                                                alt=""/>-->
<!--                                                        </div>-->
<!--														<div class="hyperlink_this_thumb"-->
<!--                                                             onclick="window.location = 'single-project.html';"-->
<!--                                                             style="position: relative; width: 30px; height: 30px; top: 20px; float: left; margin-left: 50px; color: black; background: white;">-->
<!--                                                            <img-->
<!--                                                                src="http://designarethemes.com/themes/freshlookwp/wp-content/themes/freshlook/img/link_16x16.png"-->
<!--                                                                style="margin-top: 7px; margin-left: 7px; opacity: .8 !important;"-->
<!--                                                                alt=""/>-->
<!--                                                        </div>-->
<!--													</span>-->
<!--            </div>-->
<!--        </a>-->
<!--        <a class="pp-link" style="display:none;"-->
<!--           href="http://designarethemes.com/themes/freshlookwp/wp-content/uploads/2012/11/thumb_5.jpg">prettyphoto</a>-->
<!--    </li>-->
    <!-- END OF 7TH ELEMENT -->

    <!-- 8TH ELEMENT -->
<!--    <li data-id="id-8" class="illustration  slides_item post-thumb view four columns ">-->
<!--        <a href="javascript:;">-->
<!--            <img src="http://designarethemes.com/themes/freshlookwp/wp-content/uploads/2012/11/thumb_6.jpg" class="nc4"-->
<!--                 alt="Absolut" title="Absolut">-->
<!---->
<!--            <div>-->
<!--                <span class="overlay_title">Absolut</span>-->
<!--													<span class="overlay_categories">-->
<!--														<span>Illustration</span>-->
<!--													</span>-->
<!--													<span class="icons_container"-->
<!--                                                          style="position:relative; width: 100%; float: left;">-->
<!--														<div class="magnify_this_thumb"-->
<!--                                                             style="position: relative; width: 30px; height: 30px; float:left; top: 20px; left: 45px; color: black; background: white;">-->
<!--                                                            <img-->
<!--                                                                src="http://designarethemes.com/themes/freshlookwp/wp-content/themes/freshlook/img/magnifying_glass_16x16.png"-->
<!--                                                                style="margin-top: 7px; margin-left: 7px; opacity: .8 !important;"-->
<!--                                                                alt=""/>-->
<!--                                                        </div>-->
<!--														<div class="hyperlink_this_thumb"-->
<!--                                                             onclick="window.location = 'single-project.html';"-->
<!--                                                             style="position: relative; width: 30px; height: 30px; top: 20px; float: left; margin-left: 50px; color: black; background: white;">-->
<!--                                                            <img-->
<!--                                                                src="http://designarethemes.com/themes/freshlookwp/wp-content/themes/freshlook/img/link_16x16.png"-->
<!--                                                                style="margin-top: 7px; margin-left: 7px; opacity: .8 !important;"-->
<!--                                                                alt=""/>-->
<!--                                                        </div>-->
<!--													</span>-->
<!--            </div>-->
<!--        </a>-->
<!--        <a class="pp-link" style="display:none;"-->
<!--           href="http://designarethemes.com/themes/freshlookwp/wp-content/uploads/2012/11/thumb_6.jpg">prettyphoto</a>-->
<!--    </li>-->
    <!-- END OF 8TH ELEMENT -->

    <!-- 9TH ELEMENT -->
<!--    <li data-id="id-9" class="video  slides_item post-thumb view four columns ">-->
<!--        <a href="javascript:;">-->
<!--            <img src="http://designarethemes.com/themes/freshlookwp/wp-content/uploads/2012/12/thumb_7.jpg" class="nc4"-->
<!--                 alt="Video Project" title="Video Project">-->
<!---->
<!--            <div>-->
<!--                <span class="overlay_title">Video Project</span>-->
<!--													<span class="overlay_categories">-->
<!--														<span>Video</span>-->
<!--													</span>-->
<!--													<span class="icons_container"-->
<!--                                                          style="position:relative; width: 100%; float: left;">-->
<!--														<div class="magnify_this_thumb"-->
<!--                                                             style="position: relative; width: 30px; height: 30px; float:left; top: 20px; left: 45px; color: black; background: white;">-->
<!--                                                            <img-->
<!--                                                                src="http://designarethemes.com/themes/freshlookwp/wp-content/themes/freshlook/img/magnifying_glass_16x16.png"-->
<!--                                                                style="margin-top: 7px; margin-left: 7px; opacity: .8 !important;"-->
<!--                                                                alt=""/>-->
<!--                                                        </div>-->
<!--														<div class="hyperlink_this_thumb"-->
<!--                                                             onclick="window.location = 'single-project-video-simple.html';"-->
<!--                                                             style="position: relative; width: 30px; height: 30px; top: 20px; float: left; margin-left: 50px; color: black; background: white;">-->
<!--                                                            <img-->
<!--                                                                src="http://designarethemes.com/themes/freshlookwp/wp-content/themes/freshlook/img/link_16x16.png"-->
<!--                                                                style="margin-top: 7px; margin-left: 7px; opacity: .8 !important;"-->
<!--                                                                alt=""/>-->
<!--                                                        </div>-->
<!--													</span>-->
<!--            </div>-->
<!--        </a>-->
<!--        <a class="pp-link" style="display:none;"-->
<!--           href="http://designarethemes.com/themes/freshlookwp/wp-content/uploads/2012/12/thumb_7.jpg">prettyphoto</a>-->
<!--    </li>-->
    <!-- END OF 9TH ELEMENT -->

    <!-- 1RST ELEMENT -->
<!--    <li data-id="id-1" class="branding  slides_item post-thumb view four columns ">-->
<!--        <a href="javascript:;">-->
<!--            <img src="http://designarethemes.com/themes/freshlookwp/wp-content/uploads/2012/11/thumb_1.jpg" class="nc4"-->
<!--                 alt="Winged Angel" title="Winged Angel">-->
<!---->
<!--            <div>-->
<!--                <span class="overlay_title">Winged Angel</span>-->
<!--													<span class="overlay_categories">-->
<!--														<span>Branding</span>-->
<!--													</span>-->
<!--													<span class="icons_container"-->
<!--                                                          style="position:relative; width: 100%; float: left;">-->
<!--														<div class="magnify_this_thumb"-->
<!--                                                             style="position: relative; width: 30px; height: 30px; float:left; top: 20px; left: 45px; color: black; background: white;">-->
<!--                                                            <img-->
<!--                                                                src="http://designarethemes.com/themes/freshlookwp/wp-content/themes/freshlook/img/magnifying_glass_16x16.png"-->
<!--                                                                style="margin-top: 7px; margin-left: 7px; opacity: .8 !important;"-->
<!--                                                                alt=""/>-->
<!--                                                        </div>-->
<!--														<div class="hyperlink_this_thumb"-->
<!--                                                             onclick="window.location = 'single-project.html';"-->
<!--                                                             style="position: relative; width: 30px; height: 30px; top: 20px; float: left; margin-left: 50px; color: black; background: white;">-->
<!--                                                            <img-->
<!--                                                                src="http://designarethemes.com/themes/freshlookwp/wp-content/themes/freshlook/img/link_16x16.png"-->
<!--                                                                style="margin-top: 7px; margin-left: 7px; opacity: .8 !important;"-->
<!--                                                                alt=""/>-->
<!--                                                        </div>-->
<!--													</span>-->
<!--            </div>-->
<!--        </a>-->
<!--        <a class="pp-link" style="display:none;"-->
<!--           href="http://designarethemes.com/themes/freshlookwp/wp-content/uploads/2012/11/thumb_1.jpg">prettyphoto</a>-->
<!--    </li>-->
    <!-- END OF 1RST ELEMENT -->

    <!-- 2ND ELEMENT -->
<!--    <li data-id="id-2" class="illustration  slides_item post-thumb view four columns ">-->
<!--        <a href="javascript:;">-->
<!--            <img src="http://designarethemes.com/themes/freshlookwp/wp-content/uploads/2012/11/thumb_2.jpg" class="nc4"-->
<!--                 alt="Not the end" title="Not the end">-->
<!---->
<!--            <div>-->
<!--                <span class="overlay_title">Not the end</span>-->
<!--													<span class="overlay_categories">-->
<!--														<span>Illustration</span>-->
<!--													</span>-->
<!--													<span class="icons_container"-->
<!--                                                          style="position:relative; width: 100%; float: left;">-->
<!--														<div class="magnify_this_thumb"-->
<!--                                                             style="position: relative; width: 30px; height: 30px; float:left; top: 20px; left: 45px; color: black; background: white;">-->
<!--                                                            <img-->
<!--                                                                src="http://designarethemes.com/themes/freshlookwp/wp-content/themes/freshlook/img/magnifying_glass_16x16.png"-->
<!--                                                                style="margin-top: 7px; margin-left: 7px; opacity: .8 !important;"-->
<!--                                                                alt=""/>-->
<!--                                                        </div>-->
<!--														<div class="hyperlink_this_thumb"-->
<!--                                                             onclick="window.location = 'single-project.html';"-->
<!--                                                             style="position: relative; width: 30px; height: 30px; top: 20px; float: left; margin-left: 50px; color: black; background: white;">-->
<!--                                                            <img-->
<!--                                                                src="http://designarethemes.com/themes/freshlookwp/wp-content/themes/freshlook/img/link_16x16.png"-->
<!--                                                                style="margin-top: 7px; margin-left: 7px; opacity: .8 !important;"-->
<!--                                                                alt=""/>-->
<!--                                                        </div>-->
<!--													</span>-->
<!--            </div>-->
<!--        </a>-->
<!--        <a class="pp-link" style="display:none;"-->
<!--           href="http://designarethemes.com/themes/freshlookwp/wp-content/uploads/2012/11/thumb_2.jpg">prettyphoto</a>-->
<!--    </li>-->
    <!-- END OF 2ND ELEMENT -->

    <!-- 3RD ELEMENT -->
<!--    <li data-id="id-3" class="branding illustration  slides_item post-thumb view four columns ">-->
<!--        <a href="javascript:;">-->
<!--            <img src="http://designarethemes.com/themes/freshlookwp/wp-content/uploads/2012/11/thumb_555.png"-->
<!--                 class="nc4" alt="Tap Wall &#8211; Boxed" title="Tap Wall &#8211; Boxed">-->
<!---->
<!--            <div>-->
<!--                <span class="overlay_title">Tap Wall &#8211; Boxed</span>-->
<!--													<span class="overlay_categories">-->
<!--														<span>Branding</span>-->
<!--														<span>Illustration</span>-->
<!--													</span>-->
<!--													<span class="icons_container"-->
<!--                                                          style="position:relative; width: 100%; float: left;">-->
<!--														<div class="magnify_this_thumb"-->
<!--                                                             style="position: relative; width: 30px; height: 30px; float:left; top: 20px; left: 45px; color: black; background: white;">-->
<!--                                                            <img-->
<!--                                                                src="http://designarethemes.com/themes/freshlookwp/wp-content/themes/freshlook/img/magnifying_glass_16x16.png"-->
<!--                                                                style="margin-top: 7px; margin-left: 7px; opacity: .8 !important;"-->
<!--                                                                alt=""/>-->
<!--                                                        </div>-->
<!--														<div class="hyperlink_this_thumb"-->
<!--                                                             onclick="window.location = 'single-project.html';"-->
<!--                                                             style="position: relative; width: 30px; height: 30px; top: 20px; float: left; margin-left: 50px; color: black; background: white;">-->
<!--                                                            <img-->
<!--                                                                src="http://designarethemes.com/themes/freshlookwp/wp-content/themes/freshlook/img/link_16x16.png"-->
<!--                                                                style="margin-top: 7px; margin-left: 7px; opacity: .8 !important;"-->
<!--                                                                alt=""/>-->
<!--                                                        </div>-->
<!--													</span>-->
<!--            </div>-->
<!--        </a>-->
<!--        <a class="pp-link" style="display:none;"-->
<!--           href="http://designarethemes.com/themes/freshlookwp/wp-content/uploads/2012/11/thumb_555.png">prettyphoto</a>-->
<!--    </li>-->
    <!-- END OF 3RD ELEMENT -->

    <!-- 4TH ELEMENT -->
<!--    <li data-id="id-4" class="photography  slides_item post-thumb view four columns ">-->
<!--        <a href="javascript:;">-->
<!--            <img src="http://designarethemes.com/themes/freshlookwp/wp-content/uploads/2012/11/thumb_33.png" class="nc4"-->
<!--                 alt="Refined Boxed" title="Refined Boxed">-->
<!---->
<!--            <div>-->
<!--                <span class="overlay_title">Refined Boxed</span>-->
<!--													<span class="overlay_categories">-->
<!--														<span>Photography</span>-->
<!--													</span>-->
<!--													<span class="icons_container"-->
<!--                                                          style="position:relative; width: 100%; float: left;">-->
<!--														<div class="magnify_this_thumb"-->
<!--                                                             style="position: relative; width: 30px; height: 30px; float:left; top: 20px; left: 45px; color: black; background: white;">-->
<!--                                                            <img-->
<!--                                                                src="http://designarethemes.com/themes/freshlookwp/wp-content/themes/freshlook/img/magnifying_glass_16x16.png"-->
<!--                                                                style="margin-top: 7px; margin-left: 7px; opacity: .8 !important;"-->
<!--                                                                alt=""/>-->
<!--                                                        </div>-->
<!--														<div class="hyperlink_this_thumb"-->
<!--                                                             onclick="window.location = 'single-project.html';"-->
<!--                                                             style="position: relative; width: 30px; height: 30px; top: 20px; float: left; margin-left: 50px; color: black; background: white;">-->
<!--                                                            <img-->
<!--                                                                src="http://designarethemes.com/themes/freshlookwp/wp-content/themes/freshlook/img/link_16x16.png"-->
<!--                                                                style="margin-top: 7px; margin-left: 7px; opacity: .8 !important;"-->
<!--                                                                alt=""/>-->
<!--                                                        </div>-->
<!--													</span>-->
<!--            </div>-->
<!--        </a>-->
<!--        <a class="pp-link" style="display:none;"-->
<!--           href="http://designarethemes.com/themes/freshlookwp/wp-content/uploads/2012/11/thumb_33.png">prettyphoto</a>-->
<!--    </li>-->
    <!-- END OF 4TH ELEMENT -->

    <!-- 5TH ELEMENT -->
<!--    <li data-id="id-5" class="branding illustration  slides_item post-thumb view four columns ">-->
<!--        <a href="javascript:;">-->
<!--            <img src="http://designarethemes.com/themes/freshlookwp/wp-content/uploads/2012/11/thumb_3.jpg" class="nc4"-->
<!--                 alt="TapWall" title="TapWall">-->
<!---->
<!--            <div>-->
<!--                <span class="overlay_title">TapWall</span>-->
<!--													<span class="overlay_categories">-->
<!--														<span>Branding</span>-->
<!--														<span>Illustration</span>-->
<!--													</span>-->
<!--													<span class="icons_container"-->
<!--                                                          style="position:relative; width: 100%; float: left;">-->
<!--														<div class="magnify_this_thumb"-->
<!--                                                             style="position: relative; width: 30px; height: 30px; float:left; top: 20px; left: 45px; color: black; background: white;">-->
<!--                                                            <img-->
<!--                                                                src="http://designarethemes.com/themes/freshlookwp/wp-content/themes/freshlook/img/magnifying_glass_16x16.png"-->
<!--                                                                style="margin-top: 7px; margin-left: 7px; opacity: .8 !important;"-->
<!--                                                                alt=""/>-->
<!--                                                        </div>-->
<!--														<div class="hyperlink_this_thumb"-->
<!--                                                             onclick="window.location = 'single-project.html';"-->
<!--                                                             style="position: relative; width: 30px; height: 30px; top: 20px; float: left; margin-left: 50px; color: black; background: white;">-->
<!--                                                            <img-->
<!--                                                                src="http://designarethemes.com/themes/freshlookwp/wp-content/themes/freshlook/img/link_16x16.png"-->
<!--                                                                style="margin-top: 7px; margin-left: 7px; opacity: .8 !important;"-->
<!--                                                                alt=""/>-->
<!--                                                        </div>-->
<!--													</span>-->
<!--            </div>-->
<!--        </a>-->
<!--        <a class="pp-link" style="display:none;"-->
<!--           href="http://designarethemes.com/themes/freshlookwp/wp-content/uploads/2012/11/thumb_3.jpg">prettyphoto</a>-->
<!--    </li>-->
    <!-- END OF 5TH ELEMENT -->

    <!-- 6TH ELEMENT -->
<!--    <li data-id="id-6" class="photography web-design  slides_item post-thumb view four columns ">-->
<!--        <a href="javascript:;">-->
<!--            <img src="http://designarethemes.com/themes/freshlookwp/wp-content/uploads/2012/11/thumb_4.jpg" class="nc4"-->
<!--                 alt="Refined" title="Refined">-->
<!---->
<!--            <div>-->
<!--                <span class="overlay_title">Refined</span>-->
<!--													<span class="overlay_categories">-->
<!--														<span>Photography</span>-->
<!--														<span>Web Design</span>-->
<!--													</span>-->
<!--													<span class="icons_container"-->
<!--                                                          style="position:relative; width: 100%; float: left;">-->
<!--														<div class="magnify_this_thumb"-->
<!--                                                             style="position: relative; width: 30px; height: 30px; float:left; top: 20px; left: 45px; color: black; background: white;">-->
<!--                                                            <img-->
<!--                                                                src="http://designarethemes.com/themes/freshlookwp/wp-content/themes/freshlook/img/magnifying_glass_16x16.png"-->
<!--                                                                style="margin-top: 7px; margin-left: 7px; opacity: .8 !important;"-->
<!--                                                                alt=""/>-->
<!--                                                        </div>-->
<!--														<div class="hyperlink_this_thumb"-->
<!--                                                             onclick="window.location = 'single-project.html';"-->
<!--                                                             style="position: relative; width: 30px; height: 30px; top: 20px; float: left; margin-left: 50px; color: black; background: white;">-->
<!--                                                            <img-->
<!--                                                                src="http://designarethemes.com/themes/freshlookwp/wp-content/themes/freshlook/img/link_16x16.png"-->
<!--                                                                style="margin-top: 7px; margin-left: 7px; opacity: .8 !important;"-->
<!--                                                                alt=""/>-->
<!--                                                        </div>-->
<!--													</span>-->
<!--            </div>-->
<!--        </a>-->
<!--        <a class="pp-link" style="display:none;"-->
<!--           href="http://designarethemes.com/themes/freshlookwp/wp-content/uploads/2012/11/thumb_4.jpg">prettyphoto</a>-->
<!--    </li>-->
    <!-- END OF 6TH ELEMENT -->

    <!-- 7TH ELEMENT -->
<!--    <li data-id="id-7" class="illustration photography  slides_item post-thumb view four columns ">-->
<!--        <a href="javascript:;">-->
<!--            <img src="http://designarethemes.com/themes/freshlookwp/wp-content/uploads/2012/11/thumb_5.jpg" class="nc4"-->
<!--                 alt="AlteredPart02" title="AlteredPart02">-->
<!---->
<!--            <div>-->
<!--                <span class="overlay_title">AlteredPart02</span>-->
<!--													<span class="overlay_categories">-->
<!--														<span>Illustration</span>-->
<!--														<span>Photography</span>-->
<!--													</span>-->
<!--													<span class="icons_container"-->
<!--                                                          style="position:relative; width: 100%; float: left;">-->
<!--														<div class="magnify_this_thumb"-->
<!--                                                             style="position: relative; width: 30px; height: 30px; float:left; top: 20px; left: 45px; color: black; background: white;">-->
<!--                                                            <img-->
<!--                                                                src="http://designarethemes.com/themes/freshlookwp/wp-content/themes/freshlook/img/magnifying_glass_16x16.png"-->
<!--                                                                style="margin-top: 7px; margin-left: 7px; opacity: .8 !important;"-->
<!--                                                                alt=""/>-->
<!--                                                        </div>-->
<!--														<div class="hyperlink_this_thumb"-->
<!--                                                             onclick="window.location = 'single-project.html';"-->
<!--                                                             style="position: relative; width: 30px; height: 30px; top: 20px; float: left; margin-left: 50px; color: black; background: white;">-->
<!--                                                            <img-->
<!--                                                                src="http://designarethemes.com/themes/freshlookwp/wp-content/themes/freshlook/img/link_16x16.png"-->
<!--                                                                style="margin-top: 7px; margin-left: 7px; opacity: .8 !important;"-->
<!--                                                                alt=""/>-->
<!--                                                        </div>-->
<!--													</span>-->
<!--            </div>-->
<!--        </a>-->
<!--        <a class="pp-link" style="display:none;"-->
<!--           href="http://designarethemes.com/themes/freshlookwp/wp-content/uploads/2012/11/thumb_5.jpg">prettyphoto</a>-->
<!--    </li>-->
    <!-- END OF 7TH ELEMENT -->

    </ul>
    </div>
    <!-- #END thumbnails_list -->

    </div>
    <!-- .entry-content -->

    </article>
    <!-- #END project-1 -->

    </div>
    <!-- #END reset -->
    </div>
    <!-- #END container -->
    </div>
    <!-- #END wrapper -->
    </div><!-- #END white_content -->

    <script type="text/javascript">
        $(function () {

            $('.projectCategories .splitter li').each(function () {
                $(this).click(function () {
                    $(this).addClass('active').siblings().removeClass('active');
                    $(this).siblings().not('active').slideHorzHide();
                    $(this).parents(".filterby").children(".filterby_btn").removeClass("open").addClass("closed");
                });
            });

            thumbnailsBehavior();

            if ($('#type_of_sorting').html() == 'opacity') {
                $('.thumbnails_list > ul').removeClass('proj_list').addClass('proj_list_overlay');
                $('#projects-1 .da-thumbs > li').hoverdir();
                clickThumbsOverlay("projects-1");
            }
            else {
                $('#projects-1 .da-thumbs > li').hoverdir();
                quicksandstart("projects-1");
            }
        });

        $(document).ready(function () {
            $('.projectCategories .splitter').children('li').not('.active').slideHorzHide();
        });

        function toggleFilter($el) {
            if ($el.hasClass('closed')) {
                /* OPEN */
                $el.siblings('.projectCategories').children('.splitter').children('li').slideHorzShow();
                $el.removeClass('closed').addClass('open');
            } else {
                /* CLOSE */
                $el.siblings('.projectCategories').children('.splitter').children('li').not('.active').slideHorzHide();
                $el.removeClass('open').addClass('closed');
            }
        }

        function thumbnailsBehavior() {

            $('.thumbnails_list > ul > li').each(function () {

                $(this).find('.magnify_this_thumb')
                    .click(function () {
                        $(this).parents('li').find('.pp-link').prettyPhoto();
                        $(this).parents('li').find('.pp-link').click();
                    })
                    .hover(function () {
                        $(this).css('background', '#7AB317');
                    }, function () {
                        $(this).css('background', 'white');
                    });

                $(this).find('.hyperlink_this_thumb')
                    .hover(function () {
                        $(this).css('background', '#7AB317');
                    }, function () {
                        $(this).css('background', 'white');
                    });
            });
        }

        $.fn.slideHorzShow = function (speed, easing, callback) {
            this.animate({ marginLeft: 'show', marginRight: 'show', paddingLeft: 'show', paddingRight: 'show', width: 'show' }, speed, easing, callback);
        };
        $.fn.slideHorzHide = function (speed, easing, callback) {
            this.animate({ marginLeft: 'hide', marginRight: 'hide', paddingLeft: 'hide', paddingRight: 'hide', width: 'hide' }, speed, easing, callback);
        };
    </script>

<?php
$this->load->view("website/footer.php");
