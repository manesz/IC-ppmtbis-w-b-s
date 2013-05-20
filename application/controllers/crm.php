<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 19/5/2556
 * Time: 9:09 น.
 * To change this template use File | Settings | File Templates.
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');

class CRM extends CI_Controller
{
    private $baseUrl = "";

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->baseUrl = base_url();
        $this->baseUrl .= strstr($_SERVER['HTTP_HOST'], 'localhost') > -1 ? 'index.php/' : base_url();
    }

    function index()
    {
        $this->login();
    }

    function login()
    {
        $post = $this->input->post();
        $message = "";
        if ($post) {
            $this->load->model('Auth_model');
            $resultLogin = $this->Auth_model->signIn($post);
            if ($resultLogin) {
                redirect($this->baseUrl . "crm/dashboard");
            } else {
                echo 'login fail';
            }
        }
        if (empty($this->session->userdata['username'])) {
            $this->load->view('crm/login_view', array('message' => $message));
        } else {
            redirect($this->baseUrl . "crm/dashboard");
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect($this->baseUrl . 'crm');
    }

    function dashboard()
    {
        $message = "";
        $data = array(
            "webUrl" => $this->baseUrl,
            "message" => $message
        );
        $this->load->view('crm/dashboard_view', $data);
    }

    function dashboardList()
    {
        $message = "";
        $data = array(
            "webUrl" => $this->baseUrl,
            "message" => $message
        );
        $this->load->view('crm/dashboard_list_view', $data);
    }

    function clientList()
    {
        $this->load->model('Client_model');
        $arrClient = $this->Client_model->getListClient();

        $this->load->model('Company_type_model');
        $arrCompanyType = $this->Company_type_model->getListCompanyType();

        $data = array(
            'arrClientList' => $arrClient,
            'company_type' => $arrCompanyType,
            "webUrl" => $this->baseUrl,
            'message' => ""
        );
        $this->load->view('crm/client_list_view', $data);
    }

    function clientNew()
    {
        $this->load->model('Company_type_model');
        $arrCompanyType = $this->Company_type_model->getListCompanyType();

        $post = $this->input->post();
        if ($post) {
            $this->load->model('Client_model');
            $result = $this->Client_model->clientNew($post);
            if ($result){
                echo $result;
            } else {
                echo 'add fail';
            }
            exit();
        }
        $data = array(
            'company_type' => $arrCompanyType,
            "webUrl" => $this->baseUrl,
            'message' => ""
        );
        $this->load->view('crm/client_new_view', $data);
    }

    function clientEdit($id)
    {
        $this->load->model('Client_model');
        $arrClient = $this->Client_model->getListClient();

        $this->load->model('Company_type_model');
        $arrCompanyType = $this->Company_type_model->getListCompanyType();

        $data = array(
            'arrClientList' => $arrClient,
            'company_type' => $arrCompanyType,
            "webUrl" => $this->baseUrl,
            'message' => ""
        );
        $this->load->view('crm/client_list_view', $data);
    }

}