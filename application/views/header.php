<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Chukkapun
 * Date: 23/4/2556
 * Time: 23:25 น.
 * To change this template use File | Settings | File Templates.
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
</head>

<body>
<?php
if($this->session->userdata('id')) :
    echo $this->session->userdata('name');
    ?>
    : <a href="<?php echo base_url(). 'index.php/auth/signOut';?>">Logout</a>
    <br>
    <br>
    <a href="<?php echo base_url() . 'index.php/member/newEmployee';?>">add-employee</a>&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="<?php echo base_url(). 'index.php/client/clientList';?>">client-list</a>&nbsp;&nbsp;&nbsp;&nbsp;
<!--    <a href="--><?php //echo base_url(). 'index.php/client/clientNew';?><!--">client-new</a>&nbsp;&nbsp;&nbsp;&nbsp;-->
<!--    <a href="--><?php //echo base_url(). 'index.php/client/clientEdit';?><!--">client-edit</a>&nbsp;&nbsp;&nbsp;&nbsp;-->
<?php
else:
    redirect(base_url().'index.php/auth/signIn');
endif;
?>

