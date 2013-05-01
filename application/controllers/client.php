<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Chukkapun
 * Date: 23/4/2556
 * Time: 23:21 น.
 * To change this template use File | Settings | File Templates.
 */


if (!defined('BASEPATH')) exit('No direct script access allowed');

class Client extends CI_Controller
{

    public function clientList()
    {

        $this->load->view('client/list');
    }
    public function clientNew()
    {
        $post = $this->input->post();
        if ($post) {
            extract($post);
            $sql = "
                insert into `company` (
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
                echo "add success";
            } else {
                echo "add fail";
            }
        }

        $this->load->view('client/new');
    }
    public function clientEdit()
    {

        $this->load->view('client/edit');
    }

}