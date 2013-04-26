<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Chukkapun
 * Date: 23/4/2556
 * Time: 23:21 น.
 * To change this template use File | Settings | File Templates.
 */


if (!defined('BASEPATH')) exit('No direct script access allowed');

class Client extends CI_Controller
{

    public function clientList()
    {

        $this->load->view('client/list');
    }
    public function clientNew()
    {

        $this->load->view('client/new');
    }
    public function clientEdit()
    {

        $this->load->view('client/edit');
    }

}