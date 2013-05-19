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
    var navigatorList = "<?php echo $webUrl; ?>website/navigatorList";
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

        $(".navigatorClick").click(function(){
            innerHtml("#content", this.href)
        });

        innerHtml("#content", navigatorList)
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
                    <a class="navigatorClick" href="<?php echo $webUrl; ?>website/navigator"><i class="icon-chevron-right"></i> Navigator</a>
                </li>
                <li class="subMenuClick" >
                    <a class="navigatorClick" href="<?php echo $webUrl; ?>website/navigatorNew">
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