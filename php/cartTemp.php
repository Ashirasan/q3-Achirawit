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
            <th scope="col" style="width:100px;"></th>
            <th scope="col" style="text-align:center;width:100px;">จำนวน</th>
            <th scope="col" style="width:100px;"></th>
            <th scope="col">ราคารวม</th>
        </tr>
    </thead>
    </table>
    
    <h5 class="fw-bolder pt-4">ไม่มีรายการสินค้าในตะกร้า</h5>
    
    <?php
    }else{ ?>
    <table class="table">
    <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">ชื่อสินค้า</th>
            <th scope="col">ราคาสินค้า</th>
            <th scope="col" style="width:100px;"></th>
            <th scope="col" style="text-align:center;width:100px;">จำนวน</th>
            <th scope="col" style="width:100px;"></th>
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

                <!-- ลบ -->
                <td>
                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="./php/cartsession.php?action=update_minus&pid=<?=$fdata["pid"]?>&pnum=<?=$fdata["pnum"]?>&index=<?=$num?>">-</a></div>
                </div>
                </td>
                
                <td style="text-align:center;"><?=$fdata["qty"]?></td>
                
                <!-- เพิ่ม -->
                <td>
                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="./php/cartsession.php?action=update_plus&pid=<?=$fdata["pid"]?>&pnum=<?=$fdata["pnum"]?>">+</a></div>
                </div>
                </td>

                <td><?=$fdata["price"]*$fdata["qty"]?> บาท</td>
                </tr>

                <!-- ยกเลิก -->
                <td>
                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="./php/cartsession.php?action=update_cancel&pid=<?=$fdata["pid"]?>">ยกเลิก</a></div>
                </div>
                </td>

        <?php
            }
        ?>
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