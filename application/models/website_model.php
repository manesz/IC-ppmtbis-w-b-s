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

    function searchPost($strSearch)
    {
        $sql = "
            select
              a.*,
              b.name AS type_name
            from
              `wb_post` a
              inner join `wb_type` b
                on (
                  a.`type` = b.`id`
                  and b.`publish` = 1
                )
            where 1
              and a.`publish` = 1
            AND (
              a.title LIKE '%$strSearch%'
              OR a.description LIKE '$strSearch'
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
     * @param $to
     * @param $subject
     * @param $message
     * @param $name
     * @param $email
     * @return bool
     */
    function sendEmail($to, $subject, $message, $name, $email)
    {
        //$arrData = $this->CPanel_model->site_configList(1);
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 456,
            'smtp_user' => 'mail@ideacorners.com',
            'smtp_pass' => 'p@ssw0rd',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => TRUE
        );
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'mail@ideacorners.com',
            'smtp_pass' => 'p@ssw0rd',
            'mailtype'  => 'html',
            'charset'   => 'iso-8859-1'
        );
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'mail.latendahouse.com',
            'smtp_port' => 25,
            'smtp_user' => 'ruxchuk@latendahouse.com',
            'smtp_pass' => 'iydiydot',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => TRUE
        );
        try {
            $this->load->library('email', $config);
            $this->email->from($email, $name);
//        $this->email->to($arrData[0]->contact_email);
            $this->email->to($to);
//        $this->email->cc('another@another-example.com');
//        $this->email->bcc('them@their-example.com');

            $this->email->subject($subject);
            $this->email->message($message);
            $result = $this->email->send();
        } catch (Exception $e) {
            return false;
        }
        if ($result) {
            return true;
        } else {
            return false;
        }
        //echo $this->email->print_debugger();
    }
}