<?php 
    include('../connect.php');
    if(isset($_POST["receive"])){
        $order_id = $_POST['order_id'];
        $order_status = $_POST['order_status'];
        $sql = "UPDATE orders SET order_status = 'waiting' , mem_status = 'rider' WHERE order_id = '$order_id' ";
        $query = mysqli_query($conn,$sql);
        if($query){
            echo "<script>alert('อัพเดทออเดอร์เสร็จสิ้น'); window.location = 'order.php';</script>";
        }
    }else if(isset($_POST["re_order"])){
        $order_id = $_POST['order_id'];
        $order_status = $_POST['order_status'];
        $sql = "UPDATE orders SET order_status = 'delivery' WHERE order_id = '$order_id' ";
        $query = mysqli_query($conn,$sql);
        if($query){
            echo "<script>alert('อัพเดทออเดอร์เสร็จสิ้น'); window.location = 'order.php';</script>";
        }
    }else if(isset($_POST["success"])){
        $order_id = $_POST['order_id'];
        $order_status = $_POST['order_status'];
        $sql = "UPDATE orders SET order_status = 'success' WHERE order_id = '$order_id' ";
        $query = mysqli_query($conn,$sql);
        if($query){
            echo "<script>alert('อัพเดทออเดอร์เสร็จสิ้น'); window.location = 'order.php';</script>";
        }
    }

?>