<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 6/5/2556
 * Time: 22:27 น.
 * To change this template use File | Settings | File Templates.
 */

$baseUrl = base_url();
$urlListData = $webUrl . "crm/clientList";
$this->load->view("crm/header");
?>
    <script>
        var url_list_data = "<?php echo $urlListData; ?>";
        $(document).ready(function () {
//            $(".subMenuClick").click(function () {
//                var nameActive = "subMenuClick active";
//                var nameNotActive = "subMenuClick";
//                $(".subMenuClick").each(function (id2, name2) {
//                    name2.className = nameNotActive;
//                });
//                this.className = nameActive;
//                return false;
//            });


            $(".page-click").click(function () {
                innerHtml("#content", this.href);
                return false;
            });

            innerHtml("#content", url_list_data)
        });

        function validateFrom(frm) {
            return true;
            if (frm.name.value == "") {
                alert("กรุณากรอก Name");
                frm.name.focus();
                return false;
            }
            else if (frm.description.value == "") {
                alert("กรุณากรอก Description");
                frm.description.focus();
                return false;
            }
            else if (frm.layer.value == "") {
                alert("กรุณากรอก Layer");
                frm.layer.focus();
                return false;
            }
            else if (frm.parent.value == "") {
                alert("กรุณากรอก Parent");
                frm.parent.focus();
                return false;
            }
            else if (frm.order.value == "") {
                alert("กรุณากรอก Order");
                frm.order.focus();
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