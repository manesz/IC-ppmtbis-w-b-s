<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 28/7/2556
 * Time: 16:58 น.
 * To change this template use File | Settings | File Templates.
 */
$baseUrl = base_url();

?>
<script>
    $(document).ready(function () {
        $("#buttonSave").click(function () {
            if (validateFrom(document.getElementById('formPost'))) {
                $.post(url_add_data, $("#formPost").serialize(),
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
        <div class="muted pull-left">Job Group New</div>
        <!--            <div class="pull-right"><span class="badge badge-info">1,234</span></div>-->
    </div>
    <div class="block-content collapse in">
        <form id="formPost" name="formPost" method="post" action="">
            <input type="hidden" name="typeFrm" id="typeFrm" value="add">

            <div class="row-fluid">
                <div class="span4">ชื่อ</div>
                <div class="span8">
                    <input name="name" type="text" id="name" class="input-block-level" value=""/>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span4">รายละเอียด</div>
                <div class="span8">
                    <textarea name="description" id="description" class="input-block-level" rows="10"></textarea>
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