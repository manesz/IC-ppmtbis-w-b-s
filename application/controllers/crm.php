<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 19/5/2556
 * Time: 9:09 น.
 * To change this template use File | Settings | File Templates.
 */

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Crm extends CI_Controller
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
        redirect($this->webUrl . "crm/dashboard");
    }

    //-----------------------------------Login-Logout------------------------------------------//

    function login()
    {
        $post = $this->input->post();
        $message = "";
        if ($post) {
            $this->load->model('Auth_model');
            $resultLogin = $this->Auth_model->signIn($post);
            if ($resultLogin) {
                redirect($this->webUrl . "crm/dashboard");
            } else {
                echo 'login fail';
            }
        }
        if (empty($this->session->userdata['username'])) {
            $this->load->view('crm/login_view', array('message' => $message));
        } else {
            redirect($this->webUrl . "crm/dashboard");
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect($this->webUrl . "crm/login");
    }

    //-----------------------------------Dashboard------------------------------------------//

    function dashboard()
    {
        $message = "";
        $strSelectBar = 'dashboard';
        $data = array(
            "webUrl" => $this->webUrl,
            "message" => $message,
            "selectBar" => $strSelectBar
        );
        $this->load->view('crm/dashboard_view', $data);
    }

    function dashboardList()
    {
        $message = "";
        $data = array(
            "webUrl" => $this->webUrl,
            "message" => $message
        );
        $this->load->view('crm/dashboard_list_view', $data);
    }

    //-----------------------------------Client------------------------------------------//

    function client()
    {
        $message = "";
        $strSelectBar = "client";

        $data = array(
            "webUrl" => $this->webUrl,
            "message" => $message,
            "selectBar" => $strSelectBar
        );
        $this->load->view("crm/client_view", $data);
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
            "webUrl" => $this->webUrl,
            'message' => ""
        );
        $this->load->view('crm/client_list_view', $data);
    }

    function clientNew()
    {
        $this->load->model('Company_type_model');
        $arrCompanyType = $this->Company_type_model->getListCompanyType();

        $post = $this->input->post();
        if ($post) {//var_dump($this->session);exit();
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
            "webUrl" => $this->webUrl,
            'message' => ""
        );
        $this->load->view('crm/client_new_view', $data);
    }

    function clientEdit($id)
    {
        $message = "";
        $this->load->model('Client_model');
        $post = $this->input->post();
        if ($post) {
            $result = $this->Client_model->clientEdit($id, $post);
            if ($result) {
                echo "edit success";
            } else {
                echo "edit fail";
            }
            exit();
        }
        $arrClient = $this->Client_model->getListClient($id);

        $this->load->model('Company_type_model');
        $arrCompanyType = $this->Company_type_model->getListCompanyType();

        $this->load->model('Upload_model');
        $arrFileName = $this->Upload_model->getFileFromFolder("company", $id);
        $data = array(
            'arrData' => $arrClient[0],
            'company_type' => $arrCompanyType,
            "webUrl" => $this->webUrl,
            'message' => $message,
            "arrFileName" => $arrFileName
        );
        $this->load->view('crm/client_edit_view', $data);
    }

    function clientDelete($id)
    {
        $this->load->model('Client_model');
        $result = $this->Client_model->setPublish($id, 'crm_company');
        if ($result) {
            echo "delete success";
        } else {
            echo "delete fail";
        }
        exit();
    }

    function clientUpdateImagePath()
    {
        $post = $this->input->post();
        if ($post) {
            extract($post);
            $this->load->model('Client_model');
            $result = $this->Client_model->clientUpdatePathImage($id, $path);
            if ($result) {
                echo "update success";
            } else {
                echo "update fail";
            }
            exit();
        }
    }

    function clientDeleteFile()
    {
        $post = $this->input->post();
        if ($post) {
            extract($post);
            $this->load->model('Upload_model');
            $result = $this->Upload_model->deleteFile("company", $id, $fileName);
            if ($result){
                echo "delete file finish";
            } else {
                echo "delete file fail";
            }
        }
        exit();
    }

    //-----------------------------------Job------------------------------------------//
    function job()
    {
        $message = "";
        $strSelectBar = "job";

        $data = array(
            "webUrl" => $this->webUrl,
            "message" => $message,
            "selectBar" => $strSelectBar
        );
        $this->load->view("crm/job_view", $data);
    }

    function jobList()
    {
        $this->load->model('job_model');
        $arrjob = $this->job_model->getListjob();

        $this->load->model('Company_type_model');
        $arrCompanyType = $this->Company_type_model->getListCompanyType();

        $data = array(
            'arrjobList' => $arrjob,
            'company_type' => $arrCompanyType,
            "webUrl" => $this->webUrl,
            'message' => ""
        );
        $this->load->view('crm/job_list_view', $data);
    }

    function jobNew()
    {
        $this->load->model('Company_type_model');
        $arrCompanyType = $this->Company_type_model->getListCompanyType();

        $post = $this->input->post();
        if ($post) {//var_dump($this->session);exit();
            $this->load->model('job_model');
            $result = $this->job_model->jobNew($post);
            if ($result){
                echo $result;
            } else {
                echo 'add fail';
            }
            exit();
        }
        $data = array(
            'company_type' => $arrCompanyType,
            "webUrl" => $this->webUrl,
            'message' => ""
        );
        $this->load->view('crm/job_new_view', $data);
    }

    function jobEdit($id)
    {
        $message = "";
        $this->load->model('job_model');
        $post = $this->input->post();
        if ($post) {
            $result = $this->job_model->jobEdit($id, $post);
            if ($result) {
                echo "edit success";
            } else {
                echo "edit fail";
            }
            exit();
        }
        $arrjob = $this->job_model->getListjob($id);

        $this->load->model('Company_type_model');
        $arrCompanyType = $this->Company_type_model->getListCompanyType();

        $this->load->model('Upload_model');
        $arrFileName = $this->Upload_model->getFileFromFolder("company", $id);
        $data = array(
            'arrData' => $arrjob[0],
            'company_type' => $arrCompanyType,
            "webUrl" => $this->webUrl,
            'message' => $message,
            "arrFileName" => $arrFileName
        );
        $this->load->view('crm/job_edit_view', $data);
    }

    function jobDelete($id)
    {
        $this->load->model('job_model');
        $result = $this->job_model->setPublish($id, 'crm_company');
        if ($result) {
            echo "delete success";
        } else {
            echo "delete fail";
        }
        exit();
    }

    function jobUpdateImagePath()
    {
        $post = $this->input->post();
        if ($post) {
            extract($post);
            $this->load->model('job_model');
            $result = $this->job_model->jobUpdatePathImage($id, $path);
            if ($result) {
                echo "update success";
            } else {
                echo "update fail";
            }
            exit();
        }
    }

    function jobDeleteFile()
    {
        $post = $this->input->post();
        if ($post) {
            extract($post);
            $this->load->model('Upload_model');
            $result = $this->Upload_model->deleteFile("company", $id, $fileName);
            if ($result){
                echo "delete file finish";
            } else {
                echo "delete file fail";
            }
        }
        exit();
    }
}