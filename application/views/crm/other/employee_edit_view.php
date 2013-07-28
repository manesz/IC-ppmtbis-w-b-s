<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 28/7/2556
 * Time: 11:34 น.
 * To change this template use File | Settings | File Templates.
 */

$baseUrl = base_url();
extract((array)$arrData);
?>

<script>
    var url_edit_data = "<?php echo $webUrl; ?>crm/employeeEdit/<?php echo $id; ?>";
    $(document).ready(function () {
        $("#buttonSave").click(function () {
            if (validateFrom(document.getElementById('formPost'))) {
                $.post(url_edit_data, $("#formPost").serialize(),
                    function (result) {
                        if (result == "edit fail") {
                            alert('เกิดการผิดพลาด\n** กรุณาตรวจสอบ **');
                        } else {
                            alert(result);
                            window.location.reload();
                        }
                    }
                );
            }
            return false;
        });

        $("#buttonCancel").click(function () {
            innerHtml("#add", url_add_data);

            return false;
        });
        $("#name").select();
    });
</script>
<div class="navbar navbar-inner block-header">
    <div class="muted pull-left">Employee Edit</div>
    <!--            <div class="pull-right"><span class="badge badge-info">1,234</span></div>-->
</div>
<div class="block-content collapse in">
    <form id="formPost" name="formPost" method="post" action="">
        <input type="hidden" name="typeFrm" id="typeFrm" value="edit">
        <input type="hidden" name="permission" id="permission" value="<?php echo $permission; ?>">
        <div class="row-fluid">
            <div class="span4">ชื่อ - สกุล</div>
            <div class="span8">
                <input name="name" type="text" id="name" class="input-block-level" value="<?php echo $name; ?>"/>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span4">ประเภทพนักงาน</div>
            <div class="span8">
                <select name="employer_level_id" id="employer_level_id" class="input-block-level">
                    <option value="0"></option>
                    <option <?php echo $employer_level_id == 1 ? 'selected' : ''; ?> value="1">1. job holder</option>
                    <option <?php echo $employer_level_id == 2 ? 'selected' : ''; ?> value="2">2. writer</option>
                    <option <?php echo $employer_level_id == 3 ? 'selected' : ''; ?> value="3">3. writer freelance</option>
                    <option <?php echo $employer_level_id == 4 ? 'selected' : ''; ?> value="4">4. researcher</option>
                    <option <?php echo $employer_level_id == 5 ? 'selected' : ''; ?> value="5">5. key account manager</option>
                    <option <?php echo $employer_level_id == 6 ? 'selected' : ''; ?> value="6">6. responsibility</option>
                    <option <?php echo $employer_level_id == 7 ? 'selected' : ''; ?> value="7">7. manager</option>
                    <option <?php echo $employer_level_id == 8 ? 'selected  ' : ''; ?> value="8">8. admin</option>
                </select>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span4">เบอร์ติดต่อ</div>
            <div class="span8">
                <input name="phone_number" type="text" id="phone_number" class="input-block-level"
                       value="<?php echo $phone_number; ?>"/>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span4">ที่อยู่</div>
            <div class="span8">
                <textarea name="address" id="address" class="input-block-level"
                          rows="10"><?php echo $address; ?></textarea>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span4">username</div>
            <div class="span8">
                <input name="username" type="text" id="username" disabled class="input-block-level"
                       value="<?php echo $username; ?>"/>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span4">password</div>
            <div class="span8">
                <input name="password" type="text" id="password" class="input-block-level"
                       value=""/>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span4">รายละเอียด</div>
            <div class="span8">
                <textarea name="description" id="description" class="input-block-level"
                          rows="10"><?php echo $description; ?></textarea>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span4">email</div>
            <div class="span8">
                <input name="email" type="text" id="email" class="input-block-level"
                       value="<?php echo $email; ?>"/>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12" align="right">
                <button class="btn btn-warning" id="buttonCancel">cancel</button>
                <button class="btn btn-primary" id="buttonSave">save</button>
            </div>
        </div>
    </form>
</div>