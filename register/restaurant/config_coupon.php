<?php 
    session_start();
    include('../connect.php');
    if (isset($_POST['insert'])){
        $coupon_name = $_POST['coupon_name'];
        $coupon_discount = $_POST['coupon_discount'];
        $sql = "INSERT INTO coupon VALUES (NULL,'$coupon_name','$coupon_discount')";
        $query = mysqli_query($conn,$sql);
        if($query){
            $_SESSION["status"] = 'success';
            header('Location: manage_coupon.php');
            exit();        }
    }else if (isset($_POST['update'])){
        $coupon_id = $_POST['coupon_id'];
        $coupon_name = $_POST['coupon_name'];
        $coupon_discount = $_POST['coupon_discount'];
        $sql = "UPDATE coupon SET coupon_name = '$coupon_name', coupon_discount = '$coupon_discount' WHERE coupon_id = '$coupon_id'";
        $query = mysqli_query($conn,$sql);
        if($query){
            $_SESSION["status"] = 'success';
            header('Location: manage_coupon.php');
            exit();        }
    }else if (isset($_POST['delete'])){
        $coupon_id = $_POST['coupon_id'];
        $sql = "DELETE FROM coupon WHERE coupon_id = '$coupon_id'";
        $query = mysqli_query($conn,$sql);
        if($query){
            $_SESSION["status"] = 'success';
            header('Location: manage_coupon.php');
            exit();        }
    }
?>