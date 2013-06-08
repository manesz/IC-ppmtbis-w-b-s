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

<script src="<?php echo $baseUrl; ?>assets/plugin/ckeditor/ckeditor.js"></script>
<link rel="stylesheet" href="<?php echo $baseUrl; ?>assets/plugin/ckeditor/contents.css">
<script>
    function CKupdate() {
        for (instance in CKEDITOR.instances)
            CKEDITOR.instances[instance].updateElement();
    }

    var url_edit_data = "<?php echo $webUrl; ?>cpanel/postEdit/<?php echo $id; ?>";
    $(document).ready(function () {
        $("#buttonSave").click(function () {
            if (validateFrom(document.getElementById('formPost'))) {
                CKupdate();
                $.post(url_edit_data, $("#formPost").serialize(),
                    function (result) {
                        if (result == "edit fail") {
                            alert('เกิดการผิดพลาด\n** กรุณาตรวจสอบ **');
                        } else {
                            alert(result)
                            window.location = "<?php echo $webUrl; ?>cpanel/job";
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
//        createEditor();

        CKEDITOR.replace('responsibilities');
        CKEDITOR.replace('qualification');
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
                    <a href="<?php echo $webUrl; ?>cpanel/job">Job</a> <span class="divider">/</span>
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
            <div class="muted pull-left">Job Edit</div>
            <!--            <div class="pull-right"><span class="badge badge-info">1,234</span></div>-->
        </div>
        <div class="block-content collapse in">
            <form id="formPost" name="formPost" method="post" action="">
                <div class="row-fluid">
                    <div class="span4">Title</div>
                    <div class="span8"><input name="title" type="text" id="title" class="input-block-level"
                                              value="<?php echo $title; ?>"/></div>
                </div>
                <div class="row-fluid">
                    <div class="span4">Description</div>
                    <div class="span8"><textarea name="description" id="description" class="input-block-level"
                                                 rows="10"><?php echo $description; ?></textarea></div>
                </div>
                <div class="row-fluid">
                    <div class="span4">Type</div>
                    <div class="span8">
                        <select name="type" id="type" class="input-block-level">
                            <?php
                            foreach ($arrType as $key => $value) {
                                if ($type == $value->id) {
                                    echo "<option selected value='$value->id'>$value->name</option>";
                                } else {
                                    echo "<option value='$value->id'>$value->name</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span4">Salary</div>
                    <div class="span8"><input name="salary" type="text" id="salary" class="input-block-level"
                                              value="<?php echo $salary; ?>"/></div>
                </div>
                <div class="row-fluid">
                    <div class="span4">Workplace</div>
                    <div class="span8"><input name="workplace" type="text" id="workplace" class="input-block-level"
                                              value="<?php echo $workplace; ?>"/></div>
                </div>
                <div class="row-fluid">
                    <div class="span4">Responsibilities</div>
                    <div class="span8"><textarea name="responsibilities" id="responsibilities"
                                                 class="ckeditor input-block-level "
                                                 rows="10"><?php echo $responsibilities; ?></textarea></div>
                </div>
                <div class="row-fluid">
                    <div class="span4">Qualification</div>
                    <div class="span8"><textarea name="qualification" id="qualification"
                                                 class="ckeditor input-block-level"
                                                 rows="10"><?php echo $qualification; ?></textarea></div>
                </div>
                <div class="row-fluid">
                    <div class="span4">Tags</div>
                    <div class="span8"><input name="tags" type="text" id="tags" class="input-block-level"
                                              value="<?php echo $tags; ?>"/></div>
                </div>
                <div class="row-fluid">
                    <div class="span4">Hot Job</div>
                    <div class="span8"><input name="hotjob" type="checkbox" id="hotjob"
                                              class="input-block-level" <?php echo $hotjob == 0 ? '' : 'checked'; ?>/>
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