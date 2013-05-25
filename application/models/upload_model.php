<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 25/5/2556
 * Time: 14:39 น.
 * To change this template use File | Settings | File Templates.
 */


if (!defined('BASEPATH')) exit('No direct script access allowed');

class Upload_model extends CI_Model
{

    private $strPathUpload = "upload/files/";

    function __construct()
    {
        parent::__construct();
    }

    function getFileFromFolder($folder, $id)
    {
        $path = $this->strPathUpload . "$folder/$id";
        $arrFile = array();
        if (is_dir($path)) //create the folder if it's not already exists
        {
            $this->load->helper("file");
            $arrFile = get_filenames($path);
        }
        return (object)$arrFile;
    }

    function deleteFile($folder, $id, $fileName)
    {
        $path = $this->strPathUpload . "$folder/$id/$fileName";
        //$this->load->helper("file");
        //return delete_files($path);
        return unlink($path);
    }

}