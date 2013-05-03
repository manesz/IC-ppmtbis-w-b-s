<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Chukkapun
 * Date: 23/4/2556
 * Time: 23:39 น.
 * To change this template use File | Settings | File Templates.
 */
?>

<?php
$this->load->view('header');
$baseUrl = base_url();
?>
    <p><?php echo $message != "" ? $message : ""; ?></p>
    <p>
        <strong>แก้ไขข้อมูลบริษัท</strong>
    </p>
    <form id="form1" name="form1" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
        <input type="hidden" name="key_account_manager_id" value="1"/>
        <table cellspacing="0" cellpadding="0">
            <tr>
                <td>
                    <p>รูปบริษัท</p>

                    <p><img src="#" width="263" height="192" alt=""/></p[>
                    <label>
                        <input name="logo_image_path" type="file" id="logo_image_path"/>
                        <input name="logo_image" type="hidden" id="logo_image"
                               value="<?php echo $dataClient->logo_image; ?>"/>
                    </label>

                    <p>
                        <label>รายละเอียดบริษัทภาษาไทย
                            <textarea id="description_th"
                                      name="description_th"><?php echo $dataClient->description_th; ?></textarea>
                        </label>
                    </p>

                    <p>
                        <label>ที่อยู่บริษัทภาษาไทย
                            <textarea name="address_th"
                                      id="address_th"><?php echo $dataClient->address_th; ?></textarea>
                        </label>
                    </p>

                    <p>
                        <label>เบอร์โทรศัพท์ Office
                            <input name="office_number" type="text" id="office_number"
                                   value="<?php echo $dataClient->office_number; ?>"/>
                        </label>
                    </p>

                    <p>
                        <label>Email Office
                            <input name="email_office" type="text" id="email_office"
                                   value="<?php echo $dataClient->email_office; ?>"/>
                        </label>
                    </p>

                    <p>
                        <label>รายละเอียดสินค้าและบริการภาษาไทย
                            <textarea name="main_product_th"
                                      id="main_product_th"><?php echo $dataClient->main_product_th; ?></textarea>
                        </label>
                    </p>
                </td>
                <td>
                    <p>
                        <label>ชื่อบริษัทภาษาไทย
                            <input name="name_th" type="text" id="name_th"
                                   value="<?php echo $dataClient->name_th; ?>"/>
                        </label>
                    </p>

                    <p>
                        <label>ชื่อบริษัทภาษาอังกฤษ
                            <input name="name_en" type="text" id="name_en"
                                   value="<?php echo $dataClient->name_en; ?>"/>
                        </label>
                    </p>

                    <p>
                        <label>ชื่อบริษัทแบบย่อ
                            <input name="name_short" type="text" id="name_short"
                                   value="<?php echo $dataClient->name_short; ?>"/>
                        </label>
                    </p>

                    <p>
                        <label>ประเภทบริษัท
                            <select name="company_type_id" id="company_type_id">
                                <?php
                                foreach ($company_type as $value) {
                                    if ($dataClient->company_type_id == $value->id) {
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
                                      id="description_en"><?php echo $dataClient->description_en; ?></textarea>
                        </label>
                    </p>

                    <p>
                        <label>ที่อยู่ภาษาอังกฤษ
                            <textarea name="address_en"
                                      id="address_en"><?php echo $dataClient->address_en; ?></textarea>
                        </label>
                    </p>

                    <p>
                        <label>เบอร์ FAX
                            <input name="fax_number" type="text" id="fax_number"
                                   value="<?php echo $dataClient->fax_number; ?>"/>
                        </label>
                    </p>

                    <p>
                        <label>link website
                            <input name="website_link" type="text" id="website_link"
                                   value="<?php echo $dataClient->website_link; ?>"/>
                        </label>
                    </p>

                    <p>
                        <label>รายละเอียดสินค้าและบริการภาษาอังกฤษ
                            <textarea name="main_product_en"
                                      id="main_product_en"><?php echo $dataClient->main_product_en; ?></textarea>
                        </label>
                    </p>

                    <p>upload เอกสาร &nbsp;ชื่อเอกสาร ..............................................</p>

                    <p>ชื่อเอกสาร ..............................................</p>

                    <p>ชื่อเอกสาร ..............................................</p>

                    <p>
                        <label>
                            <input type="text" name="textfield9" value=""/>
                        </label>
                        <label>
                            <input type="button" id="selectFile" value="select"/>
                        </label>
                    </p>

            </tr>
        </table>
        <p>
            <label>Remark
                <textarea name="remark" id="remark"><?php echo $dataClient->remark; ?></textarea>
            </label>
        </p>

        <p><strong>รายละเอียดการจ่ายเงิน</strong></p>

        <p>
            <label>Recruitment fee
                <input name="recruitment_fee" type="text" id="recruitment_fee"
                       value="<?php echo $dataClient->recruitment_fee; ?>"/>
            </label><label>Payment Term
                <input name="payment_term" type="text" id="payment_term"
                       value="<?php echo $dataClient->payment_term; ?>"/>
            </label>
        </p>

        <p>
            <label>
                <input type="button" id="cancel" value="Cancel"
                       onclick="window.location = '<?php echo $baseUrl . 'index.php/client/clientList';?>'"
                    style="cursor: pointer;"/>
                <input name="save" type="submit" id="save" value="Save"
                       style="cursor: pointer;"/>
            </label>
        </p>
    </form>

    <p><strong>ผู้ติดต่อประสานงานกับ Office</strong></p>
    <p><strong>History</strong></p>
<?php
$this->load->view('footer');
?>