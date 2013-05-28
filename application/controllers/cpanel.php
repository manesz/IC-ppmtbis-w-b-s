<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 19/5/2556
 * Time: 9:09 น.
 * To change this template use File | Settings | File Templates.
 */

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cpanel extends CI_Controller
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
        redirect($this->webUrl . "cpanel/dashboard");
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
                redirect($this->webUrl . "cpanel/dashboard");
            } else {
                echo 'login fail';
            }
        }
        if (empty($this->session->userdata['username'])) {
            $this->load->view('cpanel/login_view', array('message' => $message));
        } else {
            redirect($this->webUrl . "cpanel/dashboard");
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect($this->webUrl . "cpanel/login");
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
        $this->load->view('cpanel/dashboard_view', $data);
    }

    function dashboardList()
    {
        $message = "";
        $data = array(
            "webUrl" => $this->webUrl,
            "message" => $message
        );
        $this->load->view('cpanel/dashboard_list_view', $data);
    }

    //-----------------------------------Navigator------------------------------------------//

    function navigator()
    {
        $message = "";
        $strSelectBar = "navigator";

        $data = array(
            "webUrl" => $this->webUrl,
            "message" => $message,
            "selectBar" => $strSelectBar
        );
        $this->load->view("cpanel/navigator_view", $data);
    }

    function navigatorNew()
    {
        $message = "";

        $post = $this->input->post();
        if ($post) {
            $this->load->model('CPanel_model');
            $result = $this->CPanel_model->navigatorNew($post);
            if ($result) {
                echo $result;
            } else {
                echo "add fail";
            }
            exit();
        }
        $data = array(
            "webUrl" => $this->webUrl,
            "message" => $message
        );
        $this->load->view("cpanel/navigator_new_view", $data);
    }

    function navigatorEdit($id)
    {
        $message = "";

        $this->load->model('CPanel_model');
        $post = $this->input->post();
        if ($post) {
            $result = $this->CPanel_model->navigatorEdit($id, $post);
            if ($result) {
                echo "edit success";
            } else {
                echo "edit fail";
            }
            exit();
        }

        $arrNavigator = $this->CPanel_model->navigatorList($id);
        $data = array(
            "webUrl" => $this->webUrl,
            "arrData" => $arrNavigator[0],
            "message" => $message
        );
        $this->load->view("cpanel/navigator_edit_view", $data);
    }

    function navigatorDelete($id)
    {
        $this->load->model('CPanel_model');
        $result = $this->CPanel_model->setPublish($id, 'wb_navigator');
        if ($result) {
            echo "delete success";
        } else {
            echo "delete fail";
        }
        exit();
    }

    function navigatorList()
    {
        $message = "";
        $this->load->model('CPanel_model');
        $arrNavigator = $this->CPanel_model->navigatorList();
        $data = array(
            "webUrl" => $this->webUrl,
            "arrayData" => $arrNavigator,
            "message" => $message,
        );
        $this->load->view("cpanel/navigator_list_view", $data);
    }

    //-----------------------------------Slide------------------------------------------//

    function slide()
    {
        $message = "";
        $strSelectBar = 'slide';
        $data = array(
            "webUrl" => $this->webUrl,
            "message" => $message,
            "selectBar" => $strSelectBar
        );
        $this->load->view("cpanel/slide_view", $data);
    }

    function slideNew()
    {
        $message = "";

        $post = $this->input->post();
        if ($post) {
            $this->load->model('CPanel_model');
            $result = $this->CPanel_model->slideNew($post);
            if ($result) {
                echo $result;
            } else {
                echo "add fail";
            }
            exit();
        }
        $data = array(
            "webUrl" => $this->webUrl,
            "message" => $message
        );
        $this->load->view("cpanel/slide_new_view", $data);
    }

    function slideEdit($id)
    {
        $message = "";

        $this->load->model('CPanel_model');
        $post = $this->input->post();
        if ($post) {
            $result = $this->CPanel_model->slideEdit($id, $post);
            if ($result) {
                echo "edit success";
            } else {
                echo "edit fail";
            }
            exit();
        }

        $arrData = $this->CPanel_model->slideList($id);
        $data = array(
            "webUrl" => $this->webUrl,
            "arrData" => $arrData[0],
            "message" => $message
        );
        $this->load->view("cpanel/slide_edit_view", $data);
    }

    function slideDelete($id)
    {
        $this->load->model('CPanel_model');
        $result = $this->CPanel_model->setPublish($id, "wb_slide");
        if ($result) {
            echo "delete success";
        } else {
            echo "delete fail";
        }
        exit();
    }

    function slideList()
    {
        $message = "";
        $this->load->model('CPanel_model');
        $arrNavigator = $this->CPanel_model->slideList();
        $data = array(
            "webUrl" => $this->webUrl,
            "arrayData" => $arrNavigator,
            "message" => $message,
        );
        $this->load->view("cpanel/slide_list_view", $data);
    }

    function slideUpdateImageName()
    {
        $post = $this->input->post();
        if ($post) {
            extract($post);
            $this->load->model('CPanel_model');
            $result = $this->CPanel_model->updateImageName($id, $path, "wb_slide");
            if ($result) {
                echo "update success";
            } else {
                echo "update fail";
            }
            exit();
        }
    }

    //-----------------------------------Page------------------------------------------//

    function page()
    {
        $message = "";
        $strSelectBar = 'page';
        $data = array(
            "webUrl" => $this->webUrl,
            "message" => $message,
            "selectBar" => $strSelectBar
        );
        $this->load->view("cpanel/page_view", $data);
    }

    function pageNew()
    {
        $message = "";

        $this->load->model('CPanel_model');
        $post = $this->input->post();
        if ($post) {
            $result = $this->CPanel_model->pageNew($post);
            if ($result) {
                echo $result;
            } else {
                echo "add fail";
            }
            exit();
        }
        $arrType = $this->CPanel_model->getListType();
        $data = array(
            "webUrl" => $this->webUrl,
            "message" => $message,
            "arrType" => $arrType
        );
        $this->load->view("cpanel/page_new_view", $data);
    }

    function pageEdit($id)
    {
        $message = "";

        $this->load->model('CPanel_model');
        $post = $this->input->post();
        if ($post) {
            $result = $this->CPanel_model->pageEdit($id, $post);
            if ($result) {
                echo "edit success";
            } else {
                echo "edit fail";
            }
            exit();
        }

        $arrType = $this->CPanel_model->getListType();
        $arrData = $this->CPanel_model->pageList($id);
        $data = array(
            "webUrl" => $this->webUrl,
            "arrData" => $arrData[0],
            "message" => $message,
            "arrType" => $arrType
        );
        $this->load->view("cpanel/page_edit_view", $data);
    }

    function pageDelete($id)
    {
        $this->load->model('CPanel_model');
        $result = $this->CPanel_model->setPublish($id, "wb_page");
        if ($result) {
            echo "delete success";
        } else {
            echo "delete fail";
        }
        exit();
    }

    function pageList()
    {
        $message = "";
        $this->load->model('CPanel_model');
        $arrNavigator = $this->CPanel_model->pageList();
        $data = array(
            "webUrl" => $this->webUrl,
            "arrayData" => $arrNavigator,
            "message" => $message,
        );
        $this->load->view("cpanel/page_list_view", $data);
    }

    //-----------------------------------Post------------------------------------------//

    function post()
    {
        $message = "";
        $strSelectBar = 'post';
        $data = array(
            "webUrl" => $this->webUrl,
            "message" => $message,
            "selectBar" => $strSelectBar
        );
        $this->load->view("cpanel/post_view", $data);
    }

    function postNew()
    {
        $message = "";

        $this->load->model('CPanel_model');
        $post = $this->input->post();
        if ($post) {
            $result = $this->CPanel_model->postNew($post);
            if ($result) {
                echo $result;
            } else {
                echo "add fail";
            }
            exit();
        }
        $arrType = $this->CPanel_model->getListType();
        $data = array(
            "webUrl" => $this->webUrl,
            "message" => $message,
            "arrType" => $arrType
        );
        $this->load->view("cpanel/post_new_view", $data);
    }

    function postEdit($id)
    {
        $message = "";

        $this->load->model('CPanel_model');
        $post = $this->input->post();
        if ($post) {
            $result = $this->CPanel_model->postEdit($id, $post);
            if ($result) {
                echo "edit success";
            } else {
                echo "edit fail";
            }
            exit();
        }

        $arrType = $this->CPanel_model->getListType();
        $arrData = $this->CPanel_model->postList($id);
        $data = array(
            "webUrl" => $this->webUrl,
            "arrData" => $arrData[0],
            "message" => $message,
            "arrType" => $arrType
        );
        $this->load->view("cpanel/post_edit_view", $data);
    }

    function postDelete($id)
    {
        $this->load->model('CPanel_model');
        $result = $this->CPanel_model->setPublish($id, "wb_post");
        if ($result) {
            echo "delete success";
        } else {
            echo "delete fail";
        }
        exit();
    }

    function postList()
    {
        $message = "";
        $this->load->model('CPanel_model');
        $arrNavigator = $this->CPanel_model->postList();
        $data = array(
            "webUrl" => $this->webUrl,
            "arrayData" => $arrNavigator,
            "message" => $message,
        );
        $this->load->view("cpanel/post_list_view", $data);
    }

    //-----------------------------------User------------------------------------------//

    function user()
    {
        $message = "";
        $strSelectBar = 'user';
        $data = array(
            "webUrl" => $this->webUrl,
            "message" => $message,
            "selectBar" => $strSelectBar
        );
        $this->load->view("cpanel/user_view", $data);
    }

    function userNew()
    {
        $message = "";

        $post = $this->input->post();
        if ($post) {
            $this->load->model('CPanel_model');
            $result = $this->CPanel_model->userNew($post);
            if ($result) {
                echo $result;
            } else {
                echo "add fail";
            }
            exit();
        }
        $data = array(
            "webUrl" => $this->webUrl,
            "message" => $message
        );
        $this->load->view("cpanel/user_new_view", $data);
    }

    function userEdit($id)
    {
        $message = "";

        $this->load->model('CPanel_model');
        $post = $this->input->post();
        if ($post) {
            $result = $this->CPanel_model->userEdit($id, $post);
            if ($result) {
                echo "edit success";
            } else {
                echo "edit fail";
            }
            exit();
        }

        $arrData = $this->CPanel_model->userList($id);
        $data = array(
            "webUrl" => $this->webUrl,
            "arrData" => $arrData[0],
            "message" => $message
        );
        $this->load->view("cpanel/user_edit_view", $data);
    }

    function userDelete($id)
    {
        $this->load->model('CPanel_model');
        $result = $this->CPanel_model->setPublish($id, "wb_user");
        if ($result) {
            echo "delete success";
        } else {
            echo "delete fail";
        }
        exit();
    }

    function userList()
    {
        $message = "";
        $this->load->model('CPanel_model');
        $arrNavigator = $this->CPanel_model->userList();
        $data = array(
            "webUrl" => $this->webUrl,
            "arrayData" => $arrNavigator,
            "message" => $message,
        );
        $this->load->view("cpanel/user_list_view", $data);
    }

    //-----------------------------------Site config------------------------------------------//

    function site_config()
    {
        $message = "";
        $strSelectBar = 'site_config';
        $data = array(
            "webUrl" => $this->webUrl,
            "message" => $message,
            "selectBar" => $strSelectBar
        );
        $this->load->view("cpanel/site_config_view", $data);
    }

    function site_configEdit($id)
    {
        $message = "";

        $this->load->model('CPanel_model');
        $post = $this->input->post();
        if ($post) {
            $result = $this->CPanel_model->site_configEdit($id, $post);
            if ($result) {
                echo "edit success";
            } else {
                echo "edit fail";
            }
            exit();
        }

        $arrData = $this->CPanel_model->site_configList($id);
        $data = array(
            "webUrl" => $this->webUrl,
            "arrData" => $arrData[0],
            "message" => $message
        );
        $this->load->view("cpanel/site_config_edit_view", $data);
    }
}