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
                <div class="row-fluid">
                    <div class="span4">Site Title</div>
                    <div class="span8"><input name="site_title" type="text" id="site_title" class="input-block-level" value="<?php echo $site_title; ?>"/></div>
                </div>
                <div class="row-fluid">
                    <div class="span4">Site Description</div>
                    <div class="span8"><textarea name="site_description" id="site_description" class="input-block-level" rows="10"><?php echo $site_description; ?></textarea></div>
                </div>
                <div class="row-fluid">
                    <div class="span4">Site Keyword</div>
                    <div class="span8"><textarea name="site_keyword" id="site_keyword" class="input-block-level" rows="10"><?php echo $site_keyword?></textarea></div>
                </div>
                <div class="row-fluid">
                    <div class="span4">facebook Account</div>
                    <div class="span8"><textarea name="facebook_account" id="facebook_account" class="input-block-level" rows="10"><?php echo $facebook_account;?></textarea></div>
                </div>
                <div class="row-fluid">
                    <div class="span4">twitter Account</div>
                    <div class="span8"><textarea name="twitter_account" id="twitter_account" class="input-block-level" rows="10"><?php echo $twitter_account; ?></textarea></div>
                </div>
                <div class="row-fluid">
                    <div class="span4">Front Content</div>
                    <div class="span8"><textarea name="front_content" id="front_content" class="input-block-level" rows="10"><?php echo $front_content; ?></textarea></div>
                </div>
                <div class="row-fluid">
                    <div class="span4">Contact Longtitude/Lagitude</div>
                    <div class="span8"><input name="contact_lat_long" type="text" id="contact_lat_long" class="input-block-level" value="<?php echo $contact_lat_long;?>" /><span style="font-size: 10px; color: red;">google map point EX:: 13.00|100.00</span></div>
                </div>
                <div class="row-fluid">
                    <div class="span4">Contact Content</div>
                    <div class="span8"><textarea name="contact_content" id="contact_content" class="input-block-level" rows="10"><?php echo $contact_content; ?></textarea></div>
                </div>
                <div class="row-fluid">
                    <div class="span4">Contact Phone</div>
                    <div class="span8"><input name="contact_phone" type="text" id="contact_phone" class="input-block-level" value="<?php echo $contact_phone;?>" /></div>
                </div>
                <div class="row-fluid">
                    <div class="span4">Contact fax</div>
                    <div class="span8"><input name="contact_fax" type="text" id="contact_fax" class="input-block-level" value="<?php echo $contact_fax; ?>"/></div>
                </div>
                <div class="row-fluid">
                    <div class="span4">Contact email</div>
                    <div class="span8"><input name="contact_email" type="text" id="contact_email" class="input-block-level" value="<?php echo $contact_email ?>"/></div>
                </div>
                <div class="row-fluid">
                    <div class="span12" align="right">
                        <!--                    <button class="btn btn-warning" id="buttonCancel">cancel</button>-->
                        <button class="btn btn-primary" id="buttonSave">save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /block -->
    <!--content inner-->
</div>