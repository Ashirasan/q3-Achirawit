<?php
    $data = $pdo->prepare("SELECT * FROM member");
    $data->execute();    
    $num = 0;
    ?>
    <table class="table">
        <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">ชื่อ-นามสกุล</th>
            <th scope="col">ที่อยู่</th>
            <th scope="col">เบอร์โทร</th>
            <th scope="col">Email</th>
            <th scope="col">Password</th>
            <?php
                if($_SESSION["username"]=="admin"){
                    echo "<th scope='col' style='width:100px;'></th>";
                    echo "<th scope='col' style='width:100px;'></th>";
                }
            ?>
        </tr>
        </thead>
        <tbody>
    <?php
    while($fdata = $data->fetch()){ $num++; ?>
    <tr>
        <th scope="row"><?=$num?></th>
        <td><?=$fdata["name"]?></td>
        <td><?=$fdata["address"]?></td>
        <td><?=$fdata["mobile"]?></td>
        <td><?=$fdata["email"]?></td>
        <td><?=$fdata["password"]?></td>
        <?php
                if($_SESSION["username"]=="admin"){ ?>
                    <td>
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="./index.php?action=editmember&username=<?=$fdata["username"]?>">แก้ไข</a></div>
                        </div>
                    </td>
                    <td>
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="./php/deletemember.php?username=<?=$fdata["username"]?>">ลบ</a></div>
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