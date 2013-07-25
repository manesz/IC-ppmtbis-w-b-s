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

    function getListJobMenu($id = 0)
    {
        $strAnd = $id == 0 ? "" : "a.id = $id";
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
              $strAnd
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
     * @param $arrPathFile
     * @return bool
     */
    function sendEmail($to, $subject, $message, $name, $email, $arrPathFile = array())
    {
        //$arrData = $this->CPanel_model->site_configList(1);
//        $config = Array(
//            'protocol' => 'smtp',
//            'smtp_host' => 'ssl://smtp.googlemail.com',
//            'smtp_port' => 465,
//            'smtp_user' => 'mail@ideacorners.com',
//            'smtp_pass' => 'p@ssw0rd',
//            'mailtype' => 'html',
//            'charset' => 'utf-8',
//            'wordwrap' => TRUE
//        );
//        $config = Array(
//            'protocol' => 'smtp',
//            'smtp_host' => 'ssl://smtp.googlemail.com',
//            'smtp_port' => 465,
//            'smtp_user' => 'mail@ideacorners.com',
//            'smtp_pass' => 'p@ssw0rd',
//            'mailtype'  => 'html',
//            'charset'   => 'iso-8859-1'
//        );
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
            //$this->email->to($to);
            $this->email->to("ruxchuk@gmail.com");
            //$this->email->cc('ladas@promptbis.com');
            $this->email->bcc('info@ideacorners.com');

            if (!empty($arrPathFile)) {
                $count = 1;
                $message .= "<p>Link Attachment :</p>";
                $dateNow = date("Ymd");
                foreach ($arrPathFile as $value) {
                    $fileName = urldecode($value);
                    //$fileName = iconv("UTF-8", "TIS-620", $fileName);
                    //$path = realpath(APPPATH . 'upload/files/apply-job/$dateNow/');
                    //$this->email->attach($path . $fileName);
                    $message .= "<p><a href='$fileName'>File$count</a></p>";
                    //$message .= "<p>$path/$fileName</p>";
                    $count++;
                }
            }
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

    /**
     * @param $category
     * @param $jobID
     * @param $nameSender
     * @param $emailSender
     * @param $mobileSender
     * @param null $arrPath
     * @return mixed
     */
    function addApplyJobLog($category, $jobID, $nameSender, $emailSender, $mobileSender, $arrPath = null)
    {
        if (empty($arrPath)) {
            $strPathFile = "";
            $is_attachment = 0;
        } else {
            $strPathFile = "";
            $dateNow = date("Ymd");
            foreach ($arrPath as $value) {
                $pathFile = urldecode($value);
                $strPathFile .= "/$dateNow/$pathFile\n";
            }
            $is_attachment = 1;
        }

        $data = array(
            'category' => trim($category),
            'job_id' => $jobID,
            'name_sender' => trim($nameSender),
            'email_sender' => trim($emailSender),
            'mobile_sender' => trim($mobileSender),
            'path_attachment' => $strPathFile,
            'is_attachment' => $is_attachment,
            'create_datetime' => date("Y-m-d H:i:s"),
            'publish' => 1
        );
        $this->db->insert('wb_apply_job', $data);
        return $id = $this->db->insert_id('wb_apply_job');
    }
}