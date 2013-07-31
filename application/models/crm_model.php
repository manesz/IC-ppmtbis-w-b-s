<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 28/7/2556
 * Time: 11:56 น.
 * To change this template use File | Settings | File Templates.
 */

if (!defined('BASEPATH')) exit('No direct script access allowed');

class CRM_model extends CI_Model
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
     * @param array $arrSearch
     * @return object
     */
    function getListClient($id = "", $arrSearch = array())
    {
        $strAnd = $id != "" ? "AND a.id = $id" : "";

        if ($arrSearch) {
            $strAnd .= "AND (";
            $arrAnd = array();
            if ($arrSearch['company_name'] != "") {
                $arrAnd[] = "b.name LIKE '%" . $arrSearch['company_name'] . "%'";
            }
            if ($arrSearch['company_type_id'] != '0') {
                $arrAnd[] = "b.id = " . $arrSearch['company_type_id'];
            }
            if ($arrSearch['company_contact_id'] != "0") {
                $arrAnd[] = "a.id = (
                    SELECT
                      c.`company_id`
                    FROM `crm_map_company_contact` c
                    WHERE 1
                    AND c.`id` =" . $arrSearch['company_contact_id'] . ')';
            }
            if ($arrSearch['create_time'] != '') {
                $arrAnd[] = "a.create_time LIKE '%" . $arrSearch['create_time'] . "%'";
            }
            if ($arrSearch['update_time'] != '') {
                $arrAnd[] = "a.update_time LIKE '%" . $arrSearch['update_time'] . "%'";
            }
            $strAnd .= implode(' AND ', $arrAnd) . ")";
        }
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
            "update_time" => date("Y-m-d H:i:s"),
        );
        return $this->db->update('crm_company', $data, array('id' => $id));
    }

    function clientUpdatePathImage($id, $path)
    {
        $this->logo_image = $path;
        return $this->db->update('crm_company', $this, array('id' => $id));
    }

    //-----------------------------------Employee------------------------------------------//
    function employeeNew($post)
    {
        extract($post);
        $data = array(
            'name' => trim($name),
            'description' => trim($description),
            'permission' => intval($permission),
            'phone_number' => trim($phone_number),
            'email' => trim($email),
            'address' => trim($address),
            'username' => trim($username),
            'password' => md5(trim($password)),
            'employer_level_id' => intval($employer_level_id),
            'create_time' => date("Y-m-d H:i:s"),
            "update_time" => '0000-00-00 00:00:00'
        );
        $this->db->insert('crm_employee', $data);
        return $id = $this->db->insert_id('crm_employee');
    }

    function employeeEdit($id, $post)
    {
        extract($post);
        $data = $password != "" ? array(
            'name' => trim($name),
            'description' => trim($description),
            'permission' => intval($permission),
            'phone_number' => trim($phone_number),
            'email' => trim($email),
            'address' => trim($address),
            //'username' => trim($username),
            'password' => md5(trim($password)),
            'employer_level_id' => intval($employer_level_id),
            'update_time' => date("Y-m-d H:i:s")
        ) : array(
            'name' => trim($name),
            'description' => trim($description),
            'permission' => intval($permission),
            'phone_number' => trim($phone_number),
            'email' => trim($email),
            'address' => trim($address),
            //'username' => trim($username),
            //'password' => md5(trim($password)),
            'employer_level_id' => intval($employer_level_id),
            'update_time' => date("Y-m-d H:i:s")
        );
        return $this->db->update('crm_employee', $data, array('id' => $id));
    }

    /**
     * @param int $id
     * @return object
     */
    function employeeList($id = 0)
    {
        $strAnd = $id == 0 ? "" : "AND a.id = $id";
        $sql = "
            SELECT
              a.*,
              b.name AS `employee_level_name`
            FROM
              `crm_employee` a,
              `crm_employee_level` b
            WHERE 1
              AND a.`employer_level_id` = b.`id`
              AND a.`publish` = 1
              AND b.`publish` = 1
              $strAnd
        ";
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            $result = $query->result();
            return $result;
        } else {
            return (object)array();
        }
    }

    //-----------------------------------Business Type------------------------------------------//
    function businessTypeNew($post)
    {
        extract($post);
        $data = array(
            'name' => trim($name),
            'description' => trim($description),
            'create_time' => date("Y-m-d H:i:s"),
            "update_time" => '0000-00-00 00:00:00'
        );
        $this->db->insert('crm_business_type', $data);
        return $id = $this->db->insert_id('crm_business_type');
    }

    function businessTypeEdit($id, $post)
    {
        extract($post);
        $data = array(
            'name' => trim($name),
            'description' => trim($description),
            'update_time' => date("Y-m-d H:i:s")
        );
        return $this->db->update('crm_business_type', $data, array('int' => $id));
    }

    /**
     * @param int $id
     * @return object
     */
    function businessTypeList($id = 0)
    {
        $strAnd = $id == 0 ? "" : "AND a.int = $id";
        $sql = "
            SELECT
              a.*
            FROM
              `crm_business_type` a
            WHERE 1
              AND a.`publish` = 1
              $strAnd
        ";
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            $result = $query->result();
            return $result;
        } else {
            return (object)array();
        }
    }

    //-----------------------------------Job Group------------------------------------------//
    function jobGroupNew($post)
    {
        extract($post);
        $data = array(
            'name' => trim($name),
            'description' => trim($description),
            'create_time' => date("Y-m-d H:i:s"),
            "update_time" => '0000-00-00 00:00:00',
            "publish" => 1
        );
        $this->db->insert('crm_job_group', $data);
        return $id = $this->db->insert_id('crm_job_group');
    }

    function jobGroupEdit($id, $post)
    {
        extract($post);
        $data = array(
            'name' => trim($name),
            'description' => trim($description),
            'update_time' => date("Y-m-d H:i:s")
        );
        return $this->db->update('crm_job_group', $data, array('id' => $id));
    }

    /**
     * @param int $id
     * @return object
     */
    function jobGroupList($id = 0)
    {
        $strAnd = $id == 0 ? "" : "AND a.id = $id";
        $sql = "
            SELECT
              a.*
            FROM
              `crm_job_group` a
            WHERE 1
              AND a.`publish` = 1
              $strAnd
        ";
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            $result = $query->result();
            return $result;
        } else {
            return (object)array();
        }
    }

    //-----------------------------------Position------------------------------------------//
    function positionNew($post)
    {
        extract($post);
        $data = array(
            'name' => trim($name),
            'description' => trim($description),
            'job_group_id' => intval($job_group_id),
            'create_time' => date("Y-m-d H:i:s"),
            "update_time" => '0000-00-00 00:00:00'
        );
        $this->db->insert('crm_position', $data);
        return $id = $this->db->insert_id('crm_position');
    }

    function positionEdit($id, $post)
    {
        extract($post);
        $data = array(
            'name' => trim($name),
            'description' => trim($description),
            'job_group_id' => intval($job_group_id),
            'update_time' => date("Y-m-d H:i:s")
        );
        return $this->db->update('crm_position', $data, array('int' => $id));
    }

    /**
     * @param int $id
     * @return object
     */
    function positionList($id = 0)
    {
        $strAnd = $id == 0 ? "" : "AND a.int = $id";
        $sql = "
            SELECT
              a.*,
              b.name AS job_group_name
            FROM
              `crm_position` a,
              `crm_job_group` b
            WHERE 1
              AND a.`publish` = 1
              AND b.`publish` = 1
              AND a.job_group_id = b.id
              $strAnd
        ";
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            $result = $query->result();
            return $result;
        } else {
            return (object)array();
        }
    }

    //-----------------------------------Institute------------------------------------------//
    function instituteNew($post)
    {
        extract($post);
        $data = array(
            'name_th' => trim($name_th),
            'name_en' => trim($name_en),
            'name_short' => trim($name_short),
            'description' => trim($description),
            'create_time' => date("Y-m-d H:i:s"),
            "update_time" => '0000-00-00 00:00:00',
            "publish" => 1
        );
        $this->db->insert('crm_institute', $data);
        return $id = $this->db->insert_id('crm_institute');
    }

    function instituteEdit($id, $post)
    {
        extract($post);
        $data = array(
            'name_th' => trim($name_th),
            'name_en' => trim($name_en),
            'name_short' => trim($name_short),
            'description' => trim($description),
            'update_time' => date("Y-m-d H:i:s")
        );
        return $this->db->update('crm_institute', $data, array('id' => $id));
    }

    /**
     * @param int $id
     * @return object
     */
    function instituteList($id = 0)
    {
        $strAnd = $id == 0 ? "" : "AND a.id = $id";
        $sql = "
            SELECT
              a.*
            FROM
              `crm_institute` a
            WHERE 1
              AND a.`publish` = 1
              $strAnd
        ";
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            $result = $query->result();
            return $result;
        } else {
            return (object)array();
        }
    }

    //-----------------------------------Education Level------------------------------------------//
    function educationLevelNew($post)
    {
        extract($post);
        $data = array(
            'name' => trim($name),
            'description' => trim($description),
            'create_time' => date("Y-m-d H:i:s"),
            "update_time" => '0000-00-00 00:00:00',
            "publish" => 1
        );
        $this->db->insert('crm_education_level', $data);
        return $id = $this->db->insert_id('crm_education_level');
    }

    function educationLevelEdit($id, $post)
    {
        extract($post);
        $data = array(
            'name' => trim($name),
            'description' => trim($description),
            'update_time' => date("Y-m-d H:i:s")
        );
        return $this->db->update('crm_education_level', $data, array('int' => $id));
    }

    /**
     * @param int $id
     * @return object
     */
    function educationLevelList($id = 0)
    {
        $strAnd = $id == 0 ? "" : "AND a.int = $id";
        $sql = "
            SELECT
              a.*
            FROM
              `crm_education_level` a
            WHERE 1
              AND a.`publish` = 1
              $strAnd
        ";
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            $result = $query->result();
            return $result;
        } else {
            return (object)array();
        }
    }

    //-----------------------------------Major------------------------------------------//
    function majorNew($post)
    {
        extract($post);
        $data = array(
            'name' => trim($name),
            'description' => trim($description),
            'institute_id' => intval($institute_id),
            'create_time' => date("Y-m-d H:i:s"),
            "update_time" => '0000-00-00 00:00:00',
            "publish" => 1
        );
        $this->db->insert('crm_major', $data);
        return $id = $this->db->insert_id('crm_major');
    }

    function majorEdit($id, $post)
    {
        extract($post);
        $data = array(
            'name' => trim($name),
            'description' => trim($description),
            'institute_id' => intval($institute_id),
            'update_time' => date("Y-m-d H:i:s")
        );
        return $this->db->update('crm_major', $data, array('id' => $id));
    }

    /**
     * @param int $id
     * @return object
     */
    function majorList($id = 0)
    {
        $strAnd = $id == 0 ? "" : "AND a.id = $id";
        $sql = "
            SELECT
              a.*,
              b.name_th AS institute_name_th,
              b.name_en AS institute_name_en
            FROM
              `crm_major` a,
              crm_institute b
            WHERE 1
              AND a.institute_id = b.id
              AND a.`publish` = 1
              AND b.`publish` = 1
              $strAnd
        ";
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            $result = $query->result();
            return $result;
        } else {
            return (object)array();
        }
    }

    //-----------------------------------Skill------------------------------------------//
    function skillNew($post)
    {
        extract($post);
        $data = array(
            'name' => trim($name),
            'description' => trim($description),
            'job_group_id' => intval($job_group_id),
            'create_time' => date("Y-m-d H:i:s"),
            "update_time" => '0000-00-00 00:00:00',
            "publish" => 1
        );
        $this->db->insert('crm_skill', $data);
        return $id = $this->db->insert_id('crm_skill');
    }

    function skillEdit($id, $post)
    {
        extract($post);
        $data = array(
            'name' => trim($name),
            'description' => trim($description),
            'job_group_id' => intval($job_group_id),
            'update_time' => date("Y-m-d H:i:s")
        );
        return $this->db->update('crm_skill', $data, array('id' => $id));
    }

    /**
     * @param int $id
     * @return object
     */
    function skillList($id = 0)
    {
        $strAnd = $id == 0 ? "" : "AND a.id = $id";
        $sql = "
            SELECT
              a.*,
              b.name AS job_group_name
            FROM
              `crm_skill` a,
              crm_job_group b
            WHERE 1
              AND a.job_group_id = b.id
              AND a.`publish` = 1
              AND b.`publish` = 1
              $strAnd
        ";
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            $result = $query->result();
            return $result;
        } else {
            return (object)array();
        }
    }

    //-----------------------------------Rang Salary------------------------------------------//
    function rangSalaryNew($post)
    {
        extract($post);
        $data = array(
            'rang' => trim($rang),
            'description' => trim($description),
            'create_time' => date("Y-m-d H:i:s"),
            "update_time" => '0000-00-00 00:00:00',
            "publish" => 1
        );
        $this->db->insert('crm_rang_salary', $data);
        return $id = $this->db->insert_id('crm_rang_salary');
    }

    function rangSalaryEdit($id, $post)
    {
        extract($post);
        $data = array(
            'rang' => trim($rang),
            'description' => trim($description),
            'update_time' => date("Y-m-d H:i:s")
        );
        return $this->db->update('crm_rang_salary', $data, array('id' => $id));
    }

    /**
     * @param int $id
     * @return object
     */
    function rangSalaryList($id = 0)
    {
        $strAnd = $id == 0 ? "" : "AND a.id = $id";
        $sql = "
            SELECT
              a.*
            FROM
              `crm_rang_salary` a
            WHERE 1
              AND a.`publish` = 1
              $strAnd
        ";
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            $result = $query->result();
            return $result;
        } else {
            return (object)array();
        }
    }

    //-----------------------------------Rang Experience Year------------------------------------------//
    function rangExperienceYearNew($post)
    {
        extract($post);
        $data = array(
            'rang' => trim($rang),
            'description' => trim($description),
            'create_time' => date("Y-m-d H:i:s"),
            "update_time" => '0000-00-00 00:00:00',
            "publish" => 1
        );
        $this->db->insert('crm_rang_experience_year', $data);
        return $id = $this->db->insert_id('crm_rang_experience_year');
    }

    function rangExperienceYearEdit($id, $post)
    {
        extract($post);
        $data = array(
            'rang' => trim($rang),
            'description' => trim($description),
            'update_time' => date("Y-m-d H:i:s")
        );
        return $this->db->update('crm_rang_experience_year', $data, array('id' => $id));
    }

    /**
     * @param int $id
     * @return object
     */
    function rangExperienceYearList($id = 0)
    {
        $strAnd = $id == 0 ? "" : "AND a.id = $id";
        $sql = "
            SELECT
              a.*
            FROM
              `crm_rang_experience_year` a
            WHERE 1
              AND a.`publish` = 1
              $strAnd
        ";
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            $result = $query->result();
            return $result;
        } else {
            return (object)array();
        }
    }

    //-----------------------------------Log------------------------------------------//
    function logNew($older_data, $new_data, $field, $table)
    {
        $data = array(
            'older_data' => trim($older_data),
            'new_data' => trim($new_data),
            'field' => trim($field),
            'table' => trim($table),
            'create_time' => date("Y-m-d H:i:s"),
            "publish" => 1
        );
        $this->db->insert('crm_log', $data);
        return $id = $this->db->insert_id('crm_log');
    }

    /**
     * @param int $id
     * @return object
     */
    function logList($id = 0)
    {
        $strAnd = $id == 0 ? "" : "AND a.id = $id";
        $sql = "
            SELECT
              a.*
            FROM
              `crm_log` a
            WHERE 1
              AND a.`publish` = 1
              $strAnd
        ";
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            $result = $query->result();
            return $result;
        } else {
            return (object)array();
        }
    }


    //-----------------------------------Company Contact------------------------------------------//
    function companyContactNew($post)
    {
        extract($post); //var_dump($post);exit();
        $data = array(
            'name' => trim($name),
            'position_id' => intval($position_id),
            'phone' => trim($phone),
            'email' => trim($email),
            'company_id' => intval($company_id),
            'create_time' => date("Y-m-d H:i:s"),
            "publish" => 1
        );
        $this->db->insert('crm_map_company_contact', $data);
        return $id = $this->db->insert_id('crm_map_company_contact');
    }

    function companyContactEdit($id, $post)
    {
        extract($post); //var_dump($post);exit();
        $data = array(
            'name' => trim($name),
            'position_id' => intval($position_id),
            'phone' => trim($phone),
            'email' => trim($email),
            'company_id' => intval($company_id),
        );
        return $this->db->update('crm_map_company_contact', $data, array('id' => $id));
    }

    /**
     * @param int $id
     * @param int $company_id
     * @return object
     */
    function companyContactList($company_id = 0, $id = 0)
    {
        if ($company_id != 0) {
            $strAnd = $id == 0 ? "AND a.company_id = $company_id" : "AND a.company_id = $company_id AND a.id = $id";
        } else {
            $strAnd = "";
        }
        $sql = "
            SELECT
              a.*,
              b.name AS position_name
            FROM
              `crm_map_company_contact` a,
              `crm_position` b
            WHERE 1
              AND a.`publish` = 1
              AND b.publish = 1
              AND a.position_id = b.int
              $strAnd
        ";
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            $result = $query->result();
            return $result;
        } else {
            return (object)array();
        }
    }

    //-----------------------------------Company History------------------------------------------//
    function companyHistoryNew($post)
    {
        extract($post);
        $data = array(
            'title' => trim($title),
            'description' => trim($description),
            'priority' => intval($priority),
            'company_id' => intval($company_id),
            'key_account_manager_id' => intval($key_account_manager_id),
            'create_time' => $create_time,
            'update_time' => "0000-00-00 00:00:00",
            "publish" => 1
        );
        $this->db->insert('crm_company_history', $data);
        return $id = $this->db->insert_id('crm_company_history');
    }

    function companyHistoryEdit($id, $post)
    {
        extract($post);
        $data = array(
            'title' => trim($title),
            'description' => trim($description),
            'priority' => intval($priority),
            'company_id' => intval($company_id),
            'key_account_manager_id' => intval($key_account_manager_id),
            'update_time' => date("Y-m-d H:i:s"),
        );
        return $this->db->update('crm_company_history', $data, array('id' => $id));
    }

    /**
     * @param int $id
     * @param int $company_id
     * @return object
     */
    function companyHistoryList($company_id, $id = 0)
    {
        $strAnd = $id == 0 ? "AND a.company_id = $company_id" : "AND a.company_id = $company_id AND a.id = $id";
        $sql = "
            SELECT
              a.*,
              b.name AS key_account_manager_name
            FROM
              `crm_company_history` a,
              `crm_employee` b
            WHERE 1
              AND a.`publish` = 1
              AND b.publish = 1
              AND a.key_account_manager_id = b.id
              $strAnd
        ";
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            $result = $query->result();
            return $result;
        } else {
            return (object)array();
        }
    }

    //-----------------------------------Company Type------------------------------------------//
    /**
     * get รายชื่อประเภทบริษัท
     *
     * @param $id
     * @return object
     */
    function getListCompanyType($id = "")
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
}