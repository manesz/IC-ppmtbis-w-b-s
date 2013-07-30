<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 29/7/2556
 * Time: 22:11 น.
 * To change this template use File | Settings | File Templates.
 */

$baseUrl = base_url();
$arrEmployee = $this->CRM_model->employeeList();
?>

<script>
    $(document).ready(function () {
        $("#btnSave").click(function () {
            var url = "<?php echo $webUrl; ?>crm/companyHistoryNew/<?php echo $id?>";
            if (validateFrom(document.getElementById('fancyFormPost'))) {
                $.post(url, $("#fancyFormPost").serialize(),
                    function (result) {
                        if (result == "add fail") {
                            alert('เกิดการผิดพลาด\n** กรุณาตรวจสอบ **');
                        } else {
                            innerHtml("#companyHistory", url_company_history_list);
                            $.fancybox.close();
                        }
                    }
                );
            }
            return false;
        });
    });

    function validateFrom(frm) {
        if (frm.title.value == "") {
            alert('กรุณากรอก หัวข้อ');
            frm.title.focus();
            return false;
        } else if (frm.description.value == "") {
            alert("กรุณาเลือก รายละเอียด");
            frm.description.focus();
            return false;
        } else if (frm.key_account_manager_id.value == "0") {
            alert('กรุณาเลือก key account manager');
            frm.key_account_manager_id.focus();
            return false;
        }
        return true;
    }
</script>
<div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left">เพิ่มรายการประวัติการติดต่อกับบริษัท</div>
        <!--            <div class="pull-right"><span class="badge badge-info">1,234</span></div>-->
    </div>
    <div class="block-content collapse in">
        <form id="fancyFormPost" name="fancyFormPost" method="post" action="">
            <input type="hidden" name="typeFrm" id="typeFrm" value="add">
            <input type="hidden" name="company_id" id="company_id" value="<?php echo $id; ?>">

            <div class="row-fluid">
                <div class="span2">วันที่</div>
                <div class="span4">
                    <input class="input-block-level"
                           value="<?php echo date("Y-m-d H:i:s"); ?>" disabled/>
                    <input name="create_time" type="hidden" id="create_time"
                           value="<?php echo date("Y-m-d H:i:s"); ?>"/>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span2">หัวข้อ</div>
                <div class="span4">
                    <input name="title" type="text" id="title" class="input-block-level" value=""/>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span2">รายละเอียด</div>
                <div class="span4">
                    <textarea name="description" id="description" class="input-block-level" rows="5"></textarea>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span2">ความสำคัญ</div>
                <div class="span4">
                    <input type="radio" name="priority" value="3">มาก
                    <input type="radio" name="priority" value="2"> ปานกลาง
                    <input type="radio" name="priority" value="1" checked> น้อย
                </div>
            </div>
            <div class="row-fluid">
                <div class="span2">key account manager</div>
                <div class="span4">
                    <select name="key_account_manager_id" id="key_account_manager_id" class="input-block-level">
                        <option value="0"></option>
                        <?php foreach ($arrEmployee as $key => $value): ?>
                            <option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12" align="right">
                    <button class="btn btn-warning" onclick="$.fancybox.close();return false;">cancel</button>
                    <button class="btn btn-primary" id="btnSave">add</button>
                </div>
            </div>
        </form>
    </div>
</div>