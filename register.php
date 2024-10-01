<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="./css/login.css" rel="stylesheet">
    <title>CS Shop register</title>
  </head>
  <body>
  <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="card my-5">

          <form class="card-body cardbody-color p-lg-5" method="POST" action="" enctype="multipart/form-data">

            <div class="text-center">
              <img src="./assets/cslogo.jpg" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                width="200px" alt="profile">
            </div>

            <div class="mb-3">
              <input type="text" class="form-control" id="Username" aria-describedby="emailHelp"
                placeholder="Username" name="username">
            </div>
            <div class="mb-3">
              <input type="password" class="form-control" id="password" placeholder="Password" name="password">
            </div>
            <div class="mb-3">
              <input type="text" class="form-control" id="name" placeholder="ชื่อ-นามสกุล" name="name">
            </div>
            <div class="mb-3">
              <input type="text" class="form-control" id="address" placeholder="ที่อยู่" name="address">
            </div>
            <div class="mb-3">
              <input type="text" class="form-control" id="mobile" placeholder="หมายเลขโทรศัพท์" name="mobile">
            </div>
            <div class="mb-3">
              <input type="text" class="form-control" id="email" placeholder="Email" name="email">
            </div>
            <div class="mb-3">
                <input type="file" class="form-control" id="mphoto" name="mphoto">
            </div>
            <div class="text-center"><button type="submit" class="btn btn-color px-5 mb-5 w-100">สมัครสมาชิก</button></div>
            <div id="emailHelp" class="form-text text-center mb-5 text-dark">Already register? <a href="./login.php" class="text-dark fw-bold"> Go to Login</a>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>

<?php include "./php/connect.php" ?>
<?php
    if($_POST){
      $username = $_POST["username"];
      $password = $_POST["password"];
      $name = $_POST["name"];
      $address = $_POST["address"];
      $mobile = $_POST["mobile"];
      $email = $_POST["email"];
      
      $insert = $pdo->prepare("INSERT INTO member (member.username,member.password,member.name,member.address,member.mobile,member.email) VALUE (?,?,?,?,?,?)");
      $insert->bindParam(1,$username);
      $insert->bindParam(2,$password);
      $insert->bindParam(3,$name);
      $insert->bindParam(4,$address);
      $insert->bindParam(5,$mobile);
      $insert->bindParam(6,$email);
        
        if($insert->execute()){
            include "./php/member_photo_upload.php";
            session_start();
            session_regenerate_id();
            $_SESSION["name"] = $name;
            $_SESSION["username"] = $username;
            header("location:index.php");

        }
        // else{
        //     $message = "Username หรือ Password ไม่ถูกต้อง";
        //     echo "<script type='text/javascript'>alert('$message');</script>";
        // }
    }
?>