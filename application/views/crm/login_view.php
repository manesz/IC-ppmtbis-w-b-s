<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 19/5/2556
 * Time: 9:43 น.
 * To change this template use File | Settings | File Templates.
 */
$baseUrl = base_url();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <!-- Bootstrap -->
    <link href="<?php echo $baseUrl; ?>assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="<?php echo $baseUrl; ?>assets/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="<?php echo $baseUrl; ?>assets/css/styles-login.css" rel="stylesheet" media="screen">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="<?php echo $baseUrl; ?>assets/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>
<body id="login">
<div class="container">

    <form class="form-signin" method="post">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="text" name="username" class="input-block-level" placeholder="Username">
        <input type="password" name="password" class="input-block-level" placeholder="Password">
        <label class="checkbox">
            <input type="checkbox" value="remember-me"> Remember me
        </label>
        <button class="btn btn-large btn-primary" type="submit">Sign in</button>
    </form>

</div> <!-- /container -->
<script src="<?php echo $baseUrl; ?>assets/js/jquery-1.9.1.min.js"></script>
<script src="<?php echo $baseUrl; ?>assets/js/bootstrap.min.js"></script>
</body>
</html>
