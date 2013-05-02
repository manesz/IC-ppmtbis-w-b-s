<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Chukkapun
 * Date: 23/4/2556
 * Time: 23:22 น.
 * To change this template use File | Settings | File Templates.
 */

?>

<?php
$this->load->view('header');
?>
    <form id="form1" name="form1" method="post" action="">
        <label>ชื่อบริษัท
            <input type="text" name="textfield" />
        </label>
        <label>ประเภทบริษัท
            <select name="select">
            </select>
        </label>
        <p>
            <label>ผู้ติดต่อประสานงาน
                <select name="select2">
                </select>
            </label>
            <label>วันที่สร้างข้อมูล
                <input type="text" name="textfield2" />
            </label>
        </p>
        <p>
            <label>วันที่แก้ไขข้อมูล
                <input type="text" name="textfield3" />
            </label>
        </p>
        <p>
            <input type="button" value="search" />
        </p>
    </form>
<?php
$this->load->view('footer');
?>