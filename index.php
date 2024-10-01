<?php include "./php/connect.php" ?>
<?php include "./php/checkLogin.php" ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>CS Pharmacy Shop</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="index.php">CS Pharmacy Shop</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">สินค้า</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="?action=allproduct">สินค้าทั้งหมด</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="?action=allproducttable">ตารางรายการสินค้า</a></li>
                                
                                <?php
                                    if($_SESSION["username"] == "admin"){
                                        echo "<li><hr class='dropdown-divider' /></li>";
                                        echo "<li><a class='dropdown-item' href='?action=insertproduct'>เพิ่มสินค้า</a></li>";
                                    }
                                ?>
                            </ul>
                        </li>
                        <!-- สมาชิกเฉพาะแอดมิน -->
                        <?php
                            if($_SESSION["username"]=="admin"){ ?>
                                <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">สมาชิก</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="?action=allmember">สมาชิกทั้งหมด</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="?action=allmembertable">ตารางสมาชิก</a></li>
                                <!-- <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="?action=allmembertable">เพิ่มสมาชิก</a></li> -->
                            </ul>
                        </li>
                            <?php
                            }
                        ?>
                        <!-- จบสมาชิก -->

                         <!-- คำสั่งซื้อ -->
                         <?php
                            if($_SESSION["username"]=="admin"){
                                echo '<li class="nav-item"><a class="nav-link active" aria-current="page" href="?action=order&username=">คำสั่งชื้อ</a></li>';
                            }else{
                                echo '<li class="nav-item"><a class="nav-link active" aria-current="page" href="?action=order">คำสั่งชื้อ</a></li>';
                            }
                         ?>
                         <!-- end คำสั่งชื้อ -->

                    </ul>
                    <div style="padding-left:20px;padding-top:5px">
                        <h5 class="fw-bolder"><?=$_SESSION["name"]?></h5>
                    </div>

                    <?php
                        if($_SESSION["username"]!="admin"){ ?>
                         <!-- cart -->
                        <form class="d-flex" style="padding-left:20px" action="?action=cart">
                        <a class="btn btn-outline-dark" href="?action=cart">
                        <i class="bi-cart-fill me-1"></i>
                        Cart
                        <!-- <span class="badge bg-dark text-white ms-1 rounded-pill">0</span> -->
                        </a>
                    </form>

                    <?php
                        }
                    ?>
                    
                    <!-- logout -->
                    <form class="d-flex" style="padding-left:20px" action="./php/logout.php">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Logout
                        </button>
                    </form>

                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Shop medicine</h1>
                    <p class="lead fw-normal text-white-50 mb-0">With CS Pharmacy Shop</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php 
              if($_GET){
                if($_GET["action"]=="allproduct"){ 
                    include "./php/allproduct.php";
                }else if($_GET["action"]=="showPdetial"){
                    include "./php/showproductDetail.php";
                }else if($_GET["action"]=="editproduct"){
                    include "./php/editproduct.php";
                }else if($_GET["action"]=="insertproduct"){
                    include "./php/insertproduct.php";
                }else if($_GET["action"]=="allproducttable"){
                    include "./php/allproducttable.php";
                }else if($_GET["action"]=="allmember"){
                    include "./php/allmember.php";
                }else if($_GET["action"]=="showMdetial"){
                    include "./php/showmemberDetail.php";
                }else if($_GET["action"]=="editmember"){
                    include "./php/editmember.php";
                }else if($_GET["action"]=="allmembertable"){
                    include "./php/allmembertable.php";
                }else if($_GET["action"]=="order"){
                    include "./php/order.php";
                }else if($_GET["action"]=="cart"){
                    include "./php/cart.php";
                }
              

              }else{ ?>
                <!-- เพื่อใส่อะไรหน้า Home -->
                <div style="height:300px"></div>
            <?php
              }
            ?>
            </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <!-- <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div> -->
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
