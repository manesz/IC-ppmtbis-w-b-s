<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 27/5/2556
 * Time: 10:10 น.
 * To change this template use File | Settings | File Templates.
 */

if (!defined('BASEPATH')) exit('No direct script access allowed');

class CPanel_model extends CI_Model
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

    /**
     * get list type
     *
     * @return object
     */
    function getListType()
    {
        $arrWhere = array('publish' => 1);
        $query = $this->db->get_where('wb_type', $arrWhere);
        if ($query->num_rows()) {
            $result = $query->result();
            return $result;
        } else {
            return (object)array();
        }
    }

    //-----------------------Navigator------------------------------//

    function navigatorNew($post)
    {
        extract($post);
        $data = array(
            'name' => trim($name),
            'description' => trim($description),
            'layer' => intval($layer),
            'parent' => intval($parent),
            'order' => intval($order),
            'create_time' => date("Y-m-d H:i:s")
        );
        $this->db->insert('wb_navigator', $data);
        return $id = $this->db->insert_id('wb_navigator');
    }

    function navigatorEdit($id, $post)
    {
        extract($post);
        $data = array(
            'name' => trim($name),
            'description' => trim($description),
            'layer' => intval($layer),
            'parent' => intval($parent),
            'order' => intval($order)
        );

        return $this->db->update('wb_navigator', $data, array('id' => $id));
    }

    /**
     * @param int $id
     * @return object
     */
    function navigatorList($id = 0)
    {
        if ($id == 0) {
            $arrWhere = array('publish' => 1);
        } else {
            $arrWhere = array('id' => $id, 'publish' => 1);
        }
        $query = $this->db->get_where('wb_navigator', $arrWhere);
        if ($query->num_rows()) {
            $result = $query->result();
            return $result;
        } else {
            return (object)array();
        }
    }

    //-----------------------Slide------------------------------//

    /**
     * add slide
     *
     * @param $post
     * @return mixed
     */
    function slideNew($post)
    {
        extract($post);
        $data = array(
            'title' => trim($title),
            'description' => trim($description),
            'image' => $image,
            'image_2' => $image_2,
            'order' => intval($order),
            'create_time' => date("Y-m-d H:i:s")
        );
        $this->db->insert('wb_slide', $data);
        return $id = $this->db->insert_id('wb_slide');
    }

    /**
     * edit slide
     *
     * @param $id
     * @param $post
     * @return mixed
     */
    function slideEdit($id, $post)
    {
        extract($post);
        $data = array(
            'title' => trim($title),
            'description' => trim($description),
            'image' => $image,
            'image_2' => $image_2,
            'order' => intval($order)
        );

        return $this->db->update('wb_slide', $data, array('id' => $id));
    }

    /**
     * get slide data
     *
     * @param int $id
     * @return object
     */
    function slideList($id = 0)
    {
        if ($id == 0) {
            $arrWhere = array('publish' => 1);
        } else {
            $arrWhere = array('id' => $id, 'publish' => 1);
        }
        $query = $this->db->get_where('wb_slide', $arrWhere);
        if ($query->num_rows()) {
            $result = $query->result();
            return $result;
        } else {
            return (object)array();
        }
    }

    function updateImageName($id, $data)
    {
        return $this->db->update("wb_slide", $data, array('id' => $id));
    }

    //-----------------------Page------------------------------//

    /**
     * add page
     *
     * @param $post
     * @return mixed
     */
    function pageNew($post)
    {
        extract($post);
        $data = array(
            'title' => trim($title),
            'description' => trim($description),
            'type' => $type,
            'order' => intval($order),
            'create_time' => date("Y-m-d H:i:s")
        );
        $this->db->insert('wb_page', $data);
        return $id = $this->db->insert_id('wb_page');
    }

    /**
     * edit page
     *
     * @param $id
     * @param $post
     * @return mixed
     */
    function pageEdit($id, $post)
    {
        extract($post);
        $data = array(
            'title' => trim($title),
            'description' => trim($description),
            'type' => $type,
            'order' => intval($order)
        );

        return $this->db->update('wb_page', $data, array('id' => $id));
    }

    /**
     * get page data
     *
     * @param int $id
     * @param int $navID
     * @return object
     */
    function pageList($id = 0, $navID = 0)
    {
        $strAND = "";
        if ($id != 0) {
            $strAND = " AND a.id = $id";
        }

        if ($navID != 0) {
            $strAND .= " AND b.id = $navID";
        }

        $sql = "
            select
              a.*,
              b.name AS type_name
            from
              `wb_page` a
              inner join `wb_navigator` b
                on (
                  a.`type` = b.`id`
                  and b.`publish` = 1
                )
            where 1
              and a.`publish` = 1
              $strAND
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
     * Get List Order
     *
     * @param $id
     * @return object
     */
    function pageGetListOrder($id)
    {
        $sql = "
            SELECT
              *
            FROM `wb_page`
            WHERE 1
            AND `type` = $id
        ";
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            $result = $query->result();
            return $result;
        } else {
            return (object)array();
        }
    }

    //-----------------------Post------------------------------//

    /**
     * add post
     *
     * @param $post
     * @return mixed
     */
    function postNew($post)
    {
        extract($post);
        $data = array(
            'title' => trim($title),
            'description' => trim($description),
            'type' => $type,
            'salary' => trim($salary),
            'workplace' => trim($workplace),
            'responsibilities' => trim($responsibilities),
            'qualification' => trim($qualification),
            'tags' => trim($tags),
            'hotjob' => empty($hotjob) ? 0 : 1,
            'create_time' => date("Y-m-d H:i:s")
        );
        $this->db->insert('wb_post', $data);
        return $id = $this->db->insert_id('wb_post');
    }

    /**
     * edit post
     *
     * @param $id
     * @param $post
     * @return mixed
     */
    function postEdit($id, $post)
    {
        extract($post);
        $data = array(
            'title' => trim($title),
            'description' => trim($description),
            'type' => $type,
            'salary' => trim($salary),
            'workplace' => trim($workplace),
            'responsibilities' => trim($responsibilities),
            'qualification' => trim($qualification),
            'tags' => trim($tags),
            'hotjob' => empty($hotjob) ? 0 : 1,
        );

        return $this->db->update('wb_post', $data, array('id' => $id));
    }

    /**
     * get post data
     *
     */
    function postList($id = 0, $hotJob = false)
    {
        if ($id == 0) {
            $strAND = "";
        } else {
            $strAND = " AND a.id = $id";
        }
        if ($hotJob == 0) {
            $strAND .= "";
        } else {
            $strAND .= " AND a.hotjob = 1";
        }

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
              $strAND
        ";

        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            $result = $query->result();
            return $result;
        } else {
            return (object)array();
        }
    }

    //-----------------------User------------------------------//

    /**
     * add user
     *
     * @param $user
     * @return mixed
     */
    function userNew($user)
    {
        extract($user);
        $data = array(
            'name' => trim($name),
            'description' => trim($description),
            'phone' => trim($phone),
            'email' => trim($email),
            'permission' => trim($permission),
            'create_time' => date("Y-m-d H:i:s")
        );
        $this->db->insert('wb_user', $data);
        return $id = $this->db->insert_id('wb_user');
    }

    /**
     * edit user
     *
     * @param $id
     * @param $user
     * @return mixed
     */
    function userEdit($id, $user)
    {
        extract($user);
        $data = array(
            'name' => trim($name),
            'description' => trim($description),
            'phone' => trim($phone),
            'email' => trim($email),
            'permission' => trim($permission),
        );

        return $this->db->update('wb_user', $data, array('id' => $id));
    }

    /**
     * get user data
     *
     * @param int $id
     * @return object
     */
    function userList($id = 0)
    {
        if ($id == 0) {
            $arrWhere = array('publish' => 1);
        } else {
            $arrWhere = array('id' => $id, 'publish' => 1);
        }
        $query = $this->db->get_where('wb_user', $arrWhere);
        if ($query->num_rows()) {
            $result = $query->result();
            return $result;
        } else {
            return (object)array();
        }
    }

    //-----------------------Site Config------------------------------//

    /**
     * edit site_config
     *
     * @param $id
     * @param $site_config
     * @return mixed
     */
    function site_configEdit($id, $site_config)
    {
        extract($site_config);
        $data = array(
            'site_title' => trim($site_title),
            'site_description' => trim($site_description),
            'site_keyword' => trim($site_keyword),
            'facebook_account' => trim($facebook_account),
            'twitter_account' => trim($twitter_account),
            'front_content' => trim($front_content),
            'contact_lat_long' => trim($contact_lat_long),
            'contact_content' => trim($contact_content),
            'contact_phone' => trim($contact_phone),
            'contact_fax' => trim($contact_fax),
            'contact_email' => trim($contact_email),
            'contact_address' => trim($contact_address),
            'contact_image' => trim($contact_image),
        );

        return $this->db->update('wb_site_config', $data, array('id' => $id));
    }

    /**
     * get site_config data
     *
     * @param int $id
     * @return object
     */
    function site_configList($id = 0)
    {
        if ($id == 0) {
            $arrWhere = array('publish' => 1);
        } else {
            $arrWhere = array('id' => $id, 'publish' => 1);
        }
        $query = $this->db->get_where('wb_site_config', $arrWhere);
        if ($query->num_rows()) {
            $result = $query->result();
            return $result;
        } else {
            return (object)array();
        }
    }
}