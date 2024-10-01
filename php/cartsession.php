<?php
session_start();
// print($_SESSION["username"]);
    
    
    if(empty($_SESSION["cart"])){
        $_SESSION["cart"] = array();
    }
    
    if($_GET["action"]=="add"){
        $pid = $_GET["pid"];
        $cart_item = array(
            "pid" => $_GET["pid"],
            "pname" => $_GET["pname"],
            "price" => $_GET["price"],
            "qty" => $_POST["qty"],
            "pnum" => $_GET["pnum"]
        );

        if(array_key_exists($pid,$_SESSION["cart"])){
            // alreay have cart_item
            if($_SESSION["cart"][$pid]["qty"]+$_POST["qty"] > $_GET["pnum"]){
                echo '<script>alert("สินค้าไม่เพียงพอ");</script>';
                echo "<script>window.location='../index.php?action=allproduct';</script>"; 
            }else{
                $_SESSION["cart"][$pid]["qty"] += $_POST["qty"];
                echo "<script>window.location='../index.php?action=cart';</script>"; 
            }
        }else{
            // not have cart_item
            if($_POST["qty"] > $_GET["pnum"]){
                echo '<script>alert("สินค้าไม่เพียงพอ");</script>';
                echo "<script>window.location='../index.php?action=allproduct';</script>";
            }else{
                $_SESSION["cart"][$pid] = $cart_item;
                echo "<script>window.location='../index.php?action=cart';</script>";
            }        
        }
    }

    if($_GET["action"]=="update_plus"){
        if($_SESSION["cart"][$pid]["qty"]+1 > $_GET["pnum"]){
            echo '<script>alert("สินค้าไม่เพียงพอ");</script>';
            echo "<script>window.location='../index.php?action=cart';</script>"; 
        }else{
            $_SESSION["cart"][$pid]["qty"] += 1;
            echo "<script>window.location='../index.php?action=cart';</script>"; 
        }
    }else if($_GET["action"]=="update_minus"){
        if($_SESSION["cart"][$pid]["qty"]-1 <= 0){
            array_splice($_SESSION["cart"],$_GET["index"]-1,1);
            // unset($_SESSION["cart"][$_GET["index"]-1]);
            echo "<script>window.location='../index.php?action=cart';</script>";  
        }else{
            $_SESSION["cart"][$pid]["qty"] -= 1;
            echo "<script>window.location='../index.php?action=cart';</script>";    
        }
    }else if($_GET["action"]=="update_cancel"){
        array_splice($_SESSION["cart"],$_GET["index"]-1,1);
        echo "<script>window.location='../index.php?action=cart';</script>";
    }


    if($_GET["action"]=="confirm"){
        // print(date("Y-m-d") ." " . date("H:i:s"));
        include "./connect.php";
        $username = $_SESSION["username"];
        $date = date("Y-m-d") ." " . date("H:i:s");
        $status = "wait";
        print($date);
        //create order
        $order = $pdo->prepare("INSERT INTO orders (orders.username,orders.ord_date,orders.status) VALUE (?,?,?)");
        $order->bindParam(1,$username);
        $order->bindParam(2,$date);
        $order->bindParam(3,$status);
        if($order->execute()){
            $ord_id = $pdo->lastInsertId();
            foreach($_SESSION["cart"] as $data){
                $pid = $data["pid"];
                $qty = $data["qty"];
                $item = $pdo->prepare("INSERT INTO item (item.ord_id,item.pid,item.quantity) VALUE (?,?,?)");
                $item->bindParam(1,$ord_id);
                $item->bindParam(2,$pid);
                $item->bindParam(3,$qty);  
                if($item->execute()){
                    $pnum = $data["pnum"] - $qty;
                    $product = $pdo->prepare("UPDATE product SET product.pnum='$pnum' WHERE product.pid='$pid'");
                    if($product->execute()){
                        unset($_SESSION["cart"]);
                        echo "<script>window.location='../index.php?action=order';</script>";
                    }
                }
             }
        }
        
        // print_r($_SESSION["cart"]);

    }
?>