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
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?=$fdata["pname"]?></h5>
                                    <!-- Product price-->
                                    ราคา <?=$fdata["price"]?> บาท <br>
                                    <?php 
                                        if($_SESSION["username"]=="admin"){ ?>
                                            จำนวนคงเหลือ <?=$fdata["pnum"]?> ชิ้น
                                        
                                    <?php    
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col mb-5" style="width:500px;">
                        <div class="card h-100">
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-left">
                                    <h5 class="fw-bolder">รายละเอียดสินค้า</h5>
                                    <!-- Product price-->
                                    <?=$fdata["pdetail"]?> 
                                </div>
                            </div>
                            <?php 
                                if($_SESSION["username"] == "admin"){ ?>
                                <div class="d-flex">
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="./index.php?action=editproduct&product=<?=$fdata["pid"]?>">แก้ไขสินค้า</a></div>
                                    </div>

                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="./php/deleteproduct.php?pid=<?=$fdata["pid"]?>">ลบสินค้า</a></div>
                                    </div>
                                </div>
                                <?php
                                }
                            ?>
                        </div>
                    </div>