<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 20/5/2556
 * Time: 17:02 น.
 * To change this template use File | Settings | File Templates.
 */

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Client_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
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

    function clientNew($post)
    {
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
            return $id;
        } else {
            return false;
        }
    }
}