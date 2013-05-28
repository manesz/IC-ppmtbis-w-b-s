<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 24/5/2556
 * Time: 15:38 น.
 * To change this template use File | Settings | File Templates.
 */

$baseUrl = base_url();
extract((array)$arrData);
?>

<script>
    var url_edit_data = "<?php echo $webUrl; ?>cpanel/postEdit/<?php echo $id; ?>";
    $(document).ready(function () {
        $("#buttonSave").click(function () {
            if (validateFrom(document.getElementById('formPost'))) {
                $.post(url_edit_data, $("#formPost").serialize(),
                    function (result) {
                        if (result == "edit fail") {
                            alert('เกิดการผิดพลาด\n** กรุณาตรวจสอบ **');
                        } else {
                            alert(result)
                            window.location = "<?php echo $webUrl; ?>cpanel/post";
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
                    <a href="<?php echo $webUrl; ?>cpanel/post">Post</a> <span class="divider">/</span>
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
            <div class="muted pull-left">Post Edit</div>
            <!--            <div class="pull-right"><span class="badge badge-info">1,234</span></div>-->
        </div>
        <div class="block-content collapse in">
            <form id="formPost" name="formPost" method="post" action="">
                <label>Title
                    <input name="title" type="text" id="title" value="<?php echo $title; ?>"/>
                </label>

                <p>
                    <label>Description
                        <textarea name="description" id="description"><?php echo $description; ?></textarea>
                    </label>
                </p>

                <p>
                    <label>Type
                        <select name="type" id="type">
                            <?php foreach ($arrType as $key => $value) {
                                if ($type == $value->id) {
                                    echo "<option selected value='$value->id'>$value->name</option>";
                                } else {
                                    echo "<option value='$value->id'>$value->name</option>";
                                }
                            }
                            ?>
                        </select>
                    </label>
                </p>

                <p>
                    <label>Salary
                        <input name="salary" type="text" id="salary" value="<?php echo $salary; ?>"/>
                    </label>
                </p>

                <p>
                    <label>Workplace
                        <input name="workplace" type="text" id="workplace" value="<?php echo $workplace; ?>"/>
                    </label>
                </p>

                <p>
                    <label>Responsibilities
                        <textarea name="responsibilities"
                                  id="responsibilities"><?php echo $responsibilities; ?></textarea>
                    </label>
                </p>

                <p>
                    <label>Qualification
                        <textarea name="qualification" id="qualification"><?php echo $qualification; ?></textarea>
                    </label>
                </p>

                <p>
                    <label>Tags
                        <input name="tags" type="text" id="tags" value="<?php echo $tags; ?>"/>
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