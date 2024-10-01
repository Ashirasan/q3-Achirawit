<?php
    $num = 0;
?>

<?php
    if(empty($_SESSION["cart"])){ ?>
    <table class="table">
    <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">ชื่อสินค้า</th>
            <th scope="col">ราคาสินค้า</th>
            <th scope="col" style="text-align:center;width:100px;">จำนวน</th>
            <th scope="col">ราคารวม</th>
            <th scope="col" ></th>
        </tr>
    </thead>
    </table>
    
    <h5 class="fw-bolder pt-4">ไม่มีรายการสินค้าในตะกร้า</h5>
    
    <?php
    }else{ ?>
    <table class="table">
    <thead>
        <tr>
            <th scope="col" style="text-align:center;width:20px;"></th>
            <th scope="col">ชื่อสินค้า</th>
            <th scope="col">ราคาสินค้า</th>
            <th scope="col" style="text-align:center;width:200px;">จำนวน</th>
            <th scope="col">ราคารวม</th>
            <th scope="col" ></th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($_SESSION["cart"] as $fdata){ 
                $num++;   ?>
                <tr>
                <th scope="row"><?=$num?></th>
                <td><?=$fdata["pname"]?></td>
                <td><?=$fdata["price"]?></td>
                
                <td style="text-align:center;"><?=$fdata["qty"]?></td>
                
                <td><?=$fdata["price"]*$fdata["qty"]?> บาท</td>

                <!-- ยกเลิก -->
                <td>
                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="./php/cartsession.php?action=update_cancel&pid=<?=$fdata["pid"]?>&index=<?=$num?>">ยกเลิก</a></div>
                </div>
                </td>
                </tr>

                

        <?php
            }
        ?>
        <tr>
            <th></th><td></td><td></td><td></td><td></td>
            <td>
            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="./php/cartsession.php?action=confirm">ยืนยัน</a></div>
            </div>
            </td>
        </tr>
    </tbody>
    </table>
     
<?php
    }
?>

<script>
    function plus() {
        
    }
    function minus(cart_item) {
        console.log("test");
        console.log(cart_item);
        
        
    }
</script>