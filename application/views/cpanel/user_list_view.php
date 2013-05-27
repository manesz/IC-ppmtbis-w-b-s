<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 24/5/2556
 * Time: 16:07 น.
 * To change this template use File | Settings | File Templates.
 */

$baseUrl = base_url();
$this->load->view('header_datatable_view');
?>
<script>
    $(document).ready(function () {
        $('#dataTable').dataTable();

        $('#buttonNew').click(function(){
            innerHtml("#content", this.href);
            return false;
        });
    });

    function deleteClick(url)
    {
        if (confirm("คุณต้องการลบข้อมูลใช่หรือไม่")) {
            $.post(url,
                function (result) {
                    if (result == "delete fail") {
                        alert('เกิดการผิดพลาด\n** กรุณาตรวจสอบ **');
                    } else {
                        alert(result)
                        window.location.reload();
                    }
                }
            );
        }
        return false;
    }
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
                <li class="active">User</li>
            </ul>
        </div>
    </div>
</div>
<div class="row-fluid" id="contentInner">
    <!-- block -->
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">User List</div>
            <div class="pull-right"><a id="buttonNew" href="<?php echo $webUrl; ?>cpanel/userNew"><span
                        class="badge badge-info">add</span></a></div>
        </div>
        <div class="block-content collapse in">
            <table cellpadding="0" cellspacing="0" border="0" class="display" id="dataTable">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Permission</th>
                    <th>วันที่สร้าง</th>
                    <th>จัดการข้อมูล</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($arrayData as $key => $value):
                    ?>

                    <tr class="<?php echo "odd_gradeX" ? $key % 2 == 0 : "odd_gradeA"; ?>">
                        <td class="center"><?php echo $value->id; ?></td>
                        <td><?php echo $value->name; ?></td>
                        <td><?php echo $value->description; ?></td>
                        <td><?php echo $value->phone; ?></td>
                        <td><?php echo $value->email; ?></td>
                        <td><?php echo $value->permission; ?></td>
                        <td class="center"><?php echo $value->create_time; ?></td>
                        <td class="center">
                            <a class="editData" onclick="innerHtml('#content',
                                '<?php echo $webUrl; ?>cpanel/userEdit/<?php echo $value->id; ?>');return false;"
                               href="<?php echo $webUrl; ?>cpanel/userEdit/<?php echo $value->id; ?>">
                                แก้ไข</a> /
                            <a class="deleteData" href="#"
                               onclick="return deleteClick('<?php echo $webUrl; ?>cpanel/userDelete/<?php echo $value->id; ?>')">ลบ</a>
                            <!--/ <a href="#">ดู</a>-->
                        </td>
                    </tr>
                <?php
                endforeach;
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- /block -->
</div>