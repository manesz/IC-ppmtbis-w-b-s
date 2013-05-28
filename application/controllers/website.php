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
    }

    function index()
    {
//        redirect($this->webUrl . "website");
        $this->load->view("website/index");
    }
}