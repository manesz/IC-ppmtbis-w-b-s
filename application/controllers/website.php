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
        $result = $this->Website_model->navigatorDelete($id);
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
        $data = array(
            "webUrl" => $this->webUrl,
            "message" => $message
        );
        $this->load->view("website/slide_new_view", $data);
    }

    function slideList()
    {
        $message = "";
        $data = array(
            "webUrl" => $this->webUrl,
            "message" => $message,
        );
        $this->load->view("website/slide_list_view", $data);
    }
}