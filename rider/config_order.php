<?php
session_start();
include('../connect.php');
if (isset($_POST["receive"])) {
    $order_id = $_POST['order_id'];
    $order_status = $_POST['order_status'];
    $sql = "UPDATE orders SET order_status = 'waiting' , mem_status = 'rider' WHERE order_id = '$order_id' ";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        $_SESSION["status"] = 'waiting';
        header('Location: order.php');
        exit();
    }
} else if (isset($_POST["re_order"])) {
    $order_id = $_POST['order_id'];
    $order_status = $_POST['order_status'];
    $sql = "UPDATE orders SET order_status = 'delivery' WHERE order_id = '$order_id' ";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        $_SESSION["status"] = 'delivery';
        header('Location: order.php');
        exit();
    }
} else if (isset($_POST["success"])) {
    $order_id = $_POST['order_id'];
    $order_status = $_POST['order_status'];
    $sql = "UPDATE orders SET order_status = 'success' WHERE order_id = '$order_id' ";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        $_SESSION["status"] = 'success';
        header('Location: order.php');
        exit();
    }
} else if (isset($_POST["cancle"])) {
    $order_id = $_POST['order_id'];
    $order_status = $_POST['order_status'];
    $sql = "UPDATE orders SET order_status = 'cancle' WHERE order_id = '$order_id' ";
    $query = mysqli_query($conn, $sql);
        if ($query) {
            $_SESSION["status"] = 'cancle';
            header('Location: order.php');
            exit();
        }
}

?>