<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 6/5/2556
 * Time: 23:09 น.
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

<style type="text/css">
    .bt-class {
        background: url('<?php echo $baseUrl; ?>assets/plugin/uploadify/browse-btn.png') 0 0 no-repeat;
        width: 120px !important;
        height: 30px !important;
        background-color: transparent;
        border: none;
        padding: 0;
    }
    .uploadify:hover .bt-class {
        background-color: transparent;
    }
</style>
<script>
    var swfPath = "<?php echo $baseUrl;?>assets/plugin/uploadify/uploadify.swf";
    var pathUploadify = "<?php echo $webUrl; ?>upload/do_upload";
    var pathImageUpload = "upload/images/company/";
    var pathFileUpload = "upload/files/company/";
    var folderID = <?php echo $id; ?>;

    $(function () {
        genUploadImage("#logo_image_path", "#image_show", "#logo_image");
        genUploadFiles("#file_upload", "", "");
    });
    function genUploadImage(btnUpload, idReload, idSave) {
        $(btnUpload).uploadify({
            'multi': false,
//            'method'   : 'post',
            //'auto': false,
            'formData': {
                'folder_id': folderID,
                'file_type': "2",//image
                'path_upload': pathImageUpload
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
                reloadImgae(idReload, data, idSave);
            },
            'queueSizeLimit': 1
        });
    }

    function genUploadFiles(btnUpload, idReload, idSave)
    {
        $(btnUpload).uploadify({
//            'multi'    : false,
//            'method'   : 'post',
            'buttonClass' : 'bt-class',
            'formData'      : {
                'folder_id' : folderID,
                'file_type' : "1",//file
                'path_upload': pathFileUpload
            },
            'swf': swfPath,
            'uploader': pathUploadify,
            'fileSizeLimit': '2048KB',
            'fileTypeExts': '*.doc; *.docx; *.xls; *.xlsx; *.pdf',//doc|docx|xls|xlsx|pdf
            'enctype': "multipart/form-data",
            'fileObjName': 'userfile',
            'onFallback': function () {
                alert('Flash was not detected.');// detect flash compatible
            }, 'onUploadSuccess': function (file, data, response) {
                innerHtml("#content", url_edit_data);
            },
            'queueSizeLimit': 5
        });
    }

    function reloadImgae(id, img, idSave) {
        var path = "<?php echo $baseUrl; ?>" + pathImageUpload + "/" + "<?php echo $id; ?>/" + img;
        $(idSave).val(img);
        $(id).fadeOut().html(getTypeImage(path, "")).fadeIn("slow");
    }

    function getTypeImage(src, id) {
        return '<img src="' + src + '" width="250" height="190" class="nopad thumb"/>';
    }

    var url_edit_data = "<?php echo $webUrl; ?>crm/clientEdit/<?php echo $id; ?>";
    var url_delete_file = "<?php echo $webUrl; ?>crm/clientDeleteFile";
    $(document).ready(function () {
        $("#buttonSave").click(function () {
            if (validateFrom(document.getElementById('formPost'))) {
                $.post(url_edit_data, $("#formPost").serialize(),
                    function (result) {
                        if (result == "edit fail") {
                            alert('เกิดการผิดพลาด\n** กรุณาตรวจสอบ **');
                        } else {
                            alert(result)
                            //window.location.reload();
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

        $(".file-delete").click(function () {
            if (!confirm("คุณต้องการลบไฟล์ ใช่ หรือไม่")) {
                return false;
            }
            var url = this.href;
            var strIndex = url.indexOf("#");
            var fileName = url.substr(strIndex + 1, url.length);
            $.post(url_delete_file,
                {
                    "id": folderID,
                    "fileName": fileName
                },
                function (result) {
                    if (result == "delete file fail") {
                        alert('เกิดการผิดพลาด\n** กรุณาตรวจสอบ **');
                    } else {
                        innerHtml("#content", url_edit_data);
                    }
                }
            );
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
                    <a href="<?php echo $webUrl; ?>crm/client">Client</a> <span class="divider">/</span>
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
            <div class="muted pull-left">Client Edit</div>
            <!--            <div class="pull-right"><span class="badge badge-info">1,234</span></div>-->
        </div>
        <div class="block-content collapse in">
            <form id="formPost" name="formPost" method="post" action="">
                <input type="hidden" name="key_account_manager_id" value="1"/>
                <table cellspacing="0" cellpadding="0">
                    <tr>
                        <td>
                            <label>รูปบริษัท
                                <div id="image_show">
                                    <img width="250" height="190"
                                         src="<?php echo $baseUrl; ?>upload/images/company/<?php echo "$id/$logo_image"; ?>"/>
                                </div>
                                <input name="userfile" type="file" id="logo_image_path"/>
                                <input name="logo_image" type="hidden" id="logo_image"
                                       value="<?php echo $logo_image; ?>"/>
                            </label>

                            <p>
                                <label>รายละเอียดบริษัทภาษาไทย
                                    <textarea id="description_th"
                                              name="description_th"><?php echo $description_th; ?></textarea>
                                </label>
                            </p>

                            <p>
                                <label>ที่อยู่บริษัทภาษาไทย
                                    <textarea name="address_th"
                                              id="address_th"><?php echo $address_th; ?></textarea>
                                </label>
                            </p>

                            <p>
                                <label>เบอร์โทรศัพท์ Office
                                    <input name="office_number" type="text"
                                           id="office_number" value="<?php echo $office_number; ?>"/>
                                </label>
                            </p>

                            <p>
                                <label>Email Office
                                    <input name="email_office" type="text" id="email_office"
                                           value="<?php echo $email_office; ?>"/>
                                </label>
                            </p>

                            <p>
                                <label>รายละเอียดสินค้าและบริการภาษาไทย
                                    <textarea name="main_product_th"
                                              id="main_product_th"><?php echo $main_product_th; ?></textarea>
                                </label>
                            </p>
                        </td>
                        <td>
                            <p>
                                <label>ชื่อบริษัทภาษาไทย
                                    <input name="name_th" type="text" id="name_th"
                                           value="<?php echo $name_th; ?>"/>
                                </label>
                            </p>

                            <p>
                                <label>ชื่อบริษัทภาษาอังกฤษ
                                    <input name="name_en" type="text"
                                           id="name_en" value="<?php echo $name_en; ?>"/>
                                </label>
                            </p>

                            <p>
                                <label>ชื่อบริษัทแบบย่อ
                                    <input name="name_short" type="text" id="name_short"
                                           value="<?php echo $name_short; ?>"/>
                                </label>
                            </p>

                            <p>
                                <label>ประเภทบริษัท
                                    <select name="company_type_id" id="company_type_id">
                                        <?php
                                        foreach ($company_type as $value) {
                                            if ($company_type_id == $value->id) {
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
                                <label>รายละเอียดบริษัทภาษาอังกฤษ
                                    <textarea name="description_en"
                                              id="description_en"><?php echo $description_en; ?></textarea>
                                </label>
                            </p>

                            <p>
                                <label>ที่อยู่ภาษาอังกฤษ
                                    <textarea name="address_en" id="address_en"><?php echo $address_en; ?></textarea>
                                </label>
                            </p>

                            <p>
                                <label>เบอร์ FAX
                                    <input name="fax_number" type="text" id="fax_number"
                                           value="<?php echo $fax_number; ?>"/>
                                </label>
                            </p>

                            <p>
                                <label>link website
                                    <input name="website_link" type="text"
                                           id="website_link" value="<?php echo $website_link; ?>"/>
                                </label>
                            </p>

                            <p>
                                <label>รายละเอียดสินค้าและบริการภาษาอังกฤษ
                                    <textarea name="main_product_en"
                                              id="main_product_en"><?php echo $main_product_en; ?></textarea>
                                </label>
                            </p>

                            <p>upload เอกสาร</p>
                            <?php if ($arrFileName) foreach ($arrFileName as $key => $value): ?>
                                <?php

                                $arrStrName = explode("-", $value);
                                $pointStr = strpos($value, $arrStrName[3]);

                                $strFileName = substr($value, $pointStr, strlen($value));
                                ?>
                                <p>
                                    File<?php echo $key + 1 . ": ";
                                    echo $strFileName; ?>
                                    <a class="file-delete" href="#<?php echo $value; ?>">
                                        <img title="Delete file<?php echo $key + 1?>"
                                            src="<?php echo $baseUrl; ?>assets/plugin/uploadify/uploadify-cancel.png"/>
                                    </a></p>
                            <?php endforeach; ?>
                            <p><input type="file" id="file_upload"></p>
                    </tr>
                </table>
                <p>
                    <label>Remark
                        <textarea name="remark" id="remark"><?php echo $remark; ?></textarea>
                    </label>
                </p>

                <p><strong>รายละเอียดการจ่ายเงิน</strong></p>

                <p>
                    <label>Recruitment fee
                        <input name="recruitment_fee" type="text" id="recruitment_fee"
                               value="<?php echo $recruitment_fee; ?>"/>
                    </label><label>Payment Term
                        <input name="payment_term" type="text" id="payment_term"
                               value="<?php echo $payment_term; ?>"/>
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