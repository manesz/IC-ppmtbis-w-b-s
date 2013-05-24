<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 22/5/2556
 * Time: 21:01 น.
 * To change this template use File | Settings | File Templates.
 */

$baseUrl = base_url();
?>

<link rel="stylesheet" type="text/css"
      href="<?php echo $baseUrl . "assets/plugin/uploadify/uploadify.css"; ?>">
<!--    <script src="--><?php //echo $baseUrl . 'web/js/uploadify/jquery.uploadify-3.1.js'; ?><!--"></script>-->
<script type="text/javascript"
        src="<?php echo $baseUrl; ?>assets/plugin/uploadify/jquery.uploadify-3.2.min.js"></script>
<script>
    var swfPath = "<?php echo $baseUrl;?>assets/plugin/uploadify/uploadify.swf";
    var pathUploadify = "<?php echo $webUrl; ?>upload/do_upload";
    var pathImageUpload = "upload/images/slide/";
    var folderID = 0;

    $(function () {
        genUploadImage("#image_select", "#image_show", "#image");
    });
    function genUploadImage(btnUpload, idReload, idSave) {
        $(btnUpload).uploadify({
            'multi'    : false,
            'auto': false,
            'formData'      : {
                'folder_id' : "noSet",
                'file_type' : "2",//image
                'path_upload': pathImageUpload
            },
            'onUploadStart' : function(file)
            {
                $(btnUpload).uploadify('settings', 'formData',{
                    'folder_id' : folderID,
                    'file_type' : "2",
                    'path_upload' : pathImageUpload
                });
            },
            'swf': swfPath,
            'uploader': pathUploadify,
            'fileSizeLimit': '500KB',
            'fileTypeExts': '*.gif; *.jpg; *.png',
            'enctype': "multipart/form-data",
            'fileObjName': 'userfile',
            'onFallback': function () {
                alert('Flash was not detected.');// detect flash compatible
            }, 'onUploadSuccess': function (file, data, response) {
                $.post(url_update_slide, {
                        "id":folderID,
                        "path":data
                    },
                    function (result) {
                        if (result == "update fail") {
                            alert('เกิดการผิดพลาด\n** กรุณาตรวจสอบ **');
                        } else {
                            //alert(result);
                            window.location.reload();
                        }
                    }
                );

            },
            'queueSizeLimit': 1
        });
    }

    var url_new_data = "<?php echo $webUrl; ?>website/slideNew";
    var url_update_slide = "<?php echo $webUrl; ?>website/slideUpdateImageName";
    $(document).ready(function () {
        $("#buttonSave").click(function () {
            if (validateFrom(document.getElementById('formPost'))) {
                $.post(url_new_data, $("#formPost").serialize(),
                    function (result) {
                        if (result == "add fail") {
                            alert('เกิดการผิดพลาด\n** กรุณาตรวจสอบ **');
                        } else {
                            //alert(result)
                            folderID = result;
                            $('#image_select').uploadify('upload', '*');
                            //window.location.reload();
                        }
                    }
                );
            }
            return false;
        });

        $("#buttonCancel").click(function () {
            window.location = "<?php echo $webUrl; ?>website/slide";
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
                    <a href="<?php echo $webUrl; ?>website/slide">Slide</a> <span class="divider">/</span>
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
            <div class="muted pull-left">Slide New</div>
            <!--            <div class="pull-right"><span class="badge badge-info">1,234</span></div>-->
        </div>
        <div class="block-content collapse in">
            <form id="formPost" name="formPost" method="post" action="">
                <label>Title
                    <input name="title" type="text" id="title" />
                </label>
                <p>
                    <label>Description
                        <textarea name="description" id="description"></textarea>
                    </label>
                </p>
                <p>
                    <label>Image
                        <input name="image" type="hidden" id="image" value="" />
                        <input type="file" id="image_select" />
                    </label>
                </p>
                <p>
                    <label>Order
                        <input name="order" type="text" id="order" />
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