<?php
    if($_POST){
        $dir = "./assets/product/";
        $file_name = $pid . ".jpg";
        $tmp_name = $_FILES["pphoto"]["tmp_name"];
        unlink($dir.$file_name);
        move_uploaded_file($tmp_name,$dir.$file_name);
    }
?>