<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 29/7/2556
 * Time: 22:11 น.
 * To change this template use File | Settings | File Templates.
 */

$baseUrl = base_url();
$arrPosition = $this->CRM_model->positionList();
extract((array)$arrData);
?>

<script>
    $(document).ready(function () {
        $("#btnSave").click(function () {
            var url = "<?php echo $webUrl; ?>crm/companyContactEdit/<?php echo $id; ?>/<?php echo $company_id?>";
            if (validateFrom(document.getElementById('fancyFormPost'))) {
                $.post(url, $("#fancyFormPost").serialize(),
                    function (result) {
                        if (result == "add fail") {
                            alert('เกิดการผิดพลาด\n** กรุณาตรวจสอบ **');
                        } else {
                            alert(result);
                            innerHtml("#companyContactContent", url_company_contact_list);
                            $.fancybox.close();
                        }
                    }
                );
            }
            return false;
        });
    });

    function validateFrom(frm)
    {
        if (frm.name.value == "") {
            alert('กรุณากรอก ชื่อผู้ติดต่อ');
            frm.name.focus();
            return false;
        } else if(frm.position_id.value == "0"){
            alert("กรุณาเลือก ตำแหน่ง");
            frm.position_id.focus();
            return false;
        } else if (frm.phone.value == "") {
            alert('กรุณากรอก เบอร์ติดต่อ');
            frm.phone.focus();
            return false;
        } else if (frm.email.value == "") {
            alert('กรุณากรอก Email');
            frm.email.focus();
            return false;
        }
        return true;
    }
</script>
<div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left">แก้ไขรายการผู้ติดต่อประสานงาน</div>
        <!--            <div class="pull-right"><span class="badge badge-info">1,234</span></div>-->
    </div>
    <div class="block-content collapse in">
        <form id="fancyFormPost" name="fancyFormPost" method="post" action="">
            <input type="hidden" name="typeFrm" id="typeFrm" value="edit">
            <input type="hidden" name="company_id" id="company_id" value="<?php echo $company_id; ?>">
            <div class="row-fluid">
                <div class="span2">ชื่อผู้ติดต่อ</div>
                <div class="span4">
                    <input name="name" type="text" id="name" class="input-block-level"
                           value="<?php echo $name; ?>"/>
                </div>
                <div class="span2">ตำแหน่ง</div>
                <div class="span4">
                    <select name="position_id" id="position_id" class="input-block-level">
                        <option value="0"></option>
                        <?php foreach($arrPosition as $key => $value): ?>
                            <option <?php echo $value->int == $position_id ? 'selected': '';?>
                                value="<?php echo $value->int; ?>"><?php echo $value->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span2">เบอร์ติดต่อ</div>
                <div class="span4">
                    <input name="phone" type="text" id="phone" class="input-block-level"
                           value="<?php echo $phone; ?>"/>
                </div>
                <div class="span2">Email</div>
                <div class="span4">
                    <input name="email" type="text" id="email" class="input-block-level"
                           value="<?php echo $email; ?>"/>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12" align="right">
                    <button class="btn btn-warning" onclick="$.fancybox.close();return false;">cancel</button>
                    <button class="btn btn-primary" id="btnSave">save</button>
                </div>
            </div>
        </form>
    </div>
</div>