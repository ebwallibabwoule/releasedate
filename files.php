<?php
$TaggingFormat = 'UTF-8';
$directory = './audio';
$fileArray = array();
$format = (isset($_REQUEST['format']) ? $_REQUEST['format'] : '');

if ($handle = opendir($directory)) {
    while (false !== ($file = readdir($handle))) {
        if ($file != "." && $file != ".." && strtolower(substr($file, strrpos($file, '.') + 1)) == 'mp3') {
           $kaas = $file;
            array_push($fileArray, $kaas);
        }

    }            

    if (!empty($format)) {
        header('Content-Type: application/json; charset='.$TaggingFormat);
        echo json_encode($fileArray);
    }
    else {
        header('Content-Type: text/html; charset='.$TaggingFormat);
        foreach ($fileArray as $file) {
            echo '<li><a href="#" data-file="../audio/'.$file.'">'.$file.'</a></li>';
        }
    }

    closedir($handle);
}

?>