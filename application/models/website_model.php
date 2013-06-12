<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 22/5/2556
 * Time: 21:19 น.
 * To change this template use File | Settings | File Templates.
 */

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Website_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function getListJobMenu()
    {
        $sql = "
            SELECT
              a.*,
              b.`name` AS type_name
            FROM
              `wb_post` a
              INNER JOIN `wb_type` b
                ON (
                  a.`type` = b.`id`
                  AND b.`publish` = 1
                )
            WHERE 1
              AND a.`publish` = 1
                ORDER BY a.`type`,
                  a.`create_time`
        ";
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            $result = $query->result();
            return $result;
        } else {
            return (object)array();
        }
    }

    function searchPage($strSearch)
    {
//        $exStr = explode(" ", $strSearch);
//        $sqlAnd = "";
//        if (count($exStr) > 0) {
//            $sqlAnd = implode(', ')
//        }
        $sql = "
            SELECT
              *
            FROM `wb_page`
            WHERE 1
            AND (
              title LIKE '%$strSearch%'
              OR description LIKE '$strSearch'
            )

        ";
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            $result = $query->result();
            return $result;
        } else {
            return (object)array();
        }
    }

    function searchPost($strSearch)
    {
//        $exStr = explode(" ", $strSearch);
//        $sqlAnd = "";
//        if (count($exStr) > 0) {
//            $sqlAnd = implode(', ')
//        }
        $sql = "
            SELECT
              *
            FROM `wb_post`
            WHERE 1
            AND (
              title LIKE '%$strSearch%'
              OR description LIKE '$strSearch'
            )

        ";
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            $result = $query->result();
            return $result;
        } else {
            return (object)array();
        }
    }

    /**
     * Drop us a line
     *
     * @param $name
     * @param $email
     * @param $message
     */
    function sendEmail($name, $email, $message)
    {
        $arrData = $this->CPanel_model->site_configList(1);
        $this->load->library('email');

        $this->email->from($email, $name);
//        $this->email->to($arrData[0]->contact_email);
       $this->email->to('ruxchuk@gmail.com');
//        $this->email->cc('another@another-example.com');
//        $this->email->bcc('them@their-example.com');

        $this->email->subject('Drop us a line');
        $this->email->message($message);

        $this->email->send();

        echo $this->email->print_debugger();
    }
}