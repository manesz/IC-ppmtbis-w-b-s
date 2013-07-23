<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 23/7/2556
 * Time: 9:37 น.
 * To change this template use File | Settings | File Templates.
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Apply_Job extends CI_Controller
{

    protected $path_img_upload_folder;
    protected $path_img_thumb_upload_folder;
    protected $path_url_img_upload_folder;
    protected $path_url_img_thumb_upload_folder;

    protected $delete_img_url;
    protected $webUrl;
    protected $imageType;
    protected $fileType;

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));

        if (strstr($_SERVER['HTTP_HOST'], 'localhost') > -1) {
            $this->webUrl .= base_url() . 'index.php/';
        } else {
            $this->webUrl = base_url();
        }

        $dateNow = date("Y-m-d");
        $uploadPath = "upload/files/apply-job/$dateNow/";
        $thumbnails = $uploadPath . "thumbnails/";
        $this->createFolder($uploadPath);
        $this->createFolder($thumbnails);

        //Set relative Path with CI Constant
        $this->setPath_img_upload_folder($uploadPath);
        $this->setPath_img_thumb_upload_folder($thumbnails);


        //Delete img url
        $this->setDelete_img_url($this->webUrl . 'apply_job/deleteimage');

        //Set url img with Base_url()
        $this->setPath_url_img_upload_folder(base_url() . $uploadPath);
        $this->setPath_url_img_thumb_upload_folder(base_url() . $thumbnails);

        //set type file and image
        $this->imageType = "GIF|JPG|PNG|gif|jpg|png";
        $this->fileType = "TXT|PDF|DOC|DOCX|txt|pdf|doc|docx";
    }

    /**
     * Create folder
     *
     * @param $path
     * @return bool|string
     */
    function createFolder($path)
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


//    public function index()
//    {
//        $this->load->view('admin_v/admin_view');
//    }

    /**
     * @param $fileName
     * @return bool
     */
    function checkThumb($fileName)
    {
        $fileParts = pathinfo($fileName);
        $fileParts['extension'];
        if (strstr($this->fileType, $fileParts['extension']) == "") {
            return true;
        } else {
            return false;
        }
    }


    public function upload_img()
    {
        $name = @$_FILES['userfile']['name'];
        $name = str_replace(' ', '_', $name);
        $name = iconv("UTF-8", "TIS-620", $name);
//        $name = strtr($name, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
//
//        $name = empty($name) ? date('YmdHis'): $name;
        //remplacer les caracteres autres que lettres, chiffres et point par _

        //$name = preg_replace('/([^.a-z0-9]+)/i', '_', $name);

        //Your upload directory, see CI user guide
        $config['upload_path'] = $this->getPath_img_upload_folder();

        $config['allowed_types'] = "$this->fileType|$this->imageType";
        $config['max_size'] = '3000';
        $config['file_name'] = $name;

        //Load the upload library
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload()) {

            //If you want to resize
            $config['new_image'] = $this->getPath_img_thumb_upload_folder();
            $config['image_library'] = 'gd2';
            $config['source_image'] = $this->getPath_img_upload_folder() . $name;
            $config['create_thumb'] = false;
            $config['maintain_ratio'] = true;
            $config['width'] = 193;
            $config['height'] = 94;

            $this->load->library('image_lib', $config);

            $this->image_lib->resize();

            $data = $this->upload->data();

            //Get info
            $info = new stdClass();

            $name = iconv("TIS-620", "UTF-8", $name);
            $info->name = $name;
            $info->size = $data['file_size'];
            $info->type = $data['file_type'];
            $info->url = $this->getPath_img_upload_folder() . $name;

            if ($this->checkThumb($name)) { //check type file
                $info->thumbnail_url = $this->getPath_img_thumb_upload_folder() . $name; //I set this to original file since I did not create thumbs.  change to thumbnail directory if you do = $upload_path_url .'/thumbs' .$name
            }

            $info->delete_url = $this->getDelete_img_url() . "?img=$name";
            $info->delete_type = 'DELETE';


            //Return JSON data
            if (IS_AJAX) { //this is why we put this in the constants to pass only json data
                echo json_encode(array($info));
                //this has to be the only the only data returned or you will get an error.
                //if you don't give this a json array it will give you a Empty file upload result error
                //it you set this without the if(IS_AJAX)...else... you get ERROR:TRUE (my experience anyway)
            } else { // so that this will still work if javascript is not enabled
                $file_data['upload_data'] = $this->upload->data();
                echo json_encode(array($info));
            }
        } else {

            // the display_errors() function wraps error messages in <p> by default and these html chars don't parse in
            // default view on the forum so either set them to blank, or decide how you want them to display.  null is passed.
//            $error = array('error' => $this->upload->display_errors('', ''));
//            echo json_encode(array($error));
        }


    }


//Function for the upload : return true/false
    public
    function do_upload()
    {

        if (!$this->upload->do_upload()) {

            return false;
        } else {
            //$data = array('upload_data' => $this->upload->data());

            return true;
        }
    }

    function deleteImage()
    {

        //Get the name in the url
        //$file = $this->uri->segment(3);
        $file = @$_GET['img'];
        $file = iconv("UTF-8", "TIS-620", $file);
        $success = unlink($this->getPath_img_upload_folder() . $file);

        if ($this->checkThumb($file)) {
            $success_th = unlink($this->getPath_img_thumb_upload_folder() . $file);
        }

        //info to see if it is doing what it is supposed to
        $info = new stdClass();
        $info->sucess = $success;
        $info->path = $this->getPath_url_img_upload_folder() . $file;
        $info->file = is_file($this->getPath_img_upload_folder() . $file);
        if (IS_AJAX) { //I don't think it matters if this is set but good for error checking in the console/firebug
            echo json_encode(array($info));
        } else { //here you will need to decide what you want to show for a successful delete
            //echo $file;
        }
    }

    public
    function get_files()
    {
        $this->get_scan_files();
    }

    public
    function get_scan_files()
    {

        $file_name = isset($_REQUEST['file']) ?
            basename(stripslashes($_REQUEST['file'])) : null;
        if ($file_name) {
            $info = $this->get_file_object($file_name);
        } else {
            $info = $this->get_file_objects();
        }
        header('Content-type: application/json');
        echo json_encode($info);
    }

    protected
    function get_file_object($file_name)
    {
        $file_path = $this->getPath_img_upload_folder() . $file_name;
        if (is_file($file_path) && $file_name[0] !== '.') {

            $file = new stdClass();
            $file->name = $file_name;
            $file->size = filesize($file_path);
            $file->url = $this->getPath_url_img_upload_folder() . rawurlencode($file->name);
            $file->thumbnail_url = $this->getPath_url_img_thumb_upload_folder() . rawurlencode($file->name);
            //File name in the url to delete
            $file->delete_url = $this->getDelete_img_url() . rawurlencode($file->name);
            $file->delete_type = 'DELETE';

            return $file;
        }
        return null;
    }

    protected
    function get_file_objects()
    {
        return array_values(array_filter(array_map(
            array($this, 'get_file_object'), scandir($this->getPath_img_upload_folder())
        )));
    }


    public
    function getPath_img_upload_folder()
    {
        return $this->path_img_upload_folder;
    }

    public
    function setPath_img_upload_folder($path_img_upload_folder)
    {
        $this->path_img_upload_folder = $path_img_upload_folder;
    }

    public
    function getPath_img_thumb_upload_folder()
    {
        return $this->path_img_thumb_upload_folder;
    }

    public
    function setPath_img_thumb_upload_folder($path_img_thumb_upload_folder)
    {
        $this->path_img_thumb_upload_folder = $path_img_thumb_upload_folder;
    }

    public
    function getPath_url_img_upload_folder()
    {
        return $this->path_url_img_upload_folder;
    }

    public
    function setPath_url_img_upload_folder($path_url_img_upload_folder)
    {
        $this->path_url_img_upload_folder = $path_url_img_upload_folder;
    }

    public
    function getPath_url_img_thumb_upload_folder()
    {
        return $this->path_url_img_thumb_upload_folder;
    }

    public
    function setPath_url_img_thumb_upload_folder($path_url_img_thumb_upload_folder)
    {
        $this->path_url_img_thumb_upload_folder = $path_url_img_thumb_upload_folder;
    }

    public
    function getDelete_img_url()
    {
        return $this->delete_img_url;
    }

    public
    function setDelete_img_url($delete_img_url)
    {
        $this->delete_img_url = $delete_img_url;
    }
}