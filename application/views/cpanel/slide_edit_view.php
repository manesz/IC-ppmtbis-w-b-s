<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 24/5/2556
 * Time: 14:07 น.
 * To change this template use File | Settings | File Templates.
 */

$baseUrl = base_url();
extract((array)$arrData);
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
//            'method'   : 'post',
            //'auto': false,
            'formData'      : {
                'folder_id' : "<?php echo $id; ?>",
                'file_type' : "2",//image
                'path_upload': pathImageUpload
            },
            /*'onUploadStart' : function(file)
            {
                $(btnUpload).uploadify('settings', 'formData',{
                    'folder_id' : folderID,
                    'file_type' : "2",
                    'path_upload' : pathImageUpload
                });
            },*/
            'swf': swfPath,
            'uploader': pathUploadify,
            'fileSizeLimit': '500KB',
            'fileTypeExts': '*.gif; *.jpg; *.png',
            'enctype': "multipart/form-data",
            'fileObjName': 'userfile',
            'onFallback': function () {
                alert('Flash was not detected.');// detect flash compatible
            }, 'onUploadSuccess': function (file, data, response) {
                reloadImgae(idReload, data, idSave);
            },
            'queueSizeLimit': 1
        });
    }

    function reloadImgae(id, img, idSave) {
        var path = "<?php echo $baseUrl; ?>" + pathImageUpload + "/" + "<?php echo $id; ?>/"+ img;
        $(idSave).val(img);
        $(id).fadeOut().html(getTypeImage(path, "")).fadeIn("slow");
    }

    function getTypeImage(src, id) {
        return '<img src="' + src + '" width="250" height="190" class="nopad thumb"/>';
    }

    var url_edit_data = "<?php echo $webUrl; ?>cpanel/slideEdit/<?php echo $id; ?>";
    $(document).ready(function () {
        $("#buttonSave").click(function () {
            if (validateFrom(document.getElementById('formPost'))) {
                $.post(url_edit_data, $("#formPost").serialize(),
                    function (result) {
                        if (result == "edit fail") {
                            alert('เกิดการผิดพลาด\n** กรุณาตรวจสอบ **');
                        } else {
                            alert(result)
                            window.location = "<?php echo $webUrl; ?>cpanel/slide";
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
                <i class="icon-chevron-left hide-sidebar">
                    <a href='<?php echo $webUrl; ?>cpanel/slide' title="Hide Sidebar" rel='tooltip'>&nbsp;</a></i>
<!--                <i class="icon-chevron-right show-sidebar" style="display:none;">-->
<!--                    <a href='--><?php //echo $webUrl; ?><!--cpanel/slide' title="Show Sidebar" rel='tooltip'>&nbsp;</a></i>-->
                <li>
                    <a href="<?php echo $webUrl; ?>cpanel/slide">Slide</a> <span class="divider">/</span>
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
            <div class="muted pull-left">Slide Edit</div>
            <!--            <div class="pull-right"><span class="badge badge-info">1,234</span></div>-->
        </div>
        <div class="block-content collapse in">
            <form id="formPost" name="formPost" method="post" action="">
                <label>Title
                    <input name="title" type="text" id="title" value="<?php echo $title; ?>" />
                </label>
                <p>
                    <label>Description
                        <textarea name="description" id="description"><?php echo $description; ?></textarea>
                    </label>
                </p>
                <p>
                    <label>Image<br>
                        <div id="image_show">
                            <img  width="250" height="190"
                                  src="<?php echo $baseUrl; ?>upload/images/slide/<?php echo "$id/$image"; ?>"/>
                        </div>
                        <input name="image" type="hidden" id="image" value="<?php echo $image; ?>" />
                        <input type="file" id="image_select" />
                    </label>
                </p>
                <p>
                    <label>Order
                        <input name="order" type="text" id="order" value="<?php echo $order; ?>"/>
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