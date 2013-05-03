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
$baseUrl = base_url();
?>
    <form id="form1" name="form1" method="post" action="">
        <label>ชื่อบริษัท
            <input type="text" name="textfield" />
        </label>
        <label>ประเภทบริษัท
            <select name="company_type_id" id="company_type_id">
                <?php
                foreach ($company_type as $value) {
                    echo "<option value='$value->id'>$value->name</option>";
                }
                ?>
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
    <table width="950">
        <tr>
            <td>
                <strong>ข้อมูลรายการบริษัท</strong></td>
            <td>
                <a href="<?php echo $baseUrl; ?>index.php/client/clientNew">เพิ่มข้อมูลใหม่</a></td>
        </tr>
    </table>
    <table width="950" border="1">
        <tr>
            <td width="26" align="center"><a href="#">ID</a></td>
            <td width="138" align="center"><a href="#">ชื่อบริษัท</a></td>
            <td width="108" align="center"><a href="#">ประเภทบริษัท</a></td>
            <td width="167" align="center"><a href="#">ผู้ติดต่อประสานงาน</a></td>
            <td width="101" align="center"><a href="#">วันที่สร้าง</a></td>
            <td width="104" align="center"><a href="#">วันที่แก้ไข</a></td>
            <td width="235" align="center"><a href="#">จัดการข้อมูล</a></td>
        </tr>
        <?php
        foreach ($arrClientList as $key => $value):

        ?>
        <tr>
            <td><?php echo $value->id; ?></td>
            <td><?php echo $value->name_th; ?></td>
            <td><?php echo $value->company_type_name; ?></td>
            <td><?php echo $value->id; ?></td>
            <td><?php echo $value->create_time; ?></td>
            <td><?php echo $value->update_time; ?></td>
            <td><a href="<?php echo $baseUrl; ?>index.php/client/clientEdit/<?php echo $value->id; ?>">
                    แก้ไข</a>/ <a href="#">ลบ</a>/ <a href="#">ดู</a>/ <a href="#">เพิ่มตำแหน่งงาน</a></td>
        </tr>
            <?php
        endforeach;
        ?>
    </table>
<?php
$this->load->view('footer');
?>