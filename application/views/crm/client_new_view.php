<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 20/5/2556
 * Time: 18:22 น.
 * To change this template use File | Settings | File Templates.
 */

$baseUrl = base_url();
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
    var folderID = 0;

    $(function () {
        genUploadImage("#logo_image_path", "#image_show", "#logo_image");
        genUploadFiles("#file_upload", "", "");
    });
    function genUploadImage(btnUpload, idReload, idSave) {
        $(btnUpload).uploadify({
            'multi'    : false,
//            'method'   : 'post',
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
                $.post(url_update_image_client, {
                        "id":folderID,
                        "path":data
                    },
                    function (result) {
                        if (result == "update fail") {
                            alert('เกิดการผิดพลาด\n** กรุณาตรวจสอบ **');
                        } else {
                            //window.location.reload();
                            $('#file_upload').uploadify('upload', '*');
                        }
                    }
                );
            },
            'queueSizeLimit': 1
        });
    }

    function genUploadFiles(btnUpload, idReload, idSave)
    {
        $(btnUpload).uploadify({
//            'multi'    : false,
//            'method'   : 'post',
            //'buttonImage' : "<?php echo $baseUrl; ?>assets/plugin/uploadify/browse-btn.png",
            'buttonClass' : 'bt-class',
            'auto': false,
            'formData'      : {
                'folder_id' : "noSet",
                'file_type' : "1",//file
                'path_upload': pathFileUpload
            },
            'onUploadStart' : function(file)
            {
                $(btnUpload).uploadify('settings', 'formData',{
                    'folder_id' : folderID,
                    'file_type' : "1",
                    'path_upload' : pathFileUpload
                });
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
                alert(data);
            },
            'queueSizeLimit': 5
        });
    }
</script>
<script>
    var url_new_data = "<?php echo $webUrl; ?>crm/clientNew";
    var url_update_image_client = "<?php echo $webUrl; ?>crm/clientUpdateImagePath";
    $(document).ready(function () {
        $('.clientCancel').click(function () {
            innerHtml("#content", this.href);
            return false;
        });

        $("#buttonSave").click(function () {
            if (validateFrom(document.getElementById('formPost'))) {
                $.post(url_new_data, $("#formPost").serialize(),
                    function (result) {
                        if (result == "add fail") {
                            alert(result);
                            alert('เกิดการผิดพลาด\n** กรุณาตรวจสอบ **');
                        } else {
                            folderID = result;
                            $('#logo_image_path').uploadify('upload', '*');
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
    <!--    <div class="alert alert-success">-->
    <!--        <button type="button" class="close" data-dismiss="alert">&times;</button>-->
    <!--        <h4>Success</h4>-->
    <!--        The operation completed successfully-->
    <!--    </div>-->
    <div class="navbar">
        <div class="navbar-inner">
            <ul class="breadcrumb">
                <i class="icon-chevron-left hide-sidebar"><a href='#' title="Hide Sidebar"
                                                             rel='tooltip'>&nbsp;</a></i>
                <i class="icon-chevron-right show-sidebar" style="display:none;">
                    <a href='#' title="Show Sidebar" rel='tooltip'>&nbsp;</a></i>
                <li>
                    <a class="clientCancel" href="<?php echo $webUrl; ?>crm/clientList">Client List</a> <span
                        class="divider">/</span>
                </li>
                <li class="active">New</li>
            </ul>
        </div>
    </div>
</div>
<div class="row-fluid">
    <!-- block -->
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">Client New</div>
        </div>
        <div class="block-content collapse in">
            <form id="formPost" name="formPost" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                <input type="hidden" name="key_account_manager_id" value="1"/>
                <table cellspacing="0" cellpadding="0">
                    <tr>
                        <td>
                            <label>รูปบริษัท
                                <input name="userfile" type="file" id="logo_image_path"/>
                                <input name="logo_image" type="hidden" id="logo_image" value=""/>
                            </label>

                            <p>
                                <label>รายละเอียดบริษัทภาษาไทย
                                    <textarea id="description_th" name="description_th"></textarea>
                                </label>
                            </p>

                            <p>
                                <label>ที่อยู่บริษัทภาษาไทย
                                    <textarea name="address_th" id="address_th"></textarea>
                                </label>
                            </p>

                            <p>
                                <label>เบอร์โทรศัพท์ Office
                                    <input name="office_number" type="text" id="office_number"/>
                                </label>
                            </p>

                            <p>
                                <label>Email Office
                                    <input name="email_office" type="text" id="email_office"/>
                                </label>
                            </p>

                            <p>
                                <label>รายละเอียดสินค้าและบริการภาษาไทย
                                    <textarea name="main_product_th" id="main_product_th"></textarea>
                                </label>
                            </p>
                        </td>
                        <td>
                            <p>
                                <label>ชื่อบริษัทภาษาไทย
                                    <input name="name_th" type="text" id="name_th"/>
                                </label>
                            </p>

                            <p>
                                <label>ชื่อบริษัทภาษาอังกฤษ
                                    <input name="name_en" type="text" id="name_en"/>
                                </label>
                            </p>

                            <p>
                                <label>ชื่อบริษัทแบบย่อ
                                    <input name="name_short" type="text" id="name_short"/>
                                </label>
                            </p>

                            <p>

                                <label>ประเภทบริษัท
                                    <select name="company_type_id" id="company_type_id">
                                        <?php
                                        foreach ($company_type as $value) {
                                            echo "<option value='$value->id'>$value->name</option>";
                                        }
                                        ?>
                                    </select>
                                </label>
                            </p>

                            <p>
                                <label>รายละเอียดบริษัทภาษาอังกฤษ
                                    <textarea name="description_en" id="description_en"></textarea>
                                </label>
                            </p>

                            <p>
                                <label>ที่อยู่ภาษาอังกฤษ
                                    <textarea name="address_en" id="address_en"></textarea>
                                </label>
                            </p>

                            <p>
                                <label>เบอร์ FAX
                                    <input name="fax_number" type="text" id="fax_number"/>
                                </label>
                            </p>

                            <p>
                                <label>link website
                                    <input name="website_link" type="text" id="website_link"/>
                                </label>
                            </p>

                            <p>
                                <label>รายละเอียดสินค้าและบริการภาษาอังกฤษ<textarea name="main_product_en"
                                                                                    id="main_product_en"></textarea>
                                </label>
                            </p>
                            <p>
                            <p>เลือกเอกสาร</p><input type="file" id="file_upload" name="file_upload"/>

                    </tr>
                </table>
                <p>
                    <label>Remark
                        <textarea name="remark" id="remark"></textarea>
                    </label>
                </p>

                <p><strong>รายละเอียดการจ่ายเงิน</strong></p>

                <p>
                    <label>Recruitment fee
                        <input name="recruitment_fee" type="text" id="recruitment_fee"/>
                    </label><label>Payment Term
                        <input name="payment_term" type="text" id="payment_term"/>
                    </label>
                </p>

                <p>
                    <label align="right">
                        <button class="btn btn-warning" id="buttonCancel">cancel</button>
                        <button class="btn btn-primary" id="buttonSave">save</button>
                    </label>
                </p>
            </form>
        </div>
    </div>
    <!-- /block -->
</div>