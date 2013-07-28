<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 28/7/2556
 * Time: 18:54 น.
 * To change this template use File | Settings | File Templates.
 */

$baseUrl = base_url();
extract((array)$arrData);
?>

<script>
    //var url_edit_data = "<?php echo $webUrl; ?>crm/logEdit/<?php echo $id; ?>";
//    $(document).ready(function () {
//        $("#buttonSave").click(function () {
//            if (validateFrom(document.getElementById('formPost'))) {
//                $.post(url_edit_data, $("#formPost").serialize(),
//                    function (result) {
//                        if (result == "edit fail") {
//                            alert('เกิดการผิดพลาด\n** กรุณาตรวจสอบ **');
//                        } else {
//                            alert(result);
//                            window.location.reload();
//                        }
//                    }
//                );
//            }
//            return false;
//        });

//        $("#buttonCancel").click(function () {
//            innerHtml("#add", url_add_data);
//            return false;
//        });
        ///$("#name").select();
    });
</script>
<div class="navbar navbar-inner block-header">
    <div class="muted pull-left">Log View</div>
    <!--            <div class="pull-right"><span class="badge badge-info">1,234</span></div>-->
</div>
<div class="block-content collapse in">
    <form id="formPost" name="formPost" method="post" action="">
        <input type="hidden" name="typeFrm" id="typeFrm" value="edit">
        <div class="row-fluid">
            <div class="span4">ตาราง</div>
            <div class="span8">
                <input name="table" type="text" id="table" class="input-block-level" value="<?php echo $table; ?>"/>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span4">คอลัมภ์</div>
            <div class="span8">
                <input name="field" type="text" id="field" class="input-block-level" value="<?php echo $field; ?>"/>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span4">ข้อมูลเก่า</div>
            <div class="span8">
                <input name="older_data" type="text" id="older_data" class="input-block-level" value="<?php echo $older_data; ?>"/>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span4">ข้อมูลใหม่</div>
            <div class="span8">
                <input name="new_data" type="text" id="new_data" class="input-block-level" value="<?php echo $new_data; ?>"/>
            </div>
        </div>
<!--        <div class="row-fluid">-->
<!--            <div class="span12" align="right">-->
<!--                <button class="btn btn-warning" id="buttonCancel">cancel</button>-->
<!--                <button class="btn btn-primary" id="buttonSave">save</button>-->
<!--            </div>-->
<!--        </div>-->
    </form>
</div>