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
$pathUploadFile = $baseUrl. "upload/files/company/$id/";
?>

<!--    fancybox-->
<!--<link href="--><?php //echo $baseUrl; ?><!--assets/plugin/fancybox/css/product-view-style.css" rel="stylesheet" type="text/css"/>-->
<script type="text/javascript" src="<?php echo $baseUrl; ?>assets/js/jquery-1.4.4.min.js"></script>
<script type="text/javascript"
        src="<?php echo $baseUrl; ?>assets/plugin/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript"
        src="<?php echo $baseUrl; ?>assets/plugin/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>assets/plugin/fancybox/jquery.fancybox-1.3.4.css"
      media="screen"/>
<!--    end fancy box-->

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

    .uploadify-queue-item {
        background-color: #C7FFFF;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        font: 11px Verdana, Geneva, sans-serif;
        margin-top: 5px;
        width: 280px;
        padding: 10px;
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
                reloadImage(idReload, data, idSave);
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
                saveData(true, url_edit_data);
            },
            'queueSizeLimit': 5
        });
    }

    function reloadImage(id, img, idSave) {
        var path = "<?php echo $baseUrl; ?>" + pathImageUpload + "/" + "<?php echo $id; ?>/" + img;
        $(idSave).val(img);
        $(id).fadeOut().html(getTypeImage(path, "")).fadeIn("slow");
    }

    function getTypeImage(src, id) {
        return '<img src="' + src + '" width="250" height="190" class="nopad thumb"/>';
    }

    var url_edit_data = "<?php echo $webUrl; ?>crm/clientEdit/<?php echo $id; ?>";
    var url_delete_file = "<?php echo $webUrl; ?>crm/clientDeleteFile";
    var url_company_contact_list = "<?php echo $webUrl; ?>crm/companyContactList/<?php echo $id; ?>";
    var url_company_history_list = "<?php echo $webUrl; ?>crm/companyHistoryList/<?php echo $id; ?>";
    function saveData(reload, url)
    {
        $.post(url_edit_data, $("#formPost").serialize(),
            function (result) {
                if (result == "edit fail") {
                    alert('เกิดการผิดพลาด\n** กรุณาตรวจสอบ **');
                } else {
                    if (reload) {
                        innerHtml("#content", url);
                    }
                    if (url == "refresh") {
                        window.location.reload();
                    }
                }
            }
        );
    }
    $(document).ready(function () {
        $("#buttonSave").click(function () {
            if (validateFrom(document.getElementById('formPost'))) {
                saveData(false, "refresh");
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
                        saveData(true, url_edit_data);
                    }
                }
            );
            return false;
        });

        $("#companyContact").click(function(){

            return false;
        });

        innerHtml("#companyContactContent", url_company_contact_list);
        innerHtml("#companyContactHistory", url_company_history_list);
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
                <input type="hidden" name="key_account_manager_id" value="4"/>

                <div class="row-fluid">
                    <div class="span2">รูปบริษัท</div>
                    <div class="span4">
                        <div id="image_show">
                            <img width="250" height="190"
                                 src="<?php echo $baseUrl; ?>upload/images/company/<?php echo "$id/$logo_image"; ?>"/>
                        </div>
                        <input name="userfile" type="file" id="logo_image_path"/>
                        <input name="logo_image" type="hidden" id="logo_image" class="input-block-level"
                               value="<?php echo $logo_image; ?>"/>
                    </div>
                    <!--  class="input-block-level" -->
                    <div class="span2">ชื่อบริษัทภาษาไทย</div>
                    <div class="span4"><input name="name_th" type="text" id="name_th" class="input-block-level"
                            value="<?php echo $name_th; ?>"/></div>
                    <!--  class="input-block-level" -->
                </div>
                <div class="row-fluid">
                    <div class="span2">ชื่อบริษัทแบบย่อ</div>
                    <div class="span4"><input name="name_short" type="text" id="name_short" class="input-block-level"
                            value="<?php echo $name_short; ?>"/>
                    </div>
                    <!--  class="input-block-level" -->

                    <div class="span2">ชื่อบริษัทภาษาอังกฤษ</div>
                    <div class="span4"><input name="name_en" type="text" id="name_en" class="input-block-level"
                            value="<?php echo $name_en;?>"/></div>
                    <!--  class="input-block-level" -->
                </div>
                <div class="row-fluid">
                    <div class="span2">รายละเอียดบริษัทภาษาไทย</div>
                    <div class="span4"><textarea id="description_th" class="input-block-level" rows="5"
                                                 name="description_th"><?php echo $description_th; ?></textarea></div>
                    <!--  class="input-block-level" -->
                    <div class="span2">รายละเอียดบริษัทภาษาอังกฤษ</div>
                    <div class="span4"><textarea name="description_en" id="description_en" class="input-block-level"
                                                 rows="5"><?php echo $description_en; ?></textarea></div>
                    <!--  class="input-block-level" -->

                </div>
                <div class="row-fluid">
                    <div class="span2">ที่อยู่บริษัทภาษาไทย</div>
                    <div class="span4"><textarea name="address_th" id="address_th" class="input-block-level"
                                                 rows="5"><?php echo $address_th; ?></textarea></div>
                    <!--  class="input-block-level" -->
                    <div class="span2">ที่อยู่ภาษาอังกฤษ</div>
                    <div class="span4"><textarea name="address_en" id="address_en" class="input-block-level"
                                                 rows="5"><?php echo $address_en; ?></textarea></div>
                    <!--  class="input-block-level" -->
                </div>
                <div class="row-fluid">
                    <div class="span2">เบอร์โทรศัพท์ Office</div>
                    <div class="span4"><input name="office_number" type="text" id="office_number"
                                              class="input-block-level" value="<?php echo $office_number; ?>"/></div>
                    <!--  class="input-block-level" -->
                    <div class="span2">Email Office</div>
                    <div class="span4"><input name="email_office" type="text" id="email_office"
                                              class="input-block-level" value="<?php echo $email_office; ?>"/></div>
                    <!--  class="input-block-level" -->
                </div>
                <div class="row-fluid">
                    <div class="span2">ประเภทบริษัท</div>
                    <div class="span4">
                        <select name="company_type_id" id="company_type_id" class="input-block-level">
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
                    </div>
                    <!--  class="input-block-level" -->
                    <div class="span2">เบอร์ FAX</div>
                    <div class="span4"><input name="fax_number" type="text" id="fax_number" class="input-block-level"
                            value="<?php echo $fax_number; ?>"/>
                    </div>
                    <!--  class="input-block-level" -->
                </div>
                <div class="row-fluid">
                    <div class="span2">รายละเอียดสินค้าและบริการภาษาไทย</div>
                    <div class="span4"><textarea name="main_product_th" id="main_product_th" class="input-block-level"
                                                 rows="5"><?php echo $main_product_th; ?></textarea></div>
                    <!--  class="input-block-level" -->
                    <div class="span2">รายละเอียดสินค้าและบริการภาษาอังกฤษ</div>
                    <div class="span4"><textarea name="main_product_en" id="main_product_en" class="input-block-level"
                                                 rows="5"><?php echo $main_product_en;?></textarea></div>
                    <!--  class="input-block-level" -->
                </div>
                <div class="row-fluid">
                    <div class="span2">link website</div>
                    <div class="span4"><input name="website_link" type="text" id="website_link"
                                              class="input-block-level" value="<?php echo $website_link;?>"/></div>
                    <!--  class="input-block-level" -->
                    <div class="span2">เลือกเอกสาร</div>
                    <div class="span4">
                        <?php if ($arrFileName) foreach ($arrFileName as $key => $value): ?>
                            <?php

                            $arrStrName = explode("-", $value);
                            $pointStr = strpos($value, $arrStrName[3]);

                            $strFileName = substr($value, $pointStr, strlen($value));
                            ?>
                            <p>
                                File<?php echo $key + 1 . ": ";
                                ?>
                                <a href="<?php echo $pathUploadFile . $strFileName; ?>" title="<?php echo $strFileName; ?>" download="<?php echo $strFileName; ?>"><?php echo $strFileName; ?></a>
                                <a class="file-delete" href="#<?php echo $value; ?>">
                                    <img title="Delete file<?php echo $key + 1?>"
                                         src="<?php echo $baseUrl; ?>assets/plugin/uploadify/uploadify-cancel.png"/>
                                </a></p>
                        <?php endforeach; ?>
                        <p><input type="file" id="file_upload" name="file_upload"/></p>
                    </div>
                    <!--  class="input-block-level" -->
                </div>
                <div class="row-fluid">
                    <div class="span2">Remark</div>
                    <div class="span10"><textarea name="remark" id="remark" class="input-block-level"
                                                  rows="5"><?php echo $remark; ?></textarea></div>
                    <!--  class="input-block-level" -->
                </div>
                <p><strong>รายละเอียดการจ่ายเงิน</strong></p>

                <div class="row-fluid">
                    <div class="span2">Recruitment fee</div>
                    <div class="span4"><input name="recruitment_fee" type="text" id="recruitment_fee"
                                              class="input-block-level" value="<?php echo $recruitment_fee; ?>"/></div>
                    <!--  class="input-block-level" -->
                    <div class="span2">Payment Term</div>
                    <div class="span4"><input name="payment_term" type="text" id="payment_term"
                                              class="input-block-level" value="<?php echo $payment_term; ?>"/></div>
                    <!--  class="input-block-level" -->
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
    <div class="block" id="companyContactContent"></div>
    <div class="block" id="companyContactHistory"></div>
    <!-- /block -->
    <!--content inner-->
</div>