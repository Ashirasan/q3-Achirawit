<?php
    include "./connect.php";
    $pid = $_GET["pid"];
    $del = $pdo->prepare("DELETE FROM product WHERE pid=?");
    $del->bindParam(1,$pid);
    if($del->execute()){
        $dir = "../assets/product/";
        $file_name = $pid . ".jpg";
        unlink($dir.$file_name);
        echo "<script>window.location='../index.php?action=allproduct';</script>";
    }
?>