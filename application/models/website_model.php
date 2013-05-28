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
}