<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 28/7/2556
 * Time: 11:33 น.
 * To change this template use File | Settings | File Templates.
 */

$baseUrl = base_url();

?>
<script>
    var url_new_data = "<?php echo $webUrl; ?>crm/employeeNew";
    $(document).ready(function () {
        $("#buttonSave").click(function () {
            if (validateFrom(document.getElementById('formPost'))) {
                $.post(url_new_data, $("#formPost").serialize(),
                    function (result) {
                        if (result == "add fail") {
                            alert('เกิดการผิดพลาด\n** กรุณาตรวจสอบ **');
                        } else {
                            window.location.reload();
                        }
                    }
                );
            }
            return false;
        });
    });
</script>
<!-- block -->
<div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left">Employee New</div>
        <!--            <div class="pull-right"><span class="badge badge-info">1,234</span></div>-->
    </div>
    <div class="block-content collapse in">
        <form id="formPost" name="formPost" method="post" action="">
            <input type="hidden" name="typeFrm" id="typeFrm" value="add">
            <input type="hidden" name="permission" id="permission" value="0">

            <div class="row-fluid">
                <div class="span4">ชื่อ - สกุล</div>
                <div class="span8">
                    <input name="name" type="text" id="name" class="input-block-level" value=""/>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span4">ประเภทพนักงาน</div>
                <div class="span8">
                    <select name="employer_level_id" id="employer_level_id" class="input-block-level">
                        <option value="0"></option>
                        <option value="1">1. job holder</option>
                        <option value="2">2. writer</option>
                        <option value="3">3. writer freelance</option>
                        <option value="4">4. researcher</option>
                        <option value="5">5. key account manager</option>
                        <option value="6">6. responsibility</option>
                        <option value="7">7. manager</option>
                        <option value="8">8. admin</option>
                    </select>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span4">เบอร์ติดต่อ</div>
                <div class="span8">
                    <input name="phone_number" type="text" id="phone_number" class="input-block-level" value=""/>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span4">ที่อยู่</div>
                <div class="span8">
                    <textarea name="address" id="address" class="input-block-level" rows="10"></textarea>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span4">username</div>
                <div class="span8">
                    <input name="username" type="text" id="username" class="input-block-level" value=""/>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span4">password</div>
                <div class="span8">
                    <input name="password" type="text" id="password" class="input-block-level" value=""/>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span4">รายละเอียด</div>
                <div class="span8">
                    <textarea name="description" id="description" class="input-block-level" rows="10"></textarea>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span4">email</div>
                <div class="span8">
                    <input name="email" type="text" id="email" class="input-block-level" value=""/>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12" align="right">
                    <!--                    <button class="btn btn-warning" id="buttonCancel">cancel</button>-->
                    <button class="btn btn-primary" id="buttonSave">add</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- /block -->