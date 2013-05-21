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
<script>
    var swfPath = "<?php echo $baseUrl;?>assets/plugin/uploadify/uploadify.swf";
    var pathUploadify = "<?php echo $webUrl; ?>upload/do_upload";
    var pathImageUpload = "upload/images/company/";
    var pathFileUpload = "upload/files/company/";
    var folderID = 0;

    $(function () {
        genUploadImage("#logo_image_path", "#image_show", "#logo_image");
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
                //reloadImgae(idReload, data, idSave);
                alert(data);
            },
            'onSelect': function (file) {
                //alert('The file ' + file.name + ' was added to the queue.');
                //$("#logo_image_path").hide();
            },
            'queueSizeLimit': 1
        });
    }

    function reloadImgae(id, img, idSave) {
        var path = pathImgUploadTmp + "/" + img;
        $(idSave).val(img);
        $(id).fadeOut().html(getTypeImage(path, "")).fadeIn("slow");
    }

    function getTypeImage(src, id) {
        return '<img src="' + src + '" style="width: 250px; height: 190px;" class="nopad thumb"/>';
    }
</script>
<script>
    var urlClientNew = "<?php echo $webUrl; ?>crm/clientNew";
    $(document).ready(function () {
        $('.clientCancel').click(function () {
            innerHtml("#content", this.href);
            return false;
        });

        $("#save").click(function () {
//            alert(urlClientNew);return false;
            if (validate(this)) {
                $.post(urlClientNew, $("#frmClientNew").serialize(),
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

    });

    function validate(frm) {
        return true;
    }
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
            <div class="pull-right"><a class="clientCancel" href="<?php echo $webUrl; ?>crm/clientList"><span
                        class="badge badge-warning">cancel</span></a></div>
        </div>
        <div class="block-content collapse in">
            <form id="frmClientNew" name="frmClientNew" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
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

                            <p>upload เอกสาร</p>

                            <p>ชื่อเอกสาร 1 <input type="file" id="file1" name="file1"/></p>
                            <p>ชื่อเอกสาร 2 <input type="file" id="file2" name="file2"/></p>
                            <p>ชื่อเอกสาร 3 <input type="file" id="file3" name="file3"/></p>
                            <p>ชื่อเอกสาร 4 <input type="file" id="file4" name="file4"/></p>
                            <p>ชื่อเอกสาร 5 <input type="file" id="file5" name="file5"/></p>

                            <p>
                                <label>
                                    <input type="button" id="selectFile" value="select"/>
                                </label>
                            </p>

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
                        <!--                        <input class="btn btn-primary" name="save" type="submit" id="save" value="Save"/>-->
                        <input class="btn btn-primary" name="save" type="button" id="save" value="Save"/>
                    </label>
                </p>
            </form>
        </div>
    </div>
    <!-- /block -->
</div>