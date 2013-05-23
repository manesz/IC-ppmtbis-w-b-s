<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 19/5/2556
 * Time: 11:42 น.
 * To change this template use File | Settings | File Templates.
 */
$baseUrl = base_url();
?>
<style type="text/css" title="currentStyle">
    @import "<?php echo $baseUrl; ?>assets/plugin/datatables/media/css/jquery-ui-1.10.3.custom.min.css";
    @import "<?php echo $baseUrl; ?>assets/plugin/datatables/media/css/demo_page.css";
    @import "<?php echo $baseUrl; ?>assets/plugin/datatables/media/css/demo_table_jui.css";
</style>
<!--<script type="text/javascript" charset="utf-8" src="--><?php //echo $baseUrl; ?><!--assets/plugin/datatables/media/js/jquery.js"></script>-->
<script type="text/javascript" charset="utf-8"
        src="<?php echo $baseUrl; ?>assets/plugin/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf-8"
        src="<?php echo $baseUrl; ?>assets/plugin/datatables/media/js/ZeroClipboard.js"></script>
<script type="text/javascript" charset="utf-8"
        src="<?php echo $baseUrl; ?>assets/plugin/datatables/media/js/TableTools.js"></script>
<script>
    $(document).ready(function () {
        $('#dataTable').dataTable();

        $('#buttonNew, .editData').click(function(){
            innerHtml("#content", this.href);
            return false;
        });

        $('.deleteData').click(function(){
            if (confirm("คุณต้องการลบข้อมูลใช่หรือไม่")) {
                $.post(this.href,
                    function (result) {
                        if (result == "delete fail") {
                            alert('เกิดการผิดพลาด\n** กรุณาตรวจสอบ **');
                        } else {
                            alert(result)
                            window.location = "<?php echo $webUrl; ?>website/navigator";
                        }
                    }
                );
            }
            return false;
        });


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
                <li class="active">Navigator</li>
            </ul>
        </div>
    </div>
</div>
<div class="row-fluid" id="contentInner">
<!-- block -->
<div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left">Navigator List</div>
        <div class="pull-right"><a id="buttonNew" href="<?php echo $webUrl; ?>website/navigatorNew"><span
                    class="badge badge-info">add</span></a></div>
    </div>
    <div class="block-content collapse in">
        <table cellpadding="0" cellspacing="0" border="0" class="display" id="dataTable">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Layer</th>
                <th>Parent</th>
                <th>Order</th>
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
                    <td><?php echo $value->layer; ?></td>
                    <td class="center"><?php echo $value->parent; ?></td>
                    <td class="center"><?php echo $value->order; ?></td>
                    <td class="center"><?php echo $value->create_time; ?></td>
                    <td class="center">
                        <a class="editData"
                           href="<?php echo $webUrl; ?>website/navigatorEdit/<?php echo $value->id; ?>">
                            แก้ไข</a> /
                        <a class="deleteData"
                           href="<?php echo $webUrl; ?>website/navigatorDelete/<?php echo $value->id; ?>">ลบ</a>
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