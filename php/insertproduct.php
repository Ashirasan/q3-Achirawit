<div class="col mb-5" style="width:500px;">
                        <div class="card h-100">
                        <form class="card-body cardbody-color p-lg-5" method="POST" action="" enctype="multipart/form-data">
                            <h3 class="fw-bolder">เพิ่มสินค้าใหม่</h3>
                            <h6 class="fw-bolder">ชื่อสินค้า</h6>
                            <div class="mb-3">
                            <input type="text" class="form-control" name="pname">
                            </div>

                            <h6 class="fw-bolder">รายละเอียดสินค้า</h6>
                            <div class="mb-3">
                            <textarea class="form-control" name="pdetail" ></textarea>
                            </div>

                            <h6 class="fw-bolder">ราคาสินค้า</h6>
                            <div class="mb-3">
                            <input type="text" class="form-control" name="price">
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
        $pname = $_POST["pname"];
        $pdetail = $_POST["pdetail"];
        $price = $_POST["price"];

        $insert = $pdo->prepare("INSERT INTO product (pname,pdetail,price) VALUE (?,?,?)");
        $insert->bindParam(1,$pname);
        $insert->bindParam(2,$pdetail);
        $insert->bindParam(3,$price);
        
        if($insert->execute()){
            $pid = $pdo->lastInsertId();
            // print_r($pid = $pdo->lastInsertId());
            include "product_photo_upload.php";
            echo "<script>window.location='index.php?action=allproduct';</script>";
        }
    }
?>