<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 28/7/2556
 * Time: 11:33 น.
 * To change this template use File | Settings | File Templates.
 */

$baseUrl = base_url();
$urlListData = $webUrl . "crm/employeeList";
$this->load->view("crm/header");
?>
    <script>
        var url_list_data = "<?php echo $urlListData; ?>";
        var url_add_data = "<?php echo $webUrl; ?>crm/employeeNew";
        $(document).ready(function () {
            innerHtml("#content", url_list_data);
        });

        function validateFrom(frm) {
            if (frm.name.value == "") {
                alert("กรุณากรอก ชื่อ - สกุล");
                frm.name.focus();
                return false;
            }
            else if (frm.employer_level_id.value == "0") {
                alert("กรุณาเลือก ประเภทพนักงาน");
                frm.employer_level_id.focus();
                return false;
            }
            else if (frm.phone_number.value == "") {
                alert("กรุณากรอก เบอร์ติดต่อ");
                frm.phone_number.focus();
                return false;
            }
            else if (frm.address.value == "") {
                alert("กรุณากรอก ที่อยู่");
                frm.address.focus();
                return false;
            }
            else if (frm.username.value == "") {
                alert("กรุณากรอก username");
                frm.username.focus();
                return false;
            }
            else if (frm.password.value == "" && frm.typeFrm.value == "add") {
                alert("กรุณากรอก password");
                frm.password.focus();
                return false;
            }
            else if (frm.email.value == "") {
                alert("กรุณากรอก email");
                frm.email.focus();
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