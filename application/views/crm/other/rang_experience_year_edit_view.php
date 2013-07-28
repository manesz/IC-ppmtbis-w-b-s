<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 28/7/2556
 * Time: 18:53 น.
 * To change this template use File | Settings | File Templates.
 */

$baseUrl = base_url();
extract((array)$arrData);
?>

<script>
    var url_edit_data = "<?php echo $webUrl; ?>crm/rangExperienceYearEdit/<?php echo $id; ?>";
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
    <div class="muted pull-left">Rang Experience Year Edit</div>
    <!--            <div class="pull-right"><span class="badge badge-info">1,234</span></div>-->
</div>
<div class="block-content collapse in">
    <form id="formPost" name="formPost" method="post" action="">
        <input type="hidden" name="typeFrm" id="typeFrm" value="edit">
        <div class="row-fluid">
            <div class="span4">ช่วงเงินเดือน</div>
            <div class="span8">
                <input name="rang" type="text" id="rang" class="input-block-level" value="<?php echo $rang; ?>"/>
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
            <div class="span12" align="right">
                <button class="btn btn-warning" id="buttonCancel">cancel</button>
                <button class="btn btn-primary" id="buttonSave">save</button>
            </div>
        </div>
    </form>
</div>