<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 20/5/2556
 * Time: 17:17 น.
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
        $('#clientList').dataTable();

        $('#clientNew').click(function(){
            innerHtml("#content", this.href);
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
                <li class="active">Client List</li>
            </ul>
        </div>
    </div>
</div>
<div class="row-fluid">
    <!-- block -->
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">Client List</div>
            <div class="pull-right"><a id="clientNew" href="<?php echo $webUrl; ?>crm/clientNew"><span
                        class="badge badge-info">add</span></a></div>
        </div>
        <div class="block-content collapse in">
            <table cellpadding="0" cellspacing="0" border="0" class="display" id="clientList">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>ชื่อบริษัท</th>
                    <th>ประเภทบริษัท</th>
                    <th>ผู้ติดต่อประสานงาน</th>
                    <th>วันที่สร้าง</th>
                    <th>วันที่แก้ไข</th>
                    <th>จัดการข้อมูล</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($arrClientList as $key => $value):
                    ?>

                    <tr class="<?php echo "odd_gradeX" ? $key % 2 == 0 : "odd_gradeA"; ?>">
                        <td class="center"><?php echo $value->id; ?></td>
                        <td><?php echo $value->name_th; ?></td>
                        <td><?php echo $value->company_type_name; ?></td>
                        <td><?php echo $value->id; ?></td>
                        <td class="center"><?php echo $value->create_time; ?></td>
                        <td class="center"><?php echo $value->update_time; ?></td>
                        <td class="center"><a
                                href="<?php echo $webUrl; ?>crm/clientEdit/<?php echo $value->id; ?>">
                                แก้ไข</a>/ <a href="#">ลบ</a>/ <a href="#">ดู</a>/ <a href="#">เพิ่มตำแหน่งงาน</a></td>
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