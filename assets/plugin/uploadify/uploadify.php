<?php
/*
Uploadify
Copyright (c) 2012 Reactive Apps, Ronnie Garcia
Released under the MIT License <http://www.opensource.org/licenses/mit-license.php> 
*/
// get more knowledge at http://www.uploadify.com/documentation/
// Define a destination
$newFieldName = null;

//$targetFolder = '/findtheroom/web/images/building'; // Relative to the root
$targetFolder = 'IC-ppmtbis-w-b-s/web/images/uploads/tmp'; // Relative to the root
$fieldName = @$_POST['field_name'];
$targetFolder = htmlentities(@$_POST['path_temp']);

var_dump($targetFolder);
$now = date('Y-m-d');
$time = date("YmdHis");
if (!empty($_FILES)) {
    // Validate the file type
    $fileTypes = array('jpg', 'jpeg', 'gif', 'png'); // File extensions
    $fileParts = pathinfo($_FILES['Filedata']['name']);

    //$newfieldname1 = str_replace('#', '', $fieldName);
//    if ($type == 'room') {
//        $newFieldName = str_replace('#room', '', $fieldName);
//    } else {
//        $newFieldName = str_replace('#gallery', '', $fieldName);
//    }
    $fileExtension = $fileParts['extension'];
    //$fexFileName = $newfieldname1.'.'.$fileExtension;
//    $fexFileName = $numberFile . '-' . $time . '.' . $fileExtension;
    $fexFileName = $time . '.' . $fileExtension;
//    $fileNameCallBack = $numberFile . '-' . $time . '.' . $fileExtension . '_' . $newFieldName;

    $tempFile = $_FILES['Filedata']['tmp_name'];
    $targetPath = $_SERVER['DOCUMENT_ROOT'] ;//. "/$targetFolder";
//    $targetPath = "$targetFolder";
    $targetFile = rtrim($targetPath, '/') . '/' . $fexFileName; //$_FILES['Filedata']['name'];

    if (in_array($fileParts['extension'], $fileTypes)) {
        $result = move_uploaded_file($tempFile, $targetFile);
        if (!$result) {
            echo "$tempFile\n$targetFile\nError move file!";
        }else {
            echo $fexFileName;
        }
        //echo $targetFolder . '/' . $_FILES['Filedata']['name'];
//        if ($type == 'room' || $type == 'gallery') {
//            echo $fileNameCallBack;
//        } else {
//            echo $fexFileName;
//        }
        //echo '1';
    } else {
        echo 'Invalid file type.';
    }
}


