<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 18/5/2556
 * Time: 15:39 น.
 * To change this template use File | Settings | File Templates.
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function index()
    {
        $this->load->view('dashboard');
    }

}