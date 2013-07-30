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
        $this->load->view("crm/client/client_view", $data);
    }

    function clientList()
    {
        $arrClient = $this->CRM_model->getListClient();

        $arrCompanyType = $this->CRM_model->getListCompanyType();

        $data = array(
            'arrClientList' => $arrClient,
            'company_type' => $arrCompanyType,
            "webUrl" => $this->webUrl,
            'message' => ""
        );
        $this->load->view('crm/client/client_list_view', $data);
    }

    function clientNew()
    {
        $arrCompanyType = $this->CRM_model->getListCompanyType();

        $post = $this->input->post();
        if ($post) {//var_dump($this->session);exit();
            $result = $this->CRM_model->clientNew($post);
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
        $this->load->view('crm/client/client_new_view', $data);
    }

    function clientEdit($id)
    {
        $message = "";
        $post = $this->input->post();
        if ($post) {
            $result = $this->CRM_model->clientEdit($id, $post);
            if ($result) {
                echo "edit success";
            } else {
                echo "edit fail";
            }
            exit();
        }
        $arrClient = $this->CRM_model->getListClient($id);

        $arrCompanyType = $this->CRM_model->getListCompanyType();

        $arrFileName = $this->Upload_model->getFileFromFolder("company", $id);
        $data = array(
            'arrData' => $arrClient[0],
            'company_type' => $arrCompanyType,
            "webUrl" => $this->webUrl,
            'message' => $message,
            "arrFileName" => $arrFileName
        );
        $this->load->view('crm/client/client_edit_view', $data);
    }

    function clientDelete($id)
    {
        $result = $this->CRM_model->setPublish($id, 'crm_company');
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
            $result = $this->CRM_model->clientUpdatePathImage($id, $path);
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
        $this->load->view("crm/job/job_view", $data);
    }

    function jobList()
    {
        $arrjob = $this->CRM_model->getListjob();

        $arrCompanyType = $this->CRM_model->getListCompanyType();

        $data = array(
            'arrjobList' => $arrjob,
            'company_type' => $arrCompanyType,
            "webUrl" => $this->webUrl,
            'message' => ""
        );
        $this->load->view('crm/job/job_list_view', $data);
    }

    function jobNew()
    {
        $arrCompanyType = $this->CRM_model->getListCompanyType();

        $post = $this->input->post();
        if ($post) {
            $result = $this->CRM_model->jobNew($post);
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
        $this->load->view('crm/job/job_new_view', $data);
    }

    function jobEdit($id)
    {
        $message = "";
        $post = $this->input->post();
        if ($post) {
            $result = $this->CRM_model->jobEdit($id, $post);
            if ($result) {
                echo "edit success";
            } else {
                echo "edit fail";
            }
            exit();
        }
        $arrjob = $this->CRM_model->getListjob($id);

        $arrCompanyType = $this->CRM_model->getListCompanyType();

        $arrFileName = $this->Upload_model->getFileFromFolder("company", $id);
        $data = array(
            'arrData' => $arrjob[0],
            'company_type' => $arrCompanyType,
            "webUrl" => $this->webUrl,
            'message' => $message,
            "arrFileName" => $arrFileName
        );
        $this->load->view('crm/job/job_edit_view', $data);
    }

    function jobDelete($id)
    {
        $result = $this->CRM_model->setPublish($id, 'crm_company');
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
            $result = $this->CRM_model->jobUpdatePathImage($id, $path);
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
            $result = $this->Upload_model->deleteFile("company", $id, $fileName);
            if ($result){
                echo "delete file finish";
            } else {
                echo "delete file fail";
            }
        }
        exit();
    }

    //-----------------------------------Other Data Employee------------------------------------------//

    function employee()
    {
        $message = "";
        $strSelectBar = "employee";

        $data = array(
            "webUrl" => $this->webUrl,
            "message" => $message,
            "selectBar" => $strSelectBar
        );
        $this->load->view("crm/other/employee_view", $data);
    }

    function employeeList()
    {
        $arrData = $this->CRM_model->employeeList();

        $data = array(
            'arrData' => $arrData,
            "webUrl" => $this->webUrl,
            'message' => ""
        );
        $this->load->view('crm/other/employee_list_view', $data);
    }

    function employeeNew()
    {
        $post = $this->input->post();
        if ($post) {
            $result = $this->CRM_model->employeeNew($post);
            if ($result){
                echo $result;
            } else {
                echo 'add fail';
            }
            exit();
        }
        $data = array(
            "webUrl" => $this->webUrl,
            'message' => ""
        );
        $this->load->view('crm/other/employee_new_view', $data);
    }

    function employeeEdit($id)
    {
        $message = "";
        $post = $this->input->post();
        if ($post) {
            $result = $this->CRM_model->employeeEdit($id, $post);
            if ($result) {
                echo "edit success";
            } else {
                echo "edit fail";
            }
            exit();
        }
        $arrData = $this->CRM_model->employeeList($id);
        $data = array(
            'arrData' => $arrData[0],
            "webUrl" => $this->webUrl,
            'message' => $message,
        );
        $this->load->view('crm/other/employee_edit_view', $data);
    }

    function employeeDelete($id)
    {
        $result = $this->CRM_model->setPublish($id, 'crm_employee');
        if ($result) {
            echo "delete success";
        } else {
            echo "delete fail";
        }
        exit();
    }

    //-----------------------------------Other Data Business Type------------------------------------------//

    function businessType()
    {
        $message = "";
        $strSelectBar = "business_type";

        $data = array(
            "webUrl" => $this->webUrl,
            "message" => $message,
            "selectBar" => $strSelectBar
        );
        $this->load->view("crm/other/business_type_view", $data);
    }

    function businessTypeList()
    {
        $arrData = $this->CRM_model->businessTypeList();

        $data = array(
            'arrData' => $arrData,
            "webUrl" => $this->webUrl,
            'message' => ""
        );
        $this->load->view('crm/other/business_type_list_view', $data);
    }

    function businessTypeNew()
    {
        $post = $this->input->post();
        if ($post) {
            $result = $this->CRM_model->businessTypeNew($post);
            if ($result){
                echo $result;
            } else {
                echo 'add fail';
            }
            exit();
        }
        $data = array(
            "webUrl" => $this->webUrl,
            'message' => ""
        );
        $this->load->view('crm/other/business_type_new_view', $data);
    }

    function businessTypeEdit($id)
    {
        $message = "";
        $post = $this->input->post();
        if ($post) {
            $result = $this->CRM_model->businessTypeEdit($id, $post);
            if ($result) {
                echo "edit success";
            } else {
                echo "edit fail";
            }
            exit();
        }
        $arrData = $this->CRM_model->businessTypeList($id);
        $data = array(
            'arrData' => $arrData[0],
            "webUrl" => $this->webUrl,
            'message' => $message,
        );
        $this->load->view('crm/other/business_type_edit_view', $data);
    }

    function businessTypeDelete($id)
    {
        $data = array(
            'publish' => 0
        );
        $result = $this->db->update('crm_business_type', $data, array('int' => $id));
        //$result = $this->CRM_model->setPublish($id, 'crm_business_type');
        if ($result) {
            echo "delete success";
        } else {
            echo "delete fail";
        }
        exit();
    }

    //-----------------------------------Other Data Job Group------------------------------------------//

    function jobGroup()
    {
        $message = "";
        $strSelectBar = "job_group";

        $data = array(
            "webUrl" => $this->webUrl,
            "message" => $message,
            "selectBar" => $strSelectBar
        );
        $this->load->view("crm/other/job_group_view", $data);
    }

    function jobGroupList()
    {
        $arrData = $this->CRM_model->jobGroupList();

        $data = array(
            'arrData' => $arrData,
            "webUrl" => $this->webUrl,
            'message' => ""
        );
        $this->load->view('crm/other/job_group_list_view', $data);
    }

    function jobGroupNew()
    {
        $post = $this->input->post();
        if ($post) {
            $result = $this->CRM_model->jobGroupNew($post);
            if ($result){
                echo $result;
            } else {
                echo 'add fail';
            }
            exit();
        }
        $data = array(
            "webUrl" => $this->webUrl,
            'message' => ""
        );
        $this->load->view('crm/other/job_group_new_view', $data);
    }

    function jobGroupEdit($id)
    {
        $message = "";
        $post = $this->input->post();
        if ($post) {
            $result = $this->CRM_model->jobGroupEdit($id, $post);
            if ($result) {
                echo "edit success";
            } else {
                echo "edit fail";
            }
            exit();
        }
        $arrData = $this->CRM_model->jobGroupList($id);
        $data = array(
            'arrData' => $arrData[0],
            "webUrl" => $this->webUrl,
            'message' => $message,
        );
        $this->load->view('crm/other/job_group_edit_view', $data);
    }

    function jobGroupDelete($id)
    {
        $result = $this->CRM_model->setPublish($id, 'crm_job_group');
        if ($result) {
            echo "delete success";
        } else {
            echo "delete fail";
        }
        exit();
    }

    //-----------------------------------Other Data Position------------------------------------------//

    function position()
    {
        $message = "";
        $strSelectBar = "position";

        $data = array(
            "webUrl" => $this->webUrl,
            "message" => $message,
            "selectBar" => $strSelectBar
        );
        $this->load->view("crm/other/position_view", $data);
    }

    function positionList()
    {
        $arrData = $this->CRM_model->positionList();

        $data = array(
            'arrData' => $arrData,
            "webUrl" => $this->webUrl,
            'message' => ""
        );
        $this->load->view('crm/other/position_list_view', $data);
    }

    function positionNew()
    {
        $post = $this->input->post();
        if ($post) {
            $result = $this->CRM_model->positionNew($post);
            if ($result){
                echo $result;
            } else {
                echo 'add fail';
            }
            exit();
        }
        $arrJobGroup = $this->CRM_model->jobGroupList();
        $data = array(
            "webUrl" => $this->webUrl,
            "arrJobGroup" => $arrJobGroup,
            'message' => ""
        );
        $this->load->view('crm/other/position_new_view', $data);
    }

    function positionEdit($id)
    {
        $message = "";
        $post = $this->input->post();
        if ($post) {
            $result = $this->CRM_model->positionEdit($id, $post);
            if ($result) {
                echo "edit success";
            } else {
                echo "edit fail";
            }
            exit();
        }
        $arrData = $this->CRM_model->positionList($id);
        $arrJobGroup = $this->CRM_model->jobGroupList();
        $data = array(
            'arrData' => $arrData[0],
            "webUrl" => $this->webUrl,
            "arrJobGroup" => $arrJobGroup,
            'message' => $message,
        );
        $this->load->view('crm/other/position_edit_view', $data);
    }

    function positionDelete($id)
    {
        $data = array(
            'publish' => 0
        );
        $result = $this->db->update('crm_position', $data, array('int' => $id));
        //$result = $this->CRM_model->setPublish($id, 'crm_position');
        if ($result) {
            echo "delete success";
        } else {
            echo "delete fail";
        }
        exit();
    }

    //-----------------------------------Other Data Institute------------------------------------------//

    function institute()
    {
        $message = "";
        $strSelectBar = "institute";

        $data = array(
            "webUrl" => $this->webUrl,
            "message" => $message,
            "selectBar" => $strSelectBar
        );
        $this->load->view("crm/other/institute_view", $data);
    }

    function instituteList()
    {
        $arrData = $this->CRM_model->instituteList();

        $data = array(
            'arrData' => $arrData,
            "webUrl" => $this->webUrl,
            'message' => ""
        );
        $this->load->view('crm/other/institute_list_view', $data);
    }

    function instituteNew()
    {
        $post = $this->input->post();
        if ($post) {
            $result = $this->CRM_model->instituteNew($post);
            if ($result){
                echo $result;
            } else {
                echo 'add fail';
            }
            exit();
        }
        $data = array(
            "webUrl" => $this->webUrl,
            'message' => ""
        );
        $this->load->view('crm/other/institute_new_view', $data);
    }

    function instituteEdit($id)
    {
        $message = "";
        $post = $this->input->post();
        if ($post) {
            $result = $this->CRM_model->instituteEdit($id, $post);
            if ($result) {
                echo "edit success";
            } else {
                echo "edit fail";
            }
            exit();
        }
        $arrData = $this->CRM_model->instituteList($id);
        $data = array(
            'arrData' => $arrData[0],
            "webUrl" => $this->webUrl,
            'message' => $message,
        );
        $this->load->view('crm/other/institute_edit_view', $data);
    }

    function instituteDelete($id)
    {
        $result = $this->CRM_model->setPublish($id, 'crm_institute');
        if ($result) {
            echo "delete success";
        } else {
            echo "delete fail";
        }
        exit();
    }

    //-----------------------------------Other Data Education Level------------------------------------------//

    function educationLevel()
    {
        $message = "";
        $strSelectBar = "education_level";

        $data = array(
            "webUrl" => $this->webUrl,
            "message" => $message,
            "selectBar" => $strSelectBar
        );
        $this->load->view("crm/other/education_level_view", $data);
    }

    function educationLevelList()
    {
        $arrData = $this->CRM_model->educationLevelList();

        $data = array(
            'arrData' => $arrData,
            "webUrl" => $this->webUrl,
            'message' => ""
        );
        $this->load->view('crm/other/education_level_list_view', $data);
    }

    function educationLevelNew()
    {
        $post = $this->input->post();
        if ($post) {
            $result = $this->CRM_model->educationLevelNew($post);
            if ($result){
                echo $result;
            } else {
                echo 'add fail';
            }
            exit();
        }
        $data = array(
            "webUrl" => $this->webUrl,
            'message' => ""
        );
        $this->load->view('crm/other/education_level_new_view', $data);
    }

    function educationLevelEdit($id)
    {
        $message = "";
        $post = $this->input->post();
        if ($post) {
            $result = $this->CRM_model->educationLevelEdit($id, $post);
            if ($result) {
                echo "edit success";
            } else {
                echo "edit fail";
            }
            exit();
        }
        $arrData = $this->CRM_model->educationLevelList($id);
        $data = array(
            'arrData' => $arrData[0],
            "webUrl" => $this->webUrl,
            'message' => $message,
        );
        $this->load->view('crm/other/education_level_edit_view', $data);
    }

    function educationLevelDelete($id)
    {
        $data = array(
            'publish' => 0
        );
        $result = $this->db->update('crm_education_level', $data, array('int' => $id));
        //$result = $this->CRM_model->setPublish($id, 'crm_education_level');
        if ($result) {
            echo "delete success";
        } else {
            echo "delete fail";
        }
        exit();
    }

    //-----------------------------------Other Data Major------------------------------------------//

    function major()
    {
        $message = "";
        $strSelectBar = "major";

        $data = array(
            "webUrl" => $this->webUrl,
            "message" => $message,
            "selectBar" => $strSelectBar
        );
        $this->load->view("crm/other/major_view", $data);
    }

    function majorList()
    {
        $arrData = $this->CRM_model->majorList();

        $data = array(
            'arrData' => $arrData,
            "webUrl" => $this->webUrl,
            'message' => ""
        );
        $this->load->view('crm/other/major_list_view', $data);
    }

    function majorNew()
    {
        $post = $this->input->post();
        if ($post) {
            $result = $this->CRM_model->majorNew($post);
            if ($result){
                echo $result;
            } else {
                echo 'add fail';
            }
            exit();
        }
        $arrInstitute = $this->CRM_model->instituteList();
        $data = array(
            "webUrl" => $this->webUrl,
            "arrInstitute" => $arrInstitute,
            'message' => ""
        );
        $this->load->view('crm/other/major_new_view', $data);
    }

    function majorEdit($id)
    {
        $message = "";
        $post = $this->input->post();
        if ($post) {
            $result = $this->CRM_model->majorEdit($id, $post);
            if ($result) {
                echo "edit success";
            } else {
                echo "edit fail";
            }
            exit();
        }
        $arrData = $this->CRM_model->majorList($id);
        $arrInstitute = $this->CRM_model->instituteList();
        $data = array(
            'arrData' => $arrData[0],
            "webUrl" => $this->webUrl,
            "arrInstitute" => $arrInstitute,
            'message' => $message,
        );
        $this->load->view('crm/other/major_edit_view', $data);
    }

    function majorDelete($id)
    {
        $result = $this->CRM_model->setPublish($id, 'crm_major');
        if ($result) {
            echo "delete success";
        } else {
            echo "delete fail";
        }
        exit();
    }

    //-----------------------------------Other Data Skill------------------------------------------//

    function skill()
    {
        $message = "";
        $strSelectBar = "skill";

        $data = array(
            "webUrl" => $this->webUrl,
            "message" => $message,
            "selectBar" => $strSelectBar
        );
        $this->load->view("crm/other/skill_view", $data);
    }

    function skillList()
    {
        $arrData = $this->CRM_model->skillList();

        $data = array(
            'arrData' => $arrData,
            "webUrl" => $this->webUrl,
            'message' => ""
        );
        $this->load->view('crm/other/skill_list_view', $data);
    }

    function skillNew()
    {
        $post = $this->input->post();
        if ($post) {
            $result = $this->CRM_model->skillNew($post);
            if ($result){
                echo $result;
            } else {
                echo 'add fail';
            }
            exit();
        }
        $arrJobGroup = $this->CRM_model->jobGroupList();
        $data = array(
            "webUrl" => $this->webUrl,
            "arrJobGroup" => $arrJobGroup,
            'message' => ""
        );
        $this->load->view('crm/other/skill_new_view', $data);
    }

    function skillEdit($id)
    {
        $message = "";
        $post = $this->input->post();
        if ($post) {
            $result = $this->CRM_model->skillEdit($id, $post);
            if ($result) {
                echo "edit success";
            } else {
                echo "edit fail";
            }
            exit();
        }
        $arrData = $this->CRM_model->skillList($id);
        $arrJobGroup = $this->CRM_model->jobGroupList();
        $data = array(
            'arrData' => $arrData[0],
            "webUrl" => $this->webUrl,
            "arrJobGroup" => $arrJobGroup,
            'message' => $message,
        );
        $this->load->view('crm/other/skill_edit_view', $data);
    }

    function skillDelete($id)
    {
        $result = $this->CRM_model->setPublish($id, 'crm_skill');
        if ($result) {
            echo "delete success";
        } else {
            echo "delete fail";
        }
        exit();
    }

    //-----------------------------------Other Data Rang Salary------------------------------------------//

    function rangSalary()
    {
        $message = "";
        $strSelectBar = "rang_salary";

        $data = array(
            "webUrl" => $this->webUrl,
            "message" => $message,
            "selectBar" => $strSelectBar
        );
        $this->load->view("crm/other/rang_salary_view", $data);
    }

    function rangSalaryList()
    {
        $arrData = $this->CRM_model->rangSalaryList();

        $data = array(
            'arrData' => $arrData,
            "webUrl" => $this->webUrl,
            'message' => ""
        );
        $this->load->view('crm/other/rang_salary_list_view', $data);
    }

    function rangSalaryNew()
    {
        $post = $this->input->post();
        if ($post) {
            $result = $this->CRM_model->rangSalaryNew($post);
            if ($result){
                echo $result;
            } else {
                echo 'add fail';
            }
            exit();
        }
        $data = array(
            "webUrl" => $this->webUrl,
            'message' => ""
        );
        $this->load->view('crm/other/rang_salary_new_view', $data);
    }

    function rangSalaryEdit($id)
    {
        $message = "";
        $post = $this->input->post();
        if ($post) {
            $result = $this->CRM_model->rangSalaryEdit($id, $post);
            if ($result) {
                echo "edit success";
            } else {
                echo "edit fail";
            }
            exit();
        }
        $arrData = $this->CRM_model->rangSalaryList($id);
        $data = array(
            'arrData' => $arrData[0],
            "webUrl" => $this->webUrl,
            'message' => $message,
        );
        $this->load->view('crm/other/rang_salary_edit_view', $data);
    }

    function rangSalaryDelete($id)
    {
        $result = $this->CRM_model->setPublish($id, 'crm_rang_salary');
        if ($result) {
            echo "delete success";
        } else {
            echo "delete fail";
        }
        exit();
    }

    //-----------------------------------Other Data Rang Experience Year------------------------------------------//

    function rangExperienceYear()
    {
        $message = "";
        $strSelectBar = "rang_experience_year";

        $data = array(
            "webUrl" => $this->webUrl,
            "message" => $message,
            "selectBar" => $strSelectBar
        );
        $this->load->view("crm/other/rang_experience_year_view", $data);
    }

    function rangExperienceYearList()
    {
        $arrData = $this->CRM_model->rangExperienceYearList();

        $data = array(
            'arrData' => $arrData,
            "webUrl" => $this->webUrl,
            'message' => ""
        );
        $this->load->view('crm/other/rang_experience_year_list_view', $data);
    }

    function rangExperienceYearNew()
    {
        $post = $this->input->post();
        if ($post) {
            $result = $this->CRM_model->rangExperienceYearNew($post);
            if ($result){
                echo $result;
            } else {
                echo 'add fail';
            }
            exit();
        }
        $data = array(
            "webUrl" => $this->webUrl,
            'message' => ""
        );
        $this->load->view('crm/other/rang_experience_year_new_view', $data);
    }

    function rangExperienceYearEdit($id)
    {
        $message = "";
        $post = $this->input->post();
        if ($post) {
            $result = $this->CRM_model->rangExperienceYearEdit($id, $post);
            if ($result) {
                echo "edit success";
            } else {
                echo "edit fail";
            }
            exit();
        }
        $arrData = $this->CRM_model->rangExperienceYearList($id);
        $data = array(
            'arrData' => $arrData[0],
            "webUrl" => $this->webUrl,
            'message' => $message,
        );
        $this->load->view('crm/other/rang_experience_year_edit_view', $data);
    }

    function rangExperienceYearDelete($id)
    {
        $result = $this->CRM_model->setPublish($id, 'crm_rang_experience_year');
        if ($result) {
            echo "delete success";
        } else {
            echo "delete fail";
        }
        exit();
    }

    //-----------------------------------Other Data Log------------------------------------------//

    function log()
    {
        $message = "";
        $strSelectBar = "log";

        $data = array(
            "webUrl" => $this->webUrl,
            "message" => $message,
            "selectBar" => $strSelectBar
        );
        $this->load->view("crm/other/log_view", $data);
    }

    function logList()
    {
        $arrData = $this->CRM_model->logList();

        $data = array(
            'arrData' => $arrData,
            "webUrl" => $this->webUrl,
            'message' => ""
        );
        $this->load->view('crm/other/log_list_view', $data);
    }

    function logNew()
    {
        $post = $this->input->post();
        if ($post) {
            $result = $this->CRM_model->logNew($post);
            if ($result){
                echo $result;
            } else {
                echo 'add fail';
            }
            exit();
        }
        $data = array(
            "webUrl" => $this->webUrl,
            'message' => ""
        );
        $this->load->view('crm/other/log_new_view', $data);
    }

    function logDelete($id)
    {
        $result = $this->CRM_model->setPublish($id, 'crm_log');
        if ($result) {
            echo "delete success";
        } else {
            echo "delete fail";
        }
        exit();
    }

    //-----------------------------------Company Contact------------------------------------------//

    /*function companyContact()
    {
        $message = "";
        $strSelectBar = "companyContact";

        $data = array(
            "webUrl" => $this->webUrl,
            "message" => $message,
            "selectBar" => $strSelectBar
        );
        $this->load->view("crm/client/company_contact_view", $data);
    }*/

    function companyContactList($company_id)
    {
        $arrData = $this->CRM_model->companyContactList($company_id);

        $data = array(
            'arrData' => $arrData,
            "webUrl" => $this->webUrl,
            'message' => "",
            'id' => $company_id
        );
        $this->load->view('crm/client/company_contact_list_view', $data);
    }

    function companyContactNew($company_id)
    {
        $post = $this->input->post();
        if ($post) {
            $result = $this->CRM_model->companyContactNew($post);
            if ($result){
                echo $result;
            } else {
                echo 'add fail';
            }
            exit();
        }
        $data = array(
            "webUrl" => $this->webUrl,
            'message' => "",
            'id' => $company_id,
        );
        $this->load->view('crm/client/company_contact_new_view', $data);
    }

    function companyContactEdit($id, $company_id)
    {
        $message = "";
        $post = $this->input->post();
        if ($post) {
            $result = $this->CRM_model->companyContactEdit($id, $post);
            if ($result) {
                echo "edit success";
            } else {
                echo "edit fail";
            }
            exit();
        }
        $arrData = $this->CRM_model->companyContactList($company_id, $id);
        $data = array(
            'arrData' => $arrData[0],
            "webUrl" => $this->webUrl,
            'message' => $message,
            'company_id' => $company_id
        );
        $this->load->view('crm/client/company_contact_edit_view', $data);
    }

    function companyContactDelete($id)
    {
        $result = $this->CRM_model->setPublish($id, 'crm_map_company_contact');
        if ($result) {
            echo "delete success";
        } else {
            echo "delete fail";
        }
        exit();
    }

    //-----------------------------------Company History------------------------------------------//

    /*function companyHistory()
    {
        $message = "";
        $strSelectBar = "company_history";

        $data = array(
            "webUrl" => $this->webUrl,
            "message" => $message,
            "selectBar" => $strSelectBar
        );
        $this->load->view("crm/client/company_history_view", $data);
    }*/

    function companyHistoryList($company_id)
    {
        $arrData = $this->CRM_model->companyHistoryList($company_id);

        $data = array(
            'arrData' => $arrData,
            "webUrl" => $this->webUrl,
            'message' => "",
            'id' => $company_id
        );
        $this->load->view('crm/client/company_history_list_view', $data);
    }

    function companyHistoryNew($company_id)
    {
        $post = $this->input->post();
        if ($post) {
            $result = $this->CRM_model->companyHistoryNew($post);
            if ($result){
                echo $result;
            } else {
                echo 'add fail';
            }
            exit();
        }
        $data = array(
            "webUrl" => $this->webUrl,
            'message' => "",
            'id' => $company_id,
        );
        $this->load->view('crm/client/company_history_new_view', $data);
    }

    function companyHistoryEdit($id, $company_id)
    {
        $message = "";
        $post = $this->input->post();
        if ($post) {
            $result = $this->CRM_model->companyHistoryEdit($id, $post);
            if ($result) {
                echo "edit success";
            } else {
                echo "edit fail";
            }
            exit();
        }
        $arrData = $this->CRM_model->companyHistoryList($company_id, $id);
        $data = array(
            'arrData' => $arrData[0],
            "webUrl" => $this->webUrl,
            'message' => $message,
            'company_id' => $company_id
        );
        $this->load->view('crm/client/company_history_edit_view', $data);
    }

    function companyHistoryDelete($id)
    {
        $result = $this->CRM_model->setPublish($id, 'crm_company_history');
        if ($result) {
            echo "delete success";
        } else {
            echo "delete fail";
        }
        exit();
    }

}