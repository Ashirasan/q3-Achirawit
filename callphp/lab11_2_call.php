
<?php
include "../php/connect.php";
$data = $pdo->prepare("SELECT * FROM member WHERE member.name=?");
$data->bindParam(1,$_GET["name"]);
$data->execute();
if($fdata = $data->fetch()){
    ?>
<div class="col mb-5">
                  <div class="card h-100">
                      <!-- Product image-->
                      <img class="card-img-top" src="./assets/member/<?=$fdata["username"]?>.jpg" style="height:200px;" alt="..." />
                      <!-- member details-->
                      <div class="card-body p-4">
                          <div class="text-center">
                              <!-- member name-->
                              <h5 class="fw-bolder"><?=$fdata["name"]?></h5>
                          </div>
                      </div>
                      <!-- member actions-->
                      <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                          <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="./index.php?action=showMdetial&member=<?=$fdata["username"]?>">รายะเอียดสมาชิก</a></div>
                      </div>
                  </div>
              </div>                  
<?php
}else{
    echo 1;
}


?>
