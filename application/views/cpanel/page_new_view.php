<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 24/5/2556
 * Time: 14:57 น.
 * To change this template use File | Settings | File Templates.
 */

$baseUrl = base_url();
?>
<script>
    var url_new_data = "<?php echo $webUrl; ?>cpanel/pageNew";
    $(document).ready(function () {
        $("#buttonSave").click(function () {
            if (validateFrom(document.getElementById('formPost'))) {
                $.post(url_new_data, $("#formPost").serialize(),
                    function (result) {
                        if (result == "add fail") {
                            alert('เกิดการผิดพลาด\n** กรุณาตรวจสอบ **');
                        } else {
                            window.location.reload();
                        }
                    }
                );
            }
            return false;
        });

        $("#buttonCancel").click(function () {
            window.location = "<?php echo $webUrl; ?>cpanel/page";
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
                    <a href="<?php echo $webUrl; ?>cpanel/page">Page</a> <span class="divider">/</span>
                </li>
                <li class="active">New</li>
            </ul>
        </div>
    </div>
</div>
<div class="row-fluid" id="contentInner">
    <!-- block -->
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">Page New</div>
            <!--            <div class="pull-right"><span class="badge badge-info">1,234</span></div>-->
        </div>
        <div class="block-content collapse in">
            <form id="formPost" name="formPost" method="post" action="">
                <div class="row-fluid">
                    <div class="span4">Title</div>
                    <div class="span8"><input name="title" type="text" id="title" class="input-block-level"/></div>
                </div>
                <div class="row-fluid">
                    <div class="span4">Description</div>
                    <div class="span8"><textarea name="description" id="description" class="input-block-level" cols="10"></textarea></div>
                </div>
                <div class="row-fluid">
                    <div class="span4">Type</div>
                    <div class="span8">
                        <select name="type" id="type" class="input-block-level">
                            <?php
                                foreach ($arrType as $key => $value) {
                                    echo "<option value='$value->id'>$value->name</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span4">Order</div>
                    <div class="span8"><input name="order" type="text" id="order" class="input-block-level"/></div>
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