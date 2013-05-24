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
     * @return object
     */
    function pageList($id = 0)
    {
        if ($id == 0) {
            $arrWhere = array('publish' => 1);
        } else {
            $arrWhere = array('id' => $id, 'publish' => 1);
        }
        $query = $this->db->get_where('wb_page', $arrWhere);
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
        );

        return $this->db->update('wb_post', $data, array('id' => $id));
    }

    /**
     * get post data
     *
     * @param int $id
     * @return object
     */
    function postList($id = 0)
    {
        if ($id == 0) {
            $arrWhere = array('publish' => 1);
        } else {
            $arrWhere = array('id' => $id, 'publish' => 1);
        }
        $query = $this->db->get_where('wb_post', $arrWhere);
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