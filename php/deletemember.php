<?php
    include "./connect.php";
    $username = $_GET["username"];
    $del = $pdo->prepare("DELETE FROM member WHERE username=?");
    $del->bindParam(1,$username);
    if($del->execute()){
        $dir = "../assets/member/";
        $file_name = $username . ".jpg";
        unlink($dir.$file_name);
        echo "<script>window.location='../index.php?action=allmember';</script>";
    }
?>