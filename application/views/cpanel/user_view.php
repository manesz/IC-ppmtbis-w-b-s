<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 24/5/2556
 * Time: 16:07 น.
 * To change this template use File | Settings | File Templates.
 */

$baseUrl = base_url();
$urlListData = $webUrl . "cpanel/userList";
$this->load->view("cpanel/header");
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
    <div class="row-fluid">
        <div class="span3" id="sidebar">
            <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                <li class="subMenuClick active">
                    <a class="page-click" href="<?php echo $urlListData; ?>"><i
                            class="icon-chevron-right"></i> User</a>
                </li>
                <!--                <li class="subMenuClick">-->
                <!--                    <a class="userClick" href="-->
                <?php //echo $webUrl; ?><!--cpanel/userNew">-->
                <!--                        <i class="icon-chevron-right"></i> New</a>-->
                <!--                </li>-->
            </ul>
        </div>
        <!--/span-->
        <div class="span9" id="content">

        </div>
    </div>


<?php
$this->load->view("cpanel/footer");