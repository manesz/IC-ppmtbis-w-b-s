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
        $this->load->view('upload_form', array('error' => ' '));
    }

    function do_upload()
    {
        $folderID = @$_POST['folder_id'];
        $pathUpload = @$_POST['path_upload'];
        $fileType = @$_POST['file_type'];
        $strFolderName = $pathUpload . $folderID;

        //check path แล้วสร้าง folder
        $result = $this->createFolder($strFolderName);

        //ตั้งชื่อใหม่ date-time-fileType-fileName.xxx
        $fileParts = pathinfo($_FILES['userfile']['name']);
        $newName = date("Ymd") . "-" . date('His') . "-$fileType-" . $fileParts['basename'];
        $_FILES['userfile']['name'] = $newName;

        //กำหนดชนิดไฟล์
        $allowedTypes = $fileType == "1" ? "doc|docx|xls|xlsx|pdf" : 'gif|jpg|png';

        if (!is_dir($strFolderName)) {
            echo "Path fail";
        } else {
            $config['upload_path'] = $strFolderName;
            $config['allowed_types'] = $allowedTypes;
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
                //echo $data['file_name'];

                echo $newName;
                //update path file
                /*$this->load->model('Client_model');
                if ($fileType == "1"){
                    $result = $this->Client_model->updatePathFiles($folderID, $newName);
                    if (!$result) {
                        echo "update path files fail";
                    }
                }else {
                    $result = $this->Client_model->updatePathImage($folderID, $newName);
                    if (!$result) {
                        echo "update path image fail";
                    }
                }*/

            }
        }

    }

    public function createFolder($path)
    {
        if (!is_dir($path)) //create the folder if it's not already exists
        {
            $flgCreate = mkdir($path, 0777, true);
            if (!$flgCreate) {
                return "Create False";
            }
        }
        return true;
    }
}

?>