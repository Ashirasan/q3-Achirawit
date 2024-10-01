<?php
    $data = $pdo->prepare("SELECT * FROM member WHERE username=?");
    $data->bindparam(1,$_GET["member"]);
    $data->execute();
    $fdata = $data->fetch();
?>

                    <div class="col mb-5">
                        <div class="card h-100">
                            <img class="card-img-top" src="./assets/member/<?=$fdata["username"]?>.jpg" style="height:200px;width:223px;" alt="..." />
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder"><?=$fdata["name"]?></h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col mb-5" style="width:500px;">
                        <div class="card h-100">
                            <div class="card-body p-4">
                                <div class="text-left">
                                    <h5 class="fw-bolder">รายละเอียดสมาชิก</h5>
                                        <h6 class="fw-bolder">ที่อยู่</h6>
                                        <div class="mb-3"><?=$fdata["address"]?></div>
                                        <h6 class="fw-bolder">เบอร์โทร</h6>
                                        <div class="mb-3"><?php 
                                        if($fdata["mobile"]==""){
                                            echo "-";
                                        }else{
                                            print_r($fdata["mobile"]);
                                        }
                                        ?></div>
                                        <h6 class="fw-bolder">Email</h6>
                                        <div class="mb-3"><?=$fdata["email"]?></div>
                                </div>
                            </div>
                            <?php 
                                if($_SESSION["username"] == "admin"){ ?>
                                <div class="d-flex">
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="./index.php?action=editmember&username=<?=$fdata["username"]?>">แก้ไขข้อมูล</a></div>
                                    </div>

                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="./php/deletemember.php?username=<?=$fdata["username"]?>">ลบข้อมูล</a></div>
                                    </div>
                                </div>
                                <?php
                                }
                            ?>
                        </div>
                    </div>