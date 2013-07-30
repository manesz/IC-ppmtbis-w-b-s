<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 29/7/2556
 * Time: 22:11 น.
 * To change this template use File | Settings | File Templates.
 */

$baseUrl = base_url();
$this->load->view('header_datatable_view');
?>
<script>
    $(document).ready(function () {
        $('#tbData').dataTable();
    });

    function showFancy(url) {
        //alert(url);
        $.fancybox({
            'width'	: '600',
            'height'	: '400',
            'titlePosition'	: 'inside',
            'padding'		: 0,
            'opacity'		: true,
            'overlayShow'	: true,
            'transitionIn'	: 'elastic',
            'transitionOut'	: 'elastic',
            'hideOnOverlayClick' : false,
            'scrolling'		: 'no',
            'href'			: url
            //'onClosed'       :function(){innerHtml("#companyContactContent", url_company_contact_list);}
        });
        return false;
    }
</script>
<div class="navbar navbar-inner block-header">
    <div class="muted pull-left">ผู้ติดต่อประสานงานกับ Office</div>
    <div class="pull-right">
        <a id="companyContact" onclick="return showFancy('<?php echo $webUrl; ?>crm/companyContactNew/<?php echo $id; ?>')" href="#">
            <span class="badge badge-info">add</span>
        </a>
    </div>
</div>
<div class="block-content collapse in">
    <table cellpadding="0" cellspacing="0" border="0" class="display" id="tbData">
        <thead>
        <tr>
            <th>ชื่อ</th>
            <th>ตำแหน่ง</th>
            <th>เบอร์โทร</th>
            <th>Email</th>
            <th>จัดการข้อมูล</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($arrData as $key => $value):
            ?>
            <tr class="<?php echo "odd_gradeX" ? $key % 2 == 0 : "odd_gradeA"; ?>">
                <td><?php echo $value->name; ?></td>
                <td><?php echo $value->position_name; ?></td>
                <td><?php echo $value->phone; ?></td>
                <td><?php echo $value->email; ?></td>
                <td class="center">
                    <a onclick="return showFancy('<?php echo $webUrl; ?>crm/companyContactEdit/<?php echo $value->id; ?>/<?php echo  $value->company_id; ?>'); "
                       href="#">
                        แก้ไข</a> /
                    <a href="#"
                       onclick="return deleteClick('<?php echo $webUrl; ?>crm/companyContactDelete/<?php echo $value->id; ?>');">ลบ</a>
                </td>
            </tr>
        <?php
        endforeach;
        ?>
        </tbody>
    </table>
</div>
<br>