<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 28/7/2556
 * Time: 18:46 น.
 * To change this template use File | Settings | File Templates.
 */

$baseUrl = base_url();
$urlListData = $webUrl . "crm/instituteList";
$this->load->view("crm/header");
?>
    <script>
        var url_list_data = "<?php echo $urlListData; ?>";
        var url_add_data = "<?php echo $webUrl; ?>crm/instituteNew";
        $(document).ready(function () {
            innerHtml("#content", url_list_data);
        });

        function validateFrom(frm) {
            if (frm.name_th.value == "") {
                alert("กรุณากรอก ชื่อภาษาไทย");
                frm.name_th.focus();
                return false;
            }
            else if (frm.name_en.value == "") {
                alert("กรุณากรอก ชื่อภาษาอังกฤษ");
                frm.name_en.focus();
                return false;
            }
            else if (frm.name_short.value == "") {
                alert("กรุณากรอก ชื่อย่อ");
                frm.name_short.focus();
                return false;
            }
            else {
                return true;
            }
        }
    </script>
    <div class="span9" id="content">
    </div>
<?php
$this->load->view("crm/footer");