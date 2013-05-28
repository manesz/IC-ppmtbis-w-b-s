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
    private $webUrl = "";
    private $listJobMenu = array();

    function __construct()
    {
        parent::__construct();
//        $this->webUrl = base_url();
//        $this->webUrl .= strstr($_SERVER['HTTP_HOST'], 'localhost') > -1 ? 'index.php/' : base_url();
        if (strstr($_SERVER['HTTP_HOST'], 'localhost') > -1) {
            $this->webUrl .= base_url() . 'index.php/';
        } else {
            $this->webUrl = base_url();
        }

        //load list job menu

    }

    function index()
    {
//        redirect($this->webUrl . "website");
        $message = "";
        $strSelectBar = 'home';
        $data = array(
            "webUrl" => $this->webUrl,
            "message" => $message,
            "selectBar" => $strSelectBar
        );
        $this->load->view("website/index", $data);
    }

    function contactus()
    {
        $message = "";

        $this->load->model('CPanel_model');
        $arrData = $this->CPanel_model->site_configList(1);
        $strSelectBar = 'contactus';
        $data = array(
            "webUrl" => $this->webUrl,
            "message" => $message,
            "arrData" => $arrData[0],
            "selectBar" => $strSelectBar
        );
        $this->load->view("website/contactus", $data);
    }

    function our_service()
    {
        $message = "";
        $strSelectBar = 'our_service';
        $data = array(
            "webUrl" => $this->webUrl,
            "message" => $message,
            "selectBar" => $strSelectBar
        );
        $this->load->view("website/our-service", $data);
    }

    function about_us()
    {
        $message = "";
        $strSelectBar = 'about_us';
        $data = array(
            "webUrl" => $this->webUrl,
            "message" => $message,
            "selectBar" => $strSelectBar
        );
        $this->load->view("website/single", $data);
    }
}