<?php
session_start();
include('../connect.php');
if (isset($_POST["add"])) {
    print_r($_POST);
    $mem_id = $_POST['mem_id'];
    $menu_id = $_POST['menu_id'];
    $res_id = $_POST['res_id'];
    $menu_name = $_POST['menu_name'];
    $menu_price = $_POST['menu_price'];
    $order_qty = $_POST['order_qty'];
    $sql = "INSERT INTO `sum` (`sum_id`, `mem_id`, `menu_id`, `res_id`, `menu_name`, `menu_price`, `order_qty`, `order_group`) VALUES (NULL, '$mem_id', '$menu_id', '$res_id', '$menu_name', '$menu_price', '$order_qty',NULL)";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        $_SESSION["status"] = 'add';
        header('Location: cart.php');
        exit();

    }

} else if (isset($_GET["delete"])) {
    print_r($_GET);
    $sum_id = intval($_GET['delete']);
    $sql = "DELETE FROM sum WHERE sum_id = '$sum_id'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        $_SESSION["status"] = 'delete';
        header('Location: cart.php');
        exit();
    }
} else if (isset($_POST["confirm"])) {
    print_r($_POST);
    $res_id = $_SESSION['res_id'];
    $mem_id = $_SESSION['mem_id'];
    $mem_name = $_POST['mem_name'];
    $mem_address = trim($_POST['mem_address']);
    $mem_phone = $_POST['mem_phone'];
    $mem_note = $_POST['mem_note'];
    $order_address = " Name : " . $mem_name . " Address : " . $mem_address . " Tel : " . $mem_phone;
    $order_qty = $_POST['order_qty'];
    $order_price = $_POST['order_price'];
    $order_date = date('Y-m-d');
    $order_group = rand(1, 1000);
    $sql_update = "UPDATE sum SET order_group = '$order_group' WHERE mem_id = '$mem_id' AND order_group IS NULL";
    $query_update = mysqli_query($conn, $sql_update);

    if ($query_update) {
        // INSERT INTO `orders` (`order_id`, `res_id`, `mem_id`, `menu_id`, `menu_name`, `order_qty`, `order_price`, `order_status`, `order_date`, `order_success`, `mem_status`, `order_group`, `mem_note`) VALUES (NULL, '1', '1', '1', '1', '1', '1', 'in_process', '2024-08-01', NULL, NULL, NULL, NULL);
        $sql = "INSERT INTO `orders` (`order_id`, `res_id`, `mem_id`,  `order_qty`, `order_price`, `order_status`, `order_date`, `order_success`, `mem_status`, `order_group`, `order_address`, `mem_note`) 
        VALUES (NULL, '$res_id', '$mem_id', '$order_qty', '$order_price', 'in_process',  '$order_date' , NULL, NULL,  $order_group, '$order_address', '$mem_note')";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            $_SESSION["status"] = 'success';
            header('Location: order.php');
            exit();
        }
    }

} else if (isset($_POST["coupon"])) {
    echo $use_coupon = $_POST["use_coupon"];
    $sql = "SELECT * FROM `coupon` WHERE coupon_name = '$use_coupon'";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array( $query );
    if ($result) {
       echo $_SESSION["coupon_discount"] = $result['coupon_discount'];    
        echo $_SESSION["status_coupon"] = 'coupon';
        header('Location: cart.php');
        exit();
    } else {
        $_SESSION["status_coupon"] = 'nocoupon';
        header('Location: cart.php');
        exit();
    }
} else {
    $_SESSION["status"] = 'error';
    header('Location: cart.php');
    exit();
}

?>