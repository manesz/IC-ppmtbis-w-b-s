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
}