<?php
    $data = $pdo->prepare("SELECT * FROM member WHERE username=?");
    $data->bindparam(1,$_GET["username"]);
    $data->execute();
    $fdata = $data->fetch();
?>

                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="./assets/member/<?=$fdata["username"]?>.jpg" style="height:200px;width:223px;" alt="..." />   
                        </div>
                    </div>

                    <div class="col mb-5" style="width:500px;">
                        <div class="card h-100">
                        <form class="card-body cardbody-color p-lg-5" method="POST" action="" enctype="multipart/form-data">

                            <h6 class="fw-bolder">ชื่อ-นามสกุล</h6>
                            <div class="mb-3">
                            <input type="text" class="form-control" name="name" value="<?=$fdata["name"]?>">
                            </div>

                            <h6 class="fw-bolder">ที่อยู่</h6>
                            <div class="mb-3">
                            <input type="text" class="form-control" name="address" value="<?=$fdata["address"]?>">
                            </div>

                            <h6 class="fw-bolder">เบอร์โทร</h6>
                            <div class="mb-3">
                            <input type="text" class="form-control" name="mobile" value="<?=$fdata["mobile"]?>">
                            </div>

                            <h6 class="fw-bolder">Email</h6>
                            <div class="mb-3">
                            <input type="text" class="form-control" name="email" value="<?=$fdata["email"]?>">
                            </div>

                            <h6 class="fw-bolder">Password</h6>
                            <div class="mb-3">
                            <input type="text" class="form-control" name="password" value="<?=$fdata["password"]?>">
                            </div>

                            <h6 class="fw-bolder">ภาพสมาชิก</h6>
                            <div class="mb-3">
                            <input type="file" class="form-control" name="mphoto">
                            </div>

                            <div class="d-flex">
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="./index.php?action=allmember">ยกเลิก</a></div>
                                    </div>

                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center"><button type="submit" class="btn btn-outline-dark mt-auto">บันทึก</button></div>
                                    </div>
                            </div>
                        </form>
                        </div>
                    </div>

<?php
    if($_POST){
        $username = $fdata["username"];
        $name = $_POST["name"];
        $address = $_POST["address"];
        $mobile = $_POST["mobile"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        $update = $pdo->prepare("UPDATE member SET member.name='$name',member.address='$address',member.mobile='$mobile',member.email='$email',member.password='$password' WHERE username='$username'");
        if($update->execute()){
            include "member_photo_upload.php";
            echo "<script>window.location='index.php?action=allmember';</script>";
        }
    }
?>