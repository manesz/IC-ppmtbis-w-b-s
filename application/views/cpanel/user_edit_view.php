<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 24/5/2556
 * Time: 16:09 น.
 * To change this template use File | Settings | File Templates.
 */

$baseUrl = base_url();
extract((array)$arrData);
?>

<script>
    var url_edit_data = "<?php echo $webUrl; ?>cpanel/userEdit/<?php echo $id; ?>";
    $(document).ready(function () {
        $("#buttonSave").click(function () {
            if (validateFrom(document.getElementById('formPost'))) {
                $.post(url_edit_data, $("#formPost").serialize(),
                    function (result) {
                        if (result == "edit fail") {
                            alert('เกิดการผิดพลาด\n** กรุณาตรวจสอบ **');
                        } else {
                            alert(result)
                            window.location = "<?php echo $webUrl; ?>cpanel/user";
                        }
                    }
                );
            }
            return false;
        });

        $("#buttonCancel").click(function () {
            window.location.reload();
            return false;
        });
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
                <li>
                    <a href="<?php echo $webUrl; ?>cpanel/user">User</a> <span class="divider">/</span>
                </li>
                <li class="active">Edit<span class="divider">/</span></li>
                <li class="active"><?php echo $id; ?></li>
            </ul>
        </div>
    </div>
</div>
<div class="row-fluid" id="contentInner">
    <!-- block -->
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">User Edit</div>
            <!--            <div class="pull-right"><span class="badge badge-info">1,234</span></div>-->
        </div>
        <div class="block-content collapse in">
            <form id="formPost" name="formPost" method="post" action="">
                <div class="row-fluid">
                    <div class="span4">Name</div>
                    <div class="span8"><input name="name" type="text" id="name" class="input-block-level" value="<?php echo $name; ?>"/></div>
                </div>
                <div class="row-fluid">
                    <div class="span4">Description</div>
                    <div class="span8"><textarea name="description" id="description" class="input-block-level" rows="10"><?php echo $description; ?></textarea></div>
                </div>
                <div class="row-fluid">
                    <div class="span4">Phone</div>
                    <div class="span8"><input name="phone" type="text" id="phone" class="input-block-level" value="<?php echo $phone; ?>"/></div>
                </div>
                <div class="row-fluid">
                    <div class="span4">email</div>
                    <div class="span8"><input name="email" type="text" id="email" class="input-block-level" value="<?php echo $email; ?>" /></div>
                </div>
                <div class="row-fluid">
                    <div class="span4">permission</div>
                    <div class="span8">
                        <input name="permission" type="text" id="permission" class="input-block-level" value="<?php echo $permission; ?>"/>
                        <span style="font-size: 10px; color: red">1=admin, 2=user(insert, update ::: job)(insert, update :: page)</span>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12" align="right">
                        <button class="btn btn-warning" id="buttonCancel">cancel</button>
                        <button class="btn btn-primary" id="buttonSave">save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /block -->
    <!--content inner-->
</div>