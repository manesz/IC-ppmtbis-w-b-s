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
    <div class="row-fluid">
        <div class="span3" id="sidebar">
            <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                <li class="active">
                    <a href="index.html"><i class="icon-chevron-right"></i> Dashboard</a>
                </li>
                <li>
                    <a href="calendar.html"><i class="icon-chevron-right"></i> Calendar</a>
                </li>
                <li>
                    <a href="stats.html"><i class="icon-chevron-right"></i> Statistics</a>
                </li>
                <li>
                    <a href="buttons.html"><i class="icon-chevron-right"></i> Buttons & Icons</a>
                </li>
                <li>
                    <a href="interface.html"><i class="icon-chevron-right"></i> UI & Interface</a>
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
            <div class="row-fluid">
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h4>Success</h4>
                    The operation completed successfully
                </div>
                <div class="navbar">
                    <div class="navbar-inner">
                        <ul class="breadcrumb">
                            <i class="icon-chevron-left hide-sidebar"><a href='#' title="Hide Sidebar"
                                                                         rel='tooltip'>&nbsp;</a></i>
                            <i class="icon-chevron-right show-sidebar" style="display:none;"><a href='#'
                                                                                                title="Show Sidebar"
                                                                                                rel='tooltip'>
                                    &nbsp;</a></i>
                            <li>
                                <a href="#">Dashboard</a> <span class="divider">/</span>
                            </li>
                            <li>
                                <a href="#">Settings</a> <span class="divider">/</span>
                            </li>
                            <li class="active">Tools</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <!-- block -->
                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">Statistics</div>
                        <div class="pull-right"><span class="badge badge-warning">View More</span>

                        </div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span3">
                            <div class="chart" data-percent="73">73%</div>
                            <div class="chart-bottom-heading"><span class="label label-info">Visitors</span>

                            </div>
                        </div>
                        <div class="span3">
                            <div class="chart" data-percent="53">53%</div>
                            <div class="chart-bottom-heading"><span class="label label-info">Page Views</span>

                            </div>
                        </div>
                        <div class="span3">
                            <div class="chart" data-percent="83">83%</div>
                            <div class="chart-bottom-heading"><span class="label label-info">Users</span>

                            </div>
                        </div>
                        <div class="span3">
                            <div class="chart" data-percent="13">13%</div>
                            <div class="chart-bottom-heading"><span class="label label-info">Orders</span>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /block -->
            </div>
        </div>
    </div>


<?php
$this->load->view("footer_backend_view");