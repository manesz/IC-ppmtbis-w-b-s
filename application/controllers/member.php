<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux-Notebook
 * Date: 21/4/2556
 * Time: 11:15 น.
 * To change this template use File | Settings | File Templates.
 */


if (!defined('BASEPATH')) exit('No direct script access allowed');

class Member extends CI_Controller
{
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
//    public function index()
//    {
//        $this->load->view('welcome_message');
//    }

    /**
     * Add รายชื่อพนักงาน
     */
    public function newEmployee()
    {
        $post = $this->input->post();
        if ($post) {
            extract($post);
            $password = md5($password);
            $sql = "
                INSERT INTO `employee` (
                  `name`,
                  `description`,
                  `employer_type`,
                  `phone_number`,
                  `email`,
                  `address`,
                  `username`,
                  `password`,
                  `create_time`
                )
                VALUES
                  (
                    '$name',
                    '$description',
                    $employee_type,
                    '$phone_number',
                    '$email',
                    '$address',
                    '$username',
                    '$password',
                    NOW()
                  );
            ";
            $result = $this->db->query($sql);
            $id = $this->db->insert_id();
            if ($result) {
                echo "add success";
            } else {
                echo "add fail";
            }
        }


        $this->load->view('employee-register');
    }
}
