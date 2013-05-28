<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 19/5/2556
 * Time: 11:16 น.
 * To change this template use File | Settings | File Templates.
 */

$baseUrl = base_url();
?>
<script>
    var url_new_data = "<?php echo $webUrl; ?>cpanel/navigatorNew";
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

        $("#buttonCancel").click(function () {
            window.location = "<?php echo $webUrl; ?>cpanel/navigator";
            return false;
        });
    });

    function validateNum(evt) {
        var theEvent = evt || window.event;
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode( key );
        var regex = /[0-9]/;
        if( !regex.test(key) ) {
            theEvent.returnValue = false;
            if(theEvent.preventDefault)
                theEvent.preventDefault();
        }
    }

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
                <li>
                    <a href="<?php echo $webUrl; ?>cpanel/navigator">Navigator</a> <span class="divider">/</span>
                </li>
                <li class="active">New</li>
            </ul>
        </div>
    </div>
</div>
<div class="row-fluid" id="contentInner">
    <!-- block -->
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">Navigator New</div>
            <!--            <div class="pull-right"><span class="badge badge-info">1,234</span></div>-->
        </div>
        <div class="block-content collapse in">
            <form id="formPost" name="formPost" method="post" action="">
                <label>Name
                    <input name="name" type="text" id="name"/>
                </label>

                <p>
                    <label>Description
                        <textarea name="description" id="description"></textarea>
                    </label>
                </p>

                <p>
                    <label>Layer
                        <input maxlength="2" name="layer" type="text" id="layer"
                               onkeypress="return validateNum(event);" value="0"/>
                    </label>
                </p>

                <p>
                    <label>Parent
                        <input maxlength="2" name="parent" type="text" id="parent"
                               onkeypress="return validateNum(event);" value="0"/>
                    </label>
                </p>

                <p>
                    <label>Order
                        <input maxlength="2" name="order" type="text" id="order"
                               onkeypress="return validateNum(event);" value="0"/>
                    </label>
                </p>

                <div align="right">
                    <button class="btn btn-warning" id="buttonCancel">cancel</button>
                    <button class="btn btn-primary" id="buttonSave">save</button>
                </div>
            </form>
        </div>
    </div>
    <!-- /block -->
    <!--content inner-->
</div>