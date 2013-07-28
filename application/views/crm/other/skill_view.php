<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 28/7/2556
 * Time: 18:51 น.
 * To change this template use File | Settings | File Templates.
 */

$baseUrl = base_url();
$urlListData = $webUrl . "crm/skillList";
$this->load->view("crm/header");
?>
    <script>
        var url_list_data = "<?php echo $urlListData; ?>";
        var url_add_data = "<?php echo $webUrl; ?>crm/skillNew";
        $(document).ready(function () {
            innerHtml("#content", url_list_data);
        });

        function validateFrom(frm) {
            if (frm.name.value == "") {
                alert("กรุณากรอก ชื่อ");
                frm.name.focus();
                return false;
            }
            else if (frm.job_group_id.value == "0") {
                alert("กรุณาเลือก กลุ่มงาน");
                frm.job_group_id.focus();
                return false;
            } else {
                return true;
            }
        }
    </script>
    <div class="span9" id="content">
    </div>
<?php
$this->load->view("crm/footer");