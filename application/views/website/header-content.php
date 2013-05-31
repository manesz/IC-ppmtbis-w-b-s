<?php
$baseUrl = base_url("assets/website/");
?>
<!-- START: HEADER -->
<div class="header_container">
    <header id="header" class="container">

        <div class="logo_and_menu">

            <!-- START: LOGO & SLOGAN -->
            <div class="logo five columns">
                <a href="<?php echo $webUrl; ?>" tabindex="-1" style="text-indent: 0px; float: left;">
                    <h1 class="logo" style="top: 24px; left: 0px; background: none; font-size: 12px;"><img src="<?php echo $baseUrl; ?>images/logo2.gif" style="width: 150px;"/></span></h1>
                </a>

                <div class="slogan" style="background: none; font-family: 'Georgia'; font-style: italic; font-size: 12px; color: #cccccc;">the best your partner.</div>
            </div>

<?php //require_once("nav.php");?>
            <?php $this->load->view("website/nav");?>

        </div>
    </header>
    <!-- HEADER SHADOW -->
    <div class="header-shadow"></div>
</div>
<!-- END: HEADER -->