<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Chukkapun
 * Date: 23/4/2556
 * Time: 23:39 น.
 * To change this template use File | Settings | File Templates.
 */

//var_dump($_REQUEST['folder']);
$this->load->view('header');
$baseUrl = base_url() ;//. $_SERVER['HTTP_HOST'] == 'localhost' ? 'index.php/' : '';
echo "<p>$message</p>";
?>

    <link rel="stylesheet" type="text/css"
          href="<?php echo $baseUrl . "web/js/uploadify/uploadify.css"; ?>">
    <script src="<?php echo $baseUrl . 'web/js/jquery-1.9.1.js'; ?>"></script>
    <!--    <script src="--><?php //echo $baseUrl . 'web/js/uploadify/jquery.uploadify-3.1.js'; ?><!--"></script>-->
    <script type="text/javascript"
            src="<?php echo $baseUrl; ?>web/js/uploadify/jquery.uploadify-3.2.min.js"></script>
    <script>
        var swfPath = "<?php echo $baseUrl;?>web/js/uploadify/uploadify.swf";
        //var pathImgUpload = "<?php echo $baseUrl;?>web/images/upload/client";
        var pathImgUploadTmp = "<?php echo $baseUrl . "web/images/uploads/tmp";?>";
        //var pathUploadify = "<?php echo $baseUrl;?>web/js/uploadify.php";
        var pathUploadify = "<?php echo $baseUrl; ?>index.php/upload/do_upload";

        $(function () {
            genUpload("#logo_image_path", "#image_show", "#logo_image");
        });

        function genUpload(btnUpload, idReload, idSave) {
            $(btnUpload).uploadify({
                'userfile': {
                    'path': pathImgUploadTmp
                },
                'swf': swfPath,
                'uploader': pathUploadify,
                'fileSizeLimit': '120KB',
                'fileTypeExts': '*.gif; *.jpg; *.png',
                'enctype': "multipart/form-data",
                'fileObjName':'userfile',
                'onFallback': function () {
                    alert('Flash was not detected.');// detect flash compatible
                }, 'onUploadSuccess': function (file, data, response) {
                    reloadImgae(idReload , data, idSave);
                }
            });
        }

        function reloadImgae(id, img, idSave) {
            var path = pathImgUploadTmp + "/" + img;
            $(idSave).val(img);
            $(id).fadeOut().html(getTypeImage(path, "")).fadeIn("slow");
        }

        function getTypeImage(src, id){
            return '<img src="' + src + '" style="width: 250px; height: 190px;" class="nopad thumb"/>';
        }
    </script>
    <form id="form1" name="form1" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
        <input type="hidden" name="key_account_manager_id" value="1"/>
        <table cellspacing="0" cellpadding="0">
            <tr>
                <td>
                    <p>รูปบริษัท</p>

                    <p id="image_show"><img src="" width="263" height="192" alt="" /></p>
                    <label>
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

                    <p>upload เอกสาร &nbsp;ชื่อเอกสาร ..............................................</p>

                    <p>ชื่อเอกสาร ..............................................</p>

                    <p>ชื่อเอกสาร ..............................................</p>

                    <p>
                        <label>
                            <input type="text" name="textfield9"/>
                        </label>
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
            <label>
                <input name="save" type="submit" id="save" value="Save"/>
            </label>
        </p>
    </form>
<?php
$this->load->view('footer');
?>