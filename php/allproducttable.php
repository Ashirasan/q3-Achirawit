<?php
    $data = $pdo->prepare("SELECT * FROM product");
    $data->execute();    
    $num = 0;
    ?>
    <table class="table">
        <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">ชื่อสินค้า</th>
            <th scope="col">รายละเอียดสินค้า</th>
            <th scope="col">ราคาสินค้า</th>
            <?php
                if($_SESSION["username"]=="admin"){
                    echo "<th scope='col' >จำนวนสินค้า</th>";
                    echo "<th scope='col' style='width:200px;'></th>";
                    echo "<th scope='col' style='width:200px;'></th>";
                }
            ?>
        </tr>
        </thead>
        <tbody>
    <?php
    while($fdata = $data->fetch()){ $num++; ?>
    <tr>
        <th scope="row"><?=$num?></th>
        <td><?=$fdata["pname"]?></td>
        <td><?=$fdata["pdetail"]?></td>
        <td><?=$fdata["price"]?></td>
        <?php
                if($_SESSION["username"]=="admin"){ ?>
                    <td><?=$fdata["pnum"]?></td>
                    <td>
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="./index.php?action=editproduct&product=<?=$fdata["pid"]?>">แก้ไขสินค้า</a></div>
                        </div>
                    </td>
                    <td>
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="./php/deleteproduct.php?pid=<?=$fdata["pid"]?>">ลบสินค้า</a></div>
                        </div>
                    </td>

                <?php
                }
        ?>
    </tr> 
    <?php
    }
?>  
    </tbody>
    </table>