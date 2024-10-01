
<?php
    $data = $pdo->prepare("SELECT * FROM product");
    $data->execute();

    while($fdata = $data->fetch()){ ?>
        
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="./assets/product/<?=$fdata["pid"]?>.jpg" style="height:200px;" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?=$fdata["pname"]?></h5>
                                    <!-- Product price-->
                                    ราคา <?=$fdata["price"]?> บาท
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="./index.php?action=showPdetial&product=<?=$fdata["pid"]?>">รายละเอียดสินค้า</a></div>
                            </div>
                            
                            <?php
                                if($_SESSION["username"]!="admin"){ ?>
                                <form class="cardbody-color ps-5 pe-5 " method="post" action="./php/cartsession.php?action=add&pid=<?=$fdata["pid"]?>&pname=<?=$fdata["pname"]?>&price=<?=$fdata["price"]?>&pnum=<?=$fdata["pnum"]?>">
                                <!-- no max -->
                                <input type="number" class="form-control" name="qty" required min="0">
                                <div class="card-footer p-4 pt-2 border-top-0 bg-transparent">
                                <div class="text-center"><button type="submit" class="btn btn-outline-dark mt-auto">เพิ่มไปที่ตะกร้า</button></div>
                                </div>
                            </form>    
                                
                            <?php
                                }
                            ?>
                        </div>
                    </div>
    <?php
    }
?>
<script>
window.onload = function() {
    if(!window.location.hash) {
        window.location = window.location + '#loaded';
        window.location.reload();
    }
}
</script>