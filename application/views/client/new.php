<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Chukkapun
 * Date: 23/4/2556
 * Time: 23:39 น.
 * To change this template use File | Settings | File Templates.
 */


$this->load->view('header');
$baseUrl = base_url();
?>

    <link rel="stylesheet" type="text/css"
          href="<?php echo $baseUrl . "web/js/uploadify/uploadify.css"; ?>">
    <script src="<?php echo $baseUrl . 'web/js/jquery-1.9.1.js'; ?>"></script>
    <script type="text/javascript"
            src="<?php echo $baseUrl; ?>web/js/uploadify/jquery.uploadify-3.1.min.js"></script>
    <script>
        var swfPath = "<?php echo $baseUrl;?>web/js/uploadify/uploadify.swf')}}";
        var pathUploadify = "<?php echo $baseUrl;?>web/js/uploadify/uploadify.php')}}";
        var pathImgUpload = "<?php echo $baseUrl;?>/web/images/";
        //    $(document).ready(function(){
        //       alert(333);
        //    });
    </script>
    <form id="form1" name="form1" method="post" action="">
        <table cellspacing="0" cellpadding="0">
            <tr>
                <td>
                    <p>รูปบริษัท</p>

                    <p><img src="#" width="263" height="192" alt=""/></p>
                    <label>
                        <input name="logo_image" type="text" id="logo_image"/>
                    </label>
                    <label>
                        <input type="button" id="selectImg" value="select"/>
                    </label>

                    <p>
                        <label>รายละเอียดบริษัทภาษาไทย
                            <textarea id="description_th"name="description_th"></textarea>
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
                            <textarea name="description_th" id="description_th"></textarea>
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
                            </select>
                        </label>
                    </p>

                    <p>
                        <label>รายละเอียดบริษัทภาษาอังกฤษ
                            <textarea name="textarea4"></textarea>
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
                        <label>รายละเอียดสินค้าและบริการภาษาอังกฤษ<textarea name="textarea6"></textarea>
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