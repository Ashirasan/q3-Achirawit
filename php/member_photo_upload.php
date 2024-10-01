<?php
    if($_POST){
        $dir = "./assets/member/";
        $file_name = $username . ".jpg";
        $tmp_name = $_FILES["mphoto"]["tmp_name"];
        unlink($dir.$file_name);
        move_uploaded_file($tmp_name,$dir.$file_name);
    }
?>