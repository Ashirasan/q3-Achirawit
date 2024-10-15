
<?php
    $data = $pdo->prepare("SELECT * FROM member");
    $data->execute();

    while($fdata = $data->fetch()){ 
        if($fdata["username"]!="admin"){
        ?>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="./assets/member/<?=$fdata["username"]?>.jpg" style="height:200px;" alt="..." />
                            <!-- member details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- member name-->
                                    <h5 class="fw-bolder"><?=$fdata["name"]?></h5>
                                </div>
                            </div>
                            <!-- member actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="./index.php?action=showMdetial&member=<?=$fdata["username"]?>">รายะเอียดสมาชิก</a></div>
                            </div>
                        </div>
                    </div>
    <?php
        }
    }
?>
<script>
    var xmlHttp;
    var savedata = document.getElementById("data").innerHTML;
    function search(){
        // console.log("test");
        var div = document.getElementById("data");
        xmlHttp = new XMLHttpRequest();
        xmlHttp.onreadystatechange = showdata;
        var name = document.getElementById("searchname").value;
        var url = "./callphp/lab11_2_call.php?name=" + name;
        xmlHttp.open("GET",url);
        xmlHttp.send();
    }
    function showdata(){
        if(xmlHttp.readyState==4 && xmlHttp.status==200){
            console.log(xmlHttp.responseText);
            if(xmlHttp.responseText!=1){
                document.getElementById("data").innerHTML = xmlHttp.responseText;
            }else{
                document.getElementById("data").innerHTML = savedata;
            }
            
        }
    }
    function checkempty() {
        var input = document.getElementById("searchname");
        if(input.value==""){
            document.getElementById("data").innerHTML = savedata;
        }
    }
</script>