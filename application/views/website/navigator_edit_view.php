<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 23/5/2556
 * Time: 16:05 น.
 * To change this template use File | Settings | File Templates.
 */

$baseUrl = base_url();
?>

<script>
    var url_edit_data = "<?php echo $webUrl; ?>website/navigatorEdit/<?php echo $arrData->id; ?>";
    $(document).ready(function () {
        $("#buttonSave").click(function () {
            if (validateFrom(document.getElementById('formPost'))) {
                $.post(url_edit_data, $("#formPost").serialize(),
                    function (result) {
                        if (result == "edit fail") {
                            alert('เกิดการผิดพลาด\n** กรุณาตรวจสอบ **');
                        } else {
                            alert(result)
                            window.location = "<?php echo $webUrl; ?>website/navigator";
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
                    <a href="<?php echo $webUrl; ?>website/navigator">Navigator</a> <span class="divider">/</span>
                </li>
                <li class="active">Edit</li>
            </ul>
        </div>
    </div>
</div>
<div class="row-fluid" id="contentInner">
    <!-- block -->
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">Navigator Edit</div>
            <!--            <div class="pull-right"><span class="badge badge-info">1,234</span></div>-->
        </div>
        <div class="block-content collapse in">
            <form id="formPost" name="formPost" method="post" action="">
                <label>Name
                    <input name="name" type="text" id="name" value="<?php echo $arrData->name; ?>"/>
                </label>

                <p>
                    <label>Description
                        <textarea name="description" id="description"><?php echo $arrData->description; ?></textarea>
                    </label>
                </p>

                <p>
                    <label>Layer
                        <input name="layer" type="text" id="layer" value="<?php echo $arrData->layer; ?>"/>
                    </label>
                </p>

                <p>
                    <label>Parent
                        <input name="parent" type="text" id="parent" value="<?php echo $arrData->parent; ?>"/>
                    </label>
                </p>

                <p>
                    <label>Order
                        <input name="order" type="text" id="order" value="<?php echo $arrData->order; ?>"/>
                    </label>
                </p>

                <div align="right">
                    <button class="btn btn-warning" id="buttonCancel">cancel</button>
                    <button class="btn btn-primary" id="buttonSave">save</button>
                </div>
            </form>
        </div>
    </div>
    <!-- /block -->
    <!--content inner-->
</div>