
<?php
include "../php/connect.php";
$data = $pdo->prepare("SELECT * FROM member WHERE username=?");
$data->bindParam(1,$_GET["username"]);
$data->execute();

sleep(1);

if (!$data->fetch()) {
	echo 1;
} else {
	echo 0;
}
?>
