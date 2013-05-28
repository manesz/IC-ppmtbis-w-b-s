<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 19/5/2556
 * Time: 9:10 น.
 * To change this template use File | Settings | File Templates.
 */

class Auth_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function signIn($post)
    {
        extract($post);
        $password = md5($password);
        $sql = "
                SELECT
                  *
                FROM `crm_employee`
                WHERE 1
                AND `username` = '$username'
                AND `password` = '$password'
                AND publish = 1
            ";
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            $result = $query->result();
            $this->session->set_userdata((array)$result[0]);
            //redirect(base_url(). "index.php/member/newEmployee");
            //$this->load->view('dashboard');
            return true;

        } else {
            return false;
        }

    }

    function cPanelSignIn($post)
    {
        extract($post);
        $password = md5($password);
    }

}