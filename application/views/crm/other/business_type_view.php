<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 28/7/2556
 * Time: 16:14 น.
 * To change this template use File | Settings | File Templates.
 */

$baseUrl = base_url();
$urlListData = $webUrl . "crm/businessTypeList";
$this->load->view("crm/header");
?>
    <script>
        var url_list_data = "<?php echo $urlListData; ?>";
        var url_add_data = "<?php echo $webUrl; ?>crm/businessTypeNew";
        $(document).ready(function () {
            innerHtml("#content", url_list_data);
        });

        function validateFrom(frm) {
            if (frm.name.value == "") {
                alert("กรุณากรอก ชื่อ");
                frm.name.focus();
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