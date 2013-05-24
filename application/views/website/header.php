<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 19/5/2556
 * Time: 10:08 น.
 * To change this template use File | Settings | File Templates.
 */

//check session login
if (!$this->session->userdata('id')) {
    redirect($webUrl . 'crm/login');
}
$baseUrl = base_url();
$selectBar = empty($selectBar) ? "" : $selectBar;
?>
<!DOCTYPE html>
<html class="no-js">

<head>
    <title>Admin Home Page</title>
    <!-- Bootstrap -->
    <link href="<?php echo $baseUrl; ?>assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="<?php echo $baseUrl; ?>assets/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="<?php echo $baseUrl; ?>assets/css/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
    <link href="<?php echo $baseUrl; ?>assets/css/styles-backend.css" rel="stylesheet" media="screen">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="<?php echo $baseUrl; ?>assets/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <script src="<?php echo $baseUrl; ?>assets/js/jquery-1.9.1.js"></script>
    <script>
        var strWait = "<div align='center'><img width='50' height='50' "
            + "src='<?php echo $baseUrl; ?>assets/img/loading.gif'/></div>"
        function innerHtml(id, href) {
            $(id).empty();
            $(id).html(strWait);
            $(id).load(href);
        }
    </script>
</head>

<body>
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="#">Admin Panel</a>

            <div class="nav-collapse collapse">
                <ul class="nav pull-right">
                    <li class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-user"></i> <?php echo $this->session->userdata('name'); ?>
                            <i class="caret"></i>

                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a tabindex="-1" href="#">Profile</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a tabindex="-1" href="<?php echo($webUrl . 'crm/logout'); ?>">Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav">
                    <li <?php echo $selectBar == "dashboard" ? 'class="active"' : "" ?> >
                        <a href="<?php echo $webUrl; ?>website/dashboard">Dashboard</a>
                    </li>
                    <li <?php echo $selectBar == "navigator" ? 'class="active"' : "" ?> >
                        <a href="<?php echo $webUrl; ?>website/navigator">Navigator</a>
                    </li>
                    <li <?php echo $selectBar == "slide" ? 'class="active"' : "" ?> >
                        <a href="<?php echo $webUrl; ?>website/slide">Slide</a>
                    </li>
                    <li <?php echo $selectBar == "page" ? 'class="active"' : "" ?> >
                        <a href="<?php echo $webUrl; ?>website/page">Page</a>
                    </li>
                    <li <?php echo $selectBar == "post" ? 'class="active"' : "" ?> >
                        <a href="<?php echo $webUrl; ?>website/post">Post</a>
                    </li>
                    <li <?php echo $selectBar == "user" ? 'class="active"' : "" ?> >
                        <a href="<?php echo $webUrl; ?>website/user">User</a>
                    </li>
                    <li <?php echo $selectBar == "site_config" ? 'class="active"' : "" ?> >
                        <a href="<?php echo $webUrl; ?>website/site_config">Site Config</a>
                    </li>
                    <!--                    <li class="dropdown">-->
                    <!--                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">Settings <b class="caret"></b>-->
                    <!---->
                    <!--                        </a>-->
                    <!--                        <ul class="dropdown-menu" id="menu1">-->
                    <!--                            <li>-->
                    <!--                                <a href="#">Tools <i class="icon-arrow-right"></i>-->
                    <!---->
                    <!--                                </a>-->
                    <!--                                <ul class="dropdown-menu sub-menu">-->
                    <!--                                    <li>-->
                    <!--                                        <a href="#">Reports</a>-->
                    <!--                                    </li>-->
                    <!--                                    <li>-->
                    <!--                                        <a href="#">Logs</a>-->
                    <!--                                    </li>-->
                    <!--                                    <li>-->
                    <!--                                        <a href="#">Errors</a>-->
                    <!--                                    </li>-->
                    <!--                                </ul>-->
                    <!--                            </li>-->
                    <!--                            <li>-->
                    <!--                                <a href="#">SEO Settings</a>-->
                    <!--                            </li>-->
                    <!--                            <li>-->
                    <!--                                <a href="#">Other Link</a>-->
                    <!--                            </li>-->
                    <!--                            <li class="divider"></li>-->
                    <!--                            <li>-->
                    <!--                                <a href="#">Other Link</a>-->
                    <!--                            </li>-->
                    <!--                            <li>-->
                    <!--                                <a href="#">Other Link</a>-->
                    <!--                            </li>-->
                    <!--                        </ul>-->
                    <!--                    </li>-->
                    <!--                    <li class="dropdown">-->
                    <!--                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Content <i-->
                    <!--                                class="caret"></i>-->
                    <!---->
                    <!--                        </a>-->
                    <!--                        <ul class="dropdown-menu">-->
                    <!--                            <li>-->
                    <!--                                <a tabindex="-1" href="#">Blog</a>-->
                    <!--                            </li>-->
                    <!--                            <li>-->
                    <!--                                <a tabindex="-1" href="#">News</a>-->
                    <!--                            </li>-->
                    <!--                            <li>-->
                    <!--                                <a tabindex="-1" href="#">Custom Pages</a>-->
                    <!--                            </li>-->
                    <!--                            <li>-->
                    <!--                                <a tabindex="-1" href="#">Calendar</a>-->
                    <!--                            </li>-->
                    <!--                            <li class="divider"></li>-->
                    <!--                            <li>-->
                    <!--                                <a tabindex="-1" href="#">FAQ</a>-->
                    <!--                            </li>-->
                    <!--                        </ul>-->
                    <!--                    </li>-->
                    <!--                    <li class="dropdown">-->
                    <!--                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Users <i-->
                    <!--                                class="caret"></i>-->
                    <!---->
                    <!--                        </a>-->
                    <!--                        <ul class="dropdown-menu">-->
                    <!--                            <li>-->
                    <!--                                <a tabindex="-1" href="#">User List</a>-->
                    <!--                            </li>-->
                    <!--                            <li>-->
                    <!--                                <a tabindex="-1" href="#">Search</a>-->
                    <!--                            </li>-->
                    <!--                            <li>-->
                    <!--                                <a tabindex="-1" href="#">Permissions</a>-->
                    <!--                            </li>-->
                    <!--                        </ul>-->
                    <!--                    </li>-->
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>
<div class="container-fluid">