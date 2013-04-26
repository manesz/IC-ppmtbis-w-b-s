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
?>

<form id="form1" name="form1" method="post" action="">
    <table cellspacing="0" cellpadding="0">
        <tr>
            <td>
                <p>รูปบริษัท</p>

                <p><img src="#" width="263" height="192" alt=""/></p>
                <label>
                    <input type="text" name="textfield"/>
                </label>
                <label>
                    <input type="button" id="selectImg" value="select"/>
                </label>

                <p>
                    <label>รายละเอียดบริษัทภาษาไทย
                        <textarea name="textarea"></textarea>
                    </label>
                </p>

                <p>
                    <label>ที่อยู่บริษัทภาษาไทย
                        <textarea name="textarea2"></textarea>
                    </label>
                </p>

                <p>
                    <label>เบอร์โทรศัพท์ Office
                        <input type="text" name="textfield2"/>
                    </label>
                </p>

                <p>
                    <label>Email Office
                        <input type="text" name="textfield3"/>
                    </label>
                </p>

                <p>
                    <label>รายละเอียดสินค้าและบริการภาษาไทย
                        <textarea name="textarea3"></textarea>
                    </label>
                </p>
            </td>
            <td>
                <p>
                    <label>ชื่อบริษัทภาษาไทย
                        <input type="text" name="textfield4"/>
                    </label>
                </p>

                <p>
                    <label>ชื่อบริษัทภาษาอังกฤษ
                        <input type="text" name="textfield5"/>
                    </label>
                </p>

                <p>
                    <label>ชื่อบริษัทแบบย่อ
                        <input type="text" name="textfield6"/>
                    </label>
                </p>

                <p>
                    <label>ประเภทบริษัท
                        <select name="select">
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
                        <textarea name="textarea5"></textarea>
                    </label>
                </p>

                <p>
                    <label>เบอร์ FAX
                        <input type="text" name="textfield7"/>
                    </label>
                </p>

                <p>
                    <label>link website
                        <input type="text" name="textfield8"/>
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
            <textarea name="textarea7"></textarea>
        </label>
    </p>

    <p><strong>รายละเอียดการจ่ายเงิน</strong></p>

    <p>
        <label>Recruitment fee
            <input type="text" name="textfield10"/>
        </label><label>Payment Term
            <input type="text" name="textfield11"/>
        </label>
    </p>
    <p>
        <label>
            <input type="submit" name="Submit" value="Save" />
        </label>
    </p>
</form>
<?php
$this->load->view('footer');
?>