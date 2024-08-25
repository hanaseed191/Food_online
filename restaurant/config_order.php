<?php
include('../connect.php');
session_start();
if (isset($_POST["cancle"])) {
    $order_id = $_POST['order_id'];
    $order_status = $_POST['order_status'];
    $sql = "UPDATE orders SET order_status = 'cancle' WHERE order_id = '$order_id' ";
    $query = mysqli_query($conn, $sql);
        if ($query) {
            $_SESSION["status"] = 'cancle';
            header('Location: manage_order.php');
            exit();
        }
}
?>