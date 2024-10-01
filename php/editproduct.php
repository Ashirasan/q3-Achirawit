<?php
    $data = $pdo->prepare("SELECT * FROM product WHERE pid=?");
    $data->bindparam(1,$_GET["product"]);
    $data->execute();
    $fdata = $data->fetch();
?>

                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="./assets/product/<?=$fdata["pid"]?>.jpg" style="height:200px;width:223px;" alt="..." />   
                        </div>
                    </div>

                    <div class="col mb-5" style="width:500px;">
                        <div class="card h-100">
                        <form class="card-body cardbody-color p-lg-5" method="POST" action="" enctype="multipart/form-data">

                            <h6 class="fw-bolder">ชื่อสินค้า</h6>
                            <div class="mb-3">
                            <input type="text" class="form-control" name="pname" value="<?=$fdata["pname"]?>">
                            </div>

                            <h6 class="fw-bolder">รายละเอียดสินค้า</h6>
                            <div class="mb-3">
                            <textarea class="form-control" name="pdetail" ><?=$fdata["pdetail"]?></textarea>
                            </div>

                            <h6 class="fw-bolder">ราคาสินค้า</h6>
                            <div class="mb-3">
                            <input type="text" class="form-control" name="price" value="<?=$fdata["price"]?>">
                            </div>

                            <h6 class="fw-bolder">จำนวนสินค้า</h6>
                            <div class="mb-3">
                            <input type="text" class="form-control" name="pnum" value="<?=$fdata["pnum"]?>">
                            </div>

                            <h6 class="fw-bolder">ภาพสินค้า</h6>
                            <div class="mb-3">
                            <input type="file" class="form-control" name="pphoto">
                            </div>

                            <div class="d-flex">
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="./index.php?action=allproduct">ยกเลิก</a></div>
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
        $pid = $fdata["pid"];
        $pname = $_POST["pname"];
        $pdetail = $_POST["pdetail"];
        $price = $_POST["price"];
        $pnum = $_POST["pnum"];

        $update = $pdo->prepare("UPDATE product SET pname='$pname',pdetail='$pdetail',price='$price',pnum='$pnum' WHERE pid='$pid'");
        if($update->execute()){
            include "product_photo_upload.php";
            echo "<script>window.location='index.php?action=allproduct';</script>";
        }
    }
?>