<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 22/5/2556
 * Time: 21:01 น.
 * To change this template use File | Settings | File Templates.
 */

$baseUrl = base_url();

$this->load->view("header_backend_view");
?>
    <script>
        var slideList = "<?php echo $webUrl; ?>website/slideList";
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

            $(".slideClick").click(function(){
                innerHtml("#content", this.href)
            });

            innerHtml("#content", slideList)
        });
    </script>
    <div class="row-fluid">
        <div class="span3" id="sidebar">
            <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                <li class="subMenuClick active">
                    <a class="slideClick" href="<?php echo $webUrl; ?>website/slide"><i class="icon-chevron-right"></i> Navigator</a>
                </li>
                <li class="subMenuClick" >
                    <a class="slideClick" href="<?php echo $webUrl; ?>website/slideNew">
                        <i class="icon-chevron-right"></i> New</a>
                </li>
            </ul>
        </div>
        <!--/span-->
        <div class="span9" id="content">

        </div>
    </div>


<?php
$this->load->view("footer_backend_view");