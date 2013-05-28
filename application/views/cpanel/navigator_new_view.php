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
                <div class="row-fluid">
                    <div class="span4">Name</div>
                    <div class="span8"><input name="name" type="text" id="name" class="input-block-level" value=""/></div>
                </div>
                <div class="row-fluid">
                    <div class="span4">Description</div>
                    <div class="span8"><textarea name="description" id="description" class="input-block-level" rows="10"></textarea></div>
                </div>
                <div class="row-fluid">
                    <div class="span4">Layer</div>
                    <div class="span8"><input name="layer" type="text" id="layer" class="input-block-level" value=""/></div>
                </div>
                <div class="row-fluid">
                    <div class="span4">Parent</div>
                    <div class="span8"><input name="parent" type="text" id="parent" class="input-block-level" value=""/></div>
                </div>
                <div class="row-fluid">
                    <div class="span4">Order</div>
                    <div class="span8"><input name="order" type="text" id="order" class="input-block-level" value=""/></div>
                </div>
                <div class="row-fluid">
                    <div class="span12" align="right">
                        <button class="btn btn-warning" id="buttonCancel">cancel</button>
                        <button class="btn btn-primary" id="buttonSave">save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /block -->
    <!--content inner-->
</div>