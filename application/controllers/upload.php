<?php

class Upload extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    function index()
    {
        //echo APPPATH;
//        print_r($_SERVER['SCRIPT_FILENAME']);
//        var_dump(is_dir('/upload/'));
        $this->load->view('upload_form', array('error' => ' '));
    }

    function do_upload()
    {
        $config['upload_path'] = 'web/images/uploads/tmp';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2048';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        /*if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('upload_form', $error);
        } else {
            $data = array('upload_data' => $this->upload->data());

            $this->load->view('upload_success', $data);
        }*/
        if (!$this->upload->do_upload()) {
            echo $error = $this->upload->display_errors();
        } else {
            $data = $this->upload->data();
            //$result = move_uploaded_file($data['full_path'], $targetFile);
            echo $data['file_name'];
        }

    }
}

?>