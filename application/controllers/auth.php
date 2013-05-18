<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Chukkapun
 * Date: 23/4/2556
 * Time: 22:53 น.
 * To change this template use File | Settings | File Templates.
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function signIn()
    {
        $post = $this->input->post();
        if ($post) {
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
                redirect(base_url(). "index.php/dashboard");
                //$this->load->view('dashboard');

            } else {
                echo 'login fail';
            }
        }

        $this->load->view('sign-in');
    }

    public function signOut()
    {
        $this->session->sess_destroy();
        redirect(base_url().'index.php/auth/signIn');
    }
}