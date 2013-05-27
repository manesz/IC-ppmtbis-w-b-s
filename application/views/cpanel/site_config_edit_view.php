<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 24/5/2556
 * Time: 16:28 น.
 * To change this template use File | Settings | File Templates.
 */

$baseUrl = base_url();
extract((array)$arrData);
?>

<script>
    var url_edit_data = "<?php echo $webUrl; ?>cpanel/site_configEdit/<?php echo $id; ?>";
    $(document).ready(function () {
        $("#buttonSave").click(function () {
            if (validateFrom(document.getElementById('formPost'))) {
                $.post(url_edit_data, $("#formPost").serialize(),
                    function (result) {
                        if (result == "edit fail") {
                            alert('เกิดการผิดพลาด\n** กรุณาตรวจสอบ **');
                        } else {
                            alert(result)
                            window.location = "<?php echo $webUrl; ?>cpanel/site_config";
                        }
                    }
                );
            }
            return false;
        });

//        $("#buttonCancel").click(function () {
//            window.location.reload();
//            return false;
//        });
    });
</script>
<div class="row-fluid">
    <!--                <div class="alert alert-success">-->
    <!--                    <button type="button" class="close" data-dismiss="alert">&times;</button>-->
    <!--                    <h4>Success</h4>-->
    <!--                    The operation completed successfully-->
    <!--                </div>-->
    <div class="navbar">
        <div class="navbar-inner">
            <ul class="breadcrumb">
                <i class="icon-chevron-left hide-sidebar"><a href='#' title="Hide Sidebar"
                                                             rel='tooltip'>&nbsp;</a></i>
                <i class="icon-chevron-right show-sidebar" style="display:none;">
                    <a href='#' title="Show Sidebar" rel='tooltip'>&nbsp;</a></i>
                <li class="active">Site Config</li>
            </ul>
        </div>
    </div>
</div>
<div class="row-fluid" id="contentInner">
    <!-- block -->
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">Site Config Edit</div>
            <!--            <div class="pull-right"><span class="badge badge-info">1,234</span></div>-->
        </div>
        <div class="block-content collapse in">
            <form id="formPost" name="formPost" method="post" action="">
                <label>Site Title
                    <input name="site_title" type="text" id="site_title" value="<?php echo $site_title; ?>"/>
                </label>
                <p>
                    <label>Site Description
                        <textarea name="site_description"
                                  id="site_description"><?php echo $site_description; ?></textarea>
                    </label>
                </p>
                <p>
                    <label>Site Keyword
                        <textarea name="site_keyword" id="site_keyword"><?php echo $site_keyword?></textarea>
                    </label>
                </p>
                <p>
                    <label>facebook Account
                        <textarea name="facebook_account"
                                  id="facebook_account"><?php echo $facebook_account;?></textarea>
                    </label>
                </p>
                <p>
                    <label>twitter Account
                        <textarea name="twitter_account" id="twitter_account"><?php echo $twitter_account; ?></textarea>
                    </label>
                </p>
                <p>
                    <label>Front Content
                        <textarea name="front_content" id="front_content"><?php echo $front_content; ?></textarea>
                    </label>
                </p>
                <p>
                    <label>Contact longtitude lagitude
                        <input name="contact_lat_long" type="text" id="contact_lat_long"
                               value="<?php echo $contact_lat_long;?>" />
                    </label>google map point EX:: 13.00|100.00
                </p>
                <p>
                    <label>Contact Content
                        <textarea name="contact_content" id="contact_content"><?php echo $contact_content; ?></textarea>
                    </label>
                </p>
                <p>
                    <label>Contact Phone
                        <input name="contact_phone" type="text" id="contact_phone"
                               value="<?php echo $contact_phone;?>" />
                    </label>
                </p>
                <p>
                    <label>Contact fax
                        <input name="contact_fax" type="text" id="contact_fax" value="<?php echo $contact_fax; ?>"/>
                    </label>
                </p>
                <p>
                    <label>Contact email
                        <input name="contact_email" type="text" id="contact_email"
                               value="<?php echo $contact_email ?>"/>
                    </label>
                </p>

                <div align="right">
<!--                    <button class="btn btn-warning" id="buttonCancel">cancel</button>-->
                    <button class="btn btn-primary" id="buttonSave">save</button>
                </div>
            </form>
        </div>
    </div>
    <!-- /block -->
    <!--content inner-->
</div>