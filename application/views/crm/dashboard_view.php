<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 19/5/2556
 * Time: 10:14 น.
 * To change this template use File | Settings | File Templates.
 */

$baseUrl = base_url();

$this->load->view("header_backend_view");
?>

    <script>
        var dashboardList = "<?php echo $webUrl; ?>crm/dashboardList";
        $(document).ready(function(){
            $(".subMenuClick").click(function(){
                var nameActive = "subMenuClick active";
                var nameNotActive = "subMenuClick";
                $(".subMenuClick").each(function(id2, name2){
                    name2.className = nameNotActive;
                });
                this.className = nameActive;
                return false;
            });

            $(".linkSubMenu").click(function(){
                innerHtml("#content", this.href)
            });

            innerHtml("#content", dashboardList)
        });

        var strWait = "<div align='center'><img width='50' height='50' "
            + "src='<?php echo $baseUrl; ?>assets/img/loading.gif'/></div>"
        function innerHtml(id, href)
        {
            $(id).empty();
            $(id).html(strWait);
            $(id).load(href);
        }
    </script>
    <div class="row-fluid">
        <div class="span3" id="sidebar">
            <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                <li class="subMenuClick active">
                    <a class="linkSubMenu" href="<?php echo $webUrl; ?>crm/dashboardList"><i class="icon-chevron-right"></i> Dashboard</a>
                </li>
                <li class="subMenuClick">
                    <a class="linkSubMenu" href="<?php echo $webUrl; ?>crm/clientList"><i class="icon-chevron-right"></i>Client List</a>
                </li>
                <li class="subMenuClick">
                    <a href="#"><i class="icon-chevron-right"></i> Statistics</a>
                </li>
                <li>
                    <a href="#"><i class="icon-chevron-right"></i> Buttons & Icons</a>
                </li>
                <li>
                    <a href="#"><i class="icon-chevron-right"></i> UI & Interface</a>
                </li>
                <li>
                    <a href="#"><span class="badge badge-success pull-right">731</span> Orders</a>
                </li>
                <li>
                    <a href="#"><span class="badge badge-success pull-right">812</span> Invoices</a>
                </li>
                <li>
                    <a href="#"><span class="badge badge-info pull-right">27</span> Clients</a>
                </li>
                <li>
                    <a href="#"><span class="badge badge-info pull-right">1,234</span> Users</a>
                </li>
                <li>
                    <a href="#"><span class="badge badge-info pull-right">2,221</span> Messages</a>
                </li>
                <li>
                    <a href="#"><span class="badge badge-info pull-right">11</span> Reports</a>
                </li>
                <li>
                    <a href="#"><span class="badge badge-important pull-right">83</span> Errors</a>
                </li>
                <li>
                    <a href="#"><span class="badge badge-warning pull-right">4,231</span> Logs</a>
                </li>
            </ul>
        </div>
        <!--/span-->
        <div class="span9" id="content">

        </div>
    </div>


<?php
$this->load->view("footer_backend_view");