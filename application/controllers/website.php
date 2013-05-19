<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 19/5/2556
 * Time: 9:09 น.
 * To change this template use File | Settings | File Templates.
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Website extends CI_Controller
{
    private $baseUrl = "";

    function __construct()
    {
        parent::__construct();
        $this->baseUrl = base_url();
        $this->baseUrl .= strstr($_SERVER['HTTP_HOST'], 'localhost') > -1 ? 'index.php/' : base_url();
    }

    function navigator()
    {
        $message = "";
        $data = array(
            "webUrl" => $this->baseUrl,
            "message" => $message
        );
        $this->load->view("website/navigator_view", $data);
    }

    function navigatorNew()
    {
        $message = "";
        $data = array(
            "webUrl" => $this->baseUrl,
            "message" => $message
        );
        $this->load->view("website/navigator_new_view", $data);
    }

    function navigatorList()
    {
        $message = "";
        $data = array(
            "webUrl" => $this->baseUrl,
            "message" => $message,
        );
        $this->load->view("website/navigator_list_view", $data);
    }
}