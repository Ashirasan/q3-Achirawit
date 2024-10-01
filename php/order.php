<?php
    if($_SESSION["username"]=="admin"){
        // $data = $pdo->prepare("SELECT * FROM order");
        $data = $pdo->prepare("SELECT name,username FROM member");
        $data->execute();
    }else{
        $data = $pdo->prepare("SELECT * FROM orders JOIN item ON orders.ord_id = item.ord_id JOIN product ON item.pid = product.pid WHERE username = ?");
        $data->bindparam(1,$_SESSION["username"]);
        $data->execute();
        // $fdata = $data->fetch();
    }
?>

<!-- Normal member -->
<?php
    if($_SESSION["username"]!="admin"){ 
        $save_ord_id = 0;
        $num = 0;
        while ($fdata=$data->fetch()) {
            $num++;
            if($save_ord_id != $fdata["ord_id"]){
                if($save_ord_id!=0){
                    echo "</tbody></table></div></div></div></div>";
                    $num = 1;
                } 
                ?>
                <div class="col mb-5" style="width:500px;">
                <div class="card h-100">
                <div class="card-body p-4">
                <div class="text-left">
                <h5 class="fw-bolder">รายการคำสั่งซื้อ</h5>
                <h5 >วันที่ <?=$fdata["ord_date"]?> สถานะ <?=$fdata["status"]?> </h5>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">ชื่อสินค้า</th>
                        <th scope="col">ราคา</th>
                        <th scope="col">จำนวน</th>
                    </tr>
                    </thead>
                    <tbody>
                <?php 
                $save_ord_id = $fdata["ord_id"];
            } ?>

        <tr>
        <th scope="row"><?=$num?></th>
        <td><?=$fdata["pname"]?></td>
        <td><?=$fdata["price"]?></td>
        <td><?=$fdata["quantity"]?></td>
        </tr>

        <?php
        }
        if($save_ord_id == 0){ ?>
            <div class="col mb-5" style="width:500px;">
                        <div class="card h-100">
                            <div class="card-body p-4">
                                <div class="text-left">
                                    <h5 class="fw-bolder">รายการคำสั่งซื้อ</h5>
                                    <h5 >ไม่พบคำสั่งซื้อ</h5>
                                </div>
                            </div>
                        </div>
                    </div>
        <?php
        }else{
            echo "</tbody></table></div></div></div></div>";
        }

    } 
    // end normal member
    else{ 
        ?>
        <div class="row">
        <div class="list-group" id="list-tab" role="tablist">
            <?php
                while($fdata = $data->fetch()){ 
                    if($fdata["username"]!="admin"){ 
                ?>
                    <a class="list-group-item list-group-item-action" href="?action=order&username=<?=$fdata["username"]?>" role="tab" aria-controls="list-home"><?=$fdata["name"]?></a>
                <?php
                    }
                }
            ?>
        </div>
        </div>

        <div class="col mb-5" style="width:700px;">
        <div class="card h-100">
        <div class="card-body p-4">   
        <div class="text-left">
        <h5 class="fw-bolder">รายการคำสั่งซื้อ</h5>
        <?php
            if($_GET["username"]!=""){
                $order = $pdo->prepare("SELECT * FROM orders JOIN item ON orders.ord_id = item.ord_id JOIN product ON item.pid = product.pid WHERE username = ?");
                $order->bindparam(1,$_GET["username"]);
                $order->execute();
                $save_ord_id = 0;
                $num = 0;
                while($forder=$order->fetch()){
                    $num++;
                    // crete head
                    if($save_ord_id!=$forder["ord_id"]){
                        if($save_ord_id!=0){
                            echo '</tbody></table>';
                            $num = 1;
                            //end
                        } ?>

                        <h5 >วันที่ <?=$forder["ord_date"]?> สถานะ <?=$forder["status"]?> </h5>
                        <table class="table">
                        <thead>
                        <tr>
                        <th scope="col"></th>
                        <th scope="col">ชื่อสินค้า</th>
                        <th scope="col">ราคา</th>
                        <th scope="col">จำนวน</th>
                        </tr>
                        </thead>
                        <tbody>
                    <?php
                    $save_ord_id = $forder["ord_id"];
                    } ?>
                    <!-- end if -->
                    <tr>
                    <th scope="row"><?=$num?></th>
                    <td><?=$forder["pname"]?></td>
                    <td><?=$forder["price"]?></td>
                    <td><?=$forder["quantity"]?></td>
                    </tr>
                
                <?php
                }
                if($save_ord_id!=0){
                    echo '</tbody></table>';
                }
            }
        ?>
        </div></div></div></div>    
    <?php
    }
?>
