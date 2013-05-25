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
     * set publish = 0
     *
     * @param $id
     * @param $table
     * @return mixed
     */
    function setPublish($id, $table)
    {
        $data = array(
            'publish' => 0
        );
        return $this->db->update($table, $data, array('id' => $id));
    }

    //-----------------------------------Client------------------------------------------//

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
        $data = array(
            "company_type_id" => intval($company_type_id),
            "key_account_manager_id" => intval($key_account_manager_id),
            "name_th" => trim($name_th),
            "name_en" => trim($name_en),
            "name_short" => trim($name_short),
            "description_th" => trim($description_th),
            "description_en" => trim($description_en),
            "address_th" => trim($address_th),
            "address_en" => trim($address_en),
            "main_product_th" => trim($main_product_th),
            "main_product_en" => trim($main_product_en),
            "office_number" => trim($office_number),
            "fax_number" => trim($fax_number),
            "email_office" => trim($email_office),
            "website_link" => trim($website_link),
            "recruitment_fee" => trim($recruitment_fee),
            "payment_term" => trim($payment_term),
            "remark" => trim($remark),
            "logo_image" => $logo_image,
            "create_time" => date("Y-m-d H:i:s"),
            "update_time" => '0000-00-00 00:00:00'
        );
        $result = $this->db->insert('crm_company', $data);
        //$result = $this->db->query($sql);
        $id = $this->db->insert_id();
        if ($result) {
            return $id;
        } else {
            return false;
        }
    }

    function clientEdit($id, $post)
    {
        extract($post);
        $data = array(
            "company_type_id" => trim($company_type_id),
            "key_account_manager_id" => trim($key_account_manager_id),
            "name_th" => trim($name_th),
            "name_en" => trim($name_en),
            "name_short" => trim($name_short),
            "description_th" => trim($description_th),
            "description_en" => trim($description_en),
            "address_th" => trim($address_th),
            "address_en" => trim($address_en),
            "main_product_th" => trim($main_product_th),
            "main_product_en" => trim($main_product_en),
            "office_number" => trim($office_number),
            "fax_number" => trim($fax_number),
            "email_office" => trim($email_office),
            "website_link" => trim($website_link),
            "recruitment_fee" => trim($recruitment_fee),
            "payment_term" => trim($payment_term),
            "remark" => trim($remark),
            "logo_image" => $logo_image,
            "update_time" => date("Y-m-d H:i:s"),
        );
        return $this->db->update('crm_company', $data, array('id' => $id));
    }

    function clientUpdatePathImage($id, $path)
    {
        $this->logo_image = $path;
        return $this->db->update('crm_company', $this, array('id' => $id));
    }

    function updatePathFiles($id, $path)
    {

    }
}