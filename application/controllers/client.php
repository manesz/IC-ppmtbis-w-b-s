<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Chukkapun
 * Date: 23/4/2556
 * Time: 23:21 น.
 * To change this template use File | Settings | File Templates.
 */


if (!defined('BASEPATH')) exit('No direct script access allowed');

class Client extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {

        $this->load->view('client/new', array("message" => ""));
    }

    public function clientList()
    {
        $arrClientList = $this->getListClient();
        $data = array(
            'arrClientList' => $arrClientList,
            'company_type' => $this->getListCompanyType(),
            'message' => ""
        );
        $this->load->view('client/list', $data);
    }

    /**
     * @param string $id
     * @return object
     */
    public function getListClient($id = "")
    {
        $strAnd = $id != "" ? "AND a.id = $id" : "";
        $sql = "
            SELECT
              a.*,
              b.`name` AS company_type_name
            FROM
              `crm_company` a
              INNER JOIN `crm_company_type` b
                ON (a.`company_type_id` = b.`id`)
            WHERE 1
              AND b.`publish` = 1
              AND a.publish = 1
              $strAnd
        ";
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            $result = $query->result();
        } else {
            $result = (object)array();
        }
        return $result;
    }

    /**
     * get รายชื่อประเภทบริษัท
     *
     * @param $id
     * @return object
     */
    public function getListCompanyType($id = "")
    {
        $strAnd = $id != "" ? "AND id = $id" : "";
        $sql = "
            SELECT
              *
            FROM
              `crm_company_type`
            WHERE 1
              AND publish = 1
              $strAnd
        ";
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            $result = $query->result();
        } else {
            $result = (object)array();
        }
        return $result;
    }

    public function clientNew()
    {
        $data = null;
        $data['message'] = "";
        $post = $this->input->post();
        if ($post) {
            extract($post);
            $company_type_id = trim($company_type_id);
            $key_account_manager_id = trim($key_account_manager_id);
            $name_th = trim($name_th);
            $name_en = trim($name_en);
            $name_short = trim($name_short);
            $description_th = trim($description_th);
            $description_en = trim($description_en);
            $address_th = trim($address_th);
            $address_en = trim($address_en);
            $main_product_th = trim($main_product_th);
            $main_product_en = trim($main_product_en);
            $office_number = trim($office_number);
            $fax_number = trim($fax_number);
            $email_office = trim($email_office);
            $website_link = trim($website_link);
            $recruitment_fee = trim($recruitment_fee);
            $payment_term = trim($payment_term);
            $remark = trim($remark);
            $sql = "
                insert into `crm_company` (
                  `company_type_id`,
                  `key_account_manager_id`,
                  `name_th`,
                  `name_en`,
                  `name_short`,
                  `description_th`,
                  `description_en`,
                  `address_th`,
                  `address_en`,
                  `main_product_th`,
                  `main_product_en`,
                  `office_number`,
                  `fax_number`,
                  `email_office`,
                  `website_link`,
                  `recruitment_fee`,
                  `payment_term`,
                  `remark`,
                  `logo_image`,
                  `create_time`,
                  `update_time`
                )
                values
                  (
                    '$company_type_id',
                    '$key_account_manager_id',
                    '$name_th',
                    '$name_en',
                    '$name_short',
                    '$description_th',
                    '$description_en',
                    '$address_th',
                    '$address_en',
                    '$main_product_th',
                    '$main_product_en',
                    '$office_number',
                    '$fax_number',
                    '$email_office',
                    '$website_link',
                    '$recruitment_fee',
                    '$payment_term',
                    '$remark',
                    '$logo_image',
                    NOW(),
                    '0000-00-00 00:00:00'
                  ) ;
            ";
            $result = $this->db->query($sql);
            $id = $this->db->insert_id();
            if ($result) {
                $data['message'] = "Add success";
            } else {
                $data['message'] = "Add fail";
            }
        }

        $data['company_type'] = $this->getListCompanyType();

        $this->load->view('client/new', $data);
    }

    /**
     * @param $nameTH
     * @param $nameEn
     * @return bool
     */
    public function checkAddClient($nameTH, $nameEn)
    {
        return true;
    }

    public function clientEdit($id)
    {
        $message = "";
        $post = $this->input->post();
        if ($post) {
            extract($post);
            $company_type_id = trim($company_type_id);
            $key_account_manager_id = trim($key_account_manager_id);
            $name_th = trim($name_th);
            $name_en = trim($name_en);
            $name_short = trim($name_short);
            $description_th = trim($description_th);
            $description_en = trim($description_en);
            $address_th = trim($address_th);
            $address_en = trim($address_en);
            $main_product_th = trim($main_product_th);
            $main_product_en = trim($main_product_en);
            $office_number = trim($office_number);
            $fax_number = trim($fax_number);
            $email_office = trim($email_office);
            $website_link = trim($website_link);
            $recruitment_fee = trim($recruitment_fee);
            $payment_term = trim($paymensddt_term);
            $remark = trim($remark);
            $sql = "
                UPDATE
                  `crm_company`
                SET
                  `company_type_id` = '$company_type_id',
                  `key_account_manager_id` = '$key_account_manager_id',
                  `name_th` = '$name_th',
                  `name_en` = '$name_en',
                  `name_short` = '$name_short',
                  `description_th` = '$description_th',
                  `description_en` = '$description_en',
                  `address_th` = '$address_th',
                  `address_en` = '$address_en',
                  `main_product_th` = '$main_product_th',
                  `main_product_en` = '$main_product_en',
                  `office_number` = '$office_number',
                  `fax_number` = '$fax_number',
                  `email_office` = '$email_office',
                  `website_link` = '$website_link',
                  `recruitment_fee` = '$recruitment_fee',
                  `payment_term` = '$payment_term',
                  `remark` = '$remark',
                  `logo_image` = '$logo_image',
                  `update_time` = NOW()
                WHERE `id` = '$id' ;
            ";
            $result = $this->db->query($sql);
            if ($result) {
                $message = "Update Finish";
            } else {
                $message = "!Update Fail";
            }
        }
        $arrClientList = $this->getListClient($id);
        $data = array(
            'dataClient' => $arrClientList[0],
            'company_type' => $this->getListCompanyType(),
            'message' => $message
        );
        $this->load->view('client/edit', $data);
    }

}