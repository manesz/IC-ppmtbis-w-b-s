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
        redirect($this->webUrl . "website/dashboard");
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
        $this->load->view('website/dashboard_view', $data);
    }

    //-----------------------------------Slide------------------------------------------//

    function navigator()
    {
        $message = "";
        $strSelectBar = "navigator";

        $data = array(
            "webUrl" => $this->webUrl,
            "message" => $message,
            "selectBar" => $strSelectBar
        );
        $this->load->view("website/navigator_view", $data);
    }

    function navigatorNew()
    {
        $message = "";

        $post = $this->input->post();
        if ($post) {
            $this->load->model('Website_model');
            $result = $this->Website_model->navigatorNew($post);
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
        $this->load->view("website/navigator_new_view", $data);
    }

    function navigatorEdit($id)
    {
        $message = "";

        $this->load->model('Website_model');
        $post = $this->input->post();
        if ($post) {
            $result = $this->Website_model->navigatorEdit($id, $post);
            if ($result) {
                echo "edit success";
            } else {
                echo "edit fail";
            }
            exit();
        }

        $arrNavigator = $this->Website_model->navigatorList($id);
        $data = array(
            "webUrl" => $this->webUrl,
            "arrData" => $arrNavigator[0],
            "message" => $message
        );
        $this->load->view("website/navigator_edit_view", $data);
    }

    function navigatorDelete($id)
    {
        $this->load->model('Website_model');
        $result = $this->Website_model->setPublish($id, 'wb_navigator');
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
        $this->load->model('Website_model');
        $arrNavigator = $this->Website_model->navigatorList();
        $data = array(
            "webUrl" => $this->webUrl,
            "arrayData" => $arrNavigator,
            "message" => $message,
        );
        $this->load->view("website/navigator_list_view", $data);
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
        $this->load->view("website/slide_view", $data);
    }

    function slideNew()
    {
        $message = "";

        $post = $this->input->post();
        if ($post) {
            $this->load->model('Website_model');
            $result = $this->Website_model->slideNew($post);
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
        $this->load->view("website/slide_new_view", $data);
    }

    function slideEdit($id)
    {
        $message = "";

        $this->load->model('Website_model');
        $post = $this->input->post();
        if ($post) {
            $result = $this->Website_model->slideEdit($id, $post);
            if ($result) {
                echo "edit success";
            } else {
                echo "edit fail";
            }
            exit();
        }

        $arrData = $this->Website_model->slideList($id);
        $data = array(
            "webUrl" => $this->webUrl,
            "arrData" => $arrData[0],
            "message" => $message
        );
        $this->load->view("website/slide_edit_view", $data);
    }

    function slideDelete($id)
    {
        $this->load->model('Website_model');
        $result = $this->Website_model->setPublish($id, "wb_slide");
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
        $this->load->model('Website_model');
        $arrNavigator = $this->Website_model->slideList();
        $data = array(
            "webUrl" => $this->webUrl,
            "arrayData" => $arrNavigator,
            "message" => $message,
        );
        $this->load->view("website/slide_list_view", $data);
    }

    function slideUpdateImageName()
    {
        $post = $this->input->post();
        if ($post) {
            extract($post);
            $this->load->model('Website_model');
            $result = $this->Website_model->updateImageName($id, $path, "wb_slide");
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
        $this->load->view("website/page_view", $data);
    }

    function pageNew()
    {
        $message = "";

        $this->load->model('Website_model');
        $post = $this->input->post();
        if ($post) {
            $result = $this->Website_model->pageNew($post);
            if ($result) {
                echo $result;
            } else {
                echo "add fail";
            }
            exit();
        }
        $arrType = $this->Website_model->getListType();
        $data = array(
            "webUrl" => $this->webUrl,
            "message" => $message,
            "arrType" => $arrType
        );
        $this->load->view("website/page_new_view", $data);
    }

    function pageEdit($id)
    {
        $message = "";

        $this->load->model('Website_model');
        $post = $this->input->post();
        if ($post) {
            $result = $this->Website_model->pageEdit($id, $post);
            if ($result) {
                echo "edit success";
            } else {
                echo "edit fail";
            }
            exit();
        }

        $arrType = $this->Website_model->getListType();
        $arrData = $this->Website_model->pageList($id);
        $data = array(
            "webUrl" => $this->webUrl,
            "arrData" => $arrData[0],
            "message" => $message,
            "arrType" => $arrType
        );
        $this->load->view("website/page_edit_view", $data);
    }

    function pageDelete($id)
    {
        $this->load->model('Website_model');
        $result = $this->Website_model->setPublish($id, "wb_page");
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
        $this->load->model('Website_model');
        $arrNavigator = $this->Website_model->pageList();
        $data = array(
            "webUrl" => $this->webUrl,
            "arrayData" => $arrNavigator,
            "message" => $message,
        );
        $this->load->view("website/page_list_view", $data);
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
        $this->load->view("website/post_view", $data);
    }

    function postNew()
    {
        $message = "";

        $this->load->model('Website_model');
        $post = $this->input->post();
        if ($post) {
            $result = $this->Website_model->postNew($post);
            if ($result) {
                echo $result;
            } else {
                echo "add fail";
            }
            exit();
        }
        $arrType = $this->Website_model->getListType();
        $data = array(
            "webUrl" => $this->webUrl,
            "message" => $message,
            "arrType" => $arrType
        );
        $this->load->view("website/post_new_view", $data);
    }

    function postEdit($id)
    {
        $message = "";

        $this->load->model('Website_model');
        $post = $this->input->post();
        if ($post) {
            $result = $this->Website_model->postEdit($id, $post);
            if ($result) {
                echo "edit success";
            } else {
                echo "edit fail";
            }
            exit();
        }

        $arrType = $this->Website_model->getListType();
        $arrData = $this->Website_model->postList($id);
        $data = array(
            "webUrl" => $this->webUrl,
            "arrData" => $arrData[0],
            "message" => $message,
            "arrType" => $arrType
        );
        $this->load->view("website/post_edit_view", $data);
    }

    function postDelete($id)
    {
        $this->load->model('Website_model');
        $result = $this->Website_model->setPublish($id, "wb_post");
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
        $this->load->model('Website_model');
        $arrNavigator = $this->Website_model->postList();
        $data = array(
            "webUrl" => $this->webUrl,
            "arrayData" => $arrNavigator,
            "message" => $message,
        );
        $this->load->view("website/post_list_view", $data);
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
        $this->load->view("website/user_view", $data);
    }

    function userNew()
    {
        $message = "";

        $post = $this->input->post();
        if ($post) {
            $this->load->model('Website_model');
            $result = $this->Website_model->userNew($post);
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
        $this->load->view("website/user_new_view", $data);
    }

    function userEdit($id)
    {
        $message = "";

        $this->load->model('Website_model');
        $post = $this->input->post();
        if ($post) {
            $result = $this->Website_model->userEdit($id, $post);
            if ($result) {
                echo "edit success";
            } else {
                echo "edit fail";
            }
            exit();
        }

        $arrData = $this->Website_model->userList($id);
        $data = array(
            "webUrl" => $this->webUrl,
            "arrData" => $arrData[0],
            "message" => $message
        );
        $this->load->view("website/user_edit_view", $data);
    }

    function userDelete($id)
    {
        $this->load->model('Website_model');
        $result = $this->Website_model->setPublish($id, "wb_user");
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
        $this->load->model('Website_model');
        $arrNavigator = $this->Website_model->userList();
        $data = array(
            "webUrl" => $this->webUrl,
            "arrayData" => $arrNavigator,
            "message" => $message,
        );
        $this->load->view("website/user_list_view", $data);
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
        $this->load->view("website/site_config_view", $data);
    }

    function site_configEdit($id)
    {
        $message = "";

        $this->load->model('Website_model');
        $post = $this->input->post();
        if ($post) {
            $result = $this->Website_model->site_configEdit($id, $post);
            if ($result) {
                echo "edit success";
            } else {
                echo "edit fail";
            }
            exit();
        }

        $arrData = $this->Website_model->site_configList($id);
        $data = array(
            "webUrl" => $this->webUrl,
            "arrData" => $arrData[0],
            "message" => $message
        );
        $this->load->view("website/site_config_edit_view", $data);
    }
}