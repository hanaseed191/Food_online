<?php
session_start();
include('../connect.php');
if (isset($_POST['insert'])) {
    print_r($_POST);
    $cate_menu_name = $_POST['cate_menu_name'];
    $sql = "INSERT INTO cate_menu VALUES (NULL,'$cate_menu_name')";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        $_SESSION["status"] = 'success';
        header('Location: manage_cate.php');
        exit();
    }
} else if (isset($_POST['update'])) {
    $cate_menu_id = $_POST['cate_menu_id'];
    $cate_menu_name = $_POST['cate_menu_name'];
    $sql = "UPDATE cate_menu SET cate_menu_name = '$cate_menu_name' WHERE cate_menu_id = '$cate_menu_id'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        $_SESSION["status"] = 'success';
        header('Location: manage_cate.php');
        exit();
    }
} else if (isset($_POST['delete'])) {
    $cate_menu_id = $_POST['cate_menu_id'];
    $sql = "DELETE FROM cate_menu WHERE cate_menu_id = '$cate_menu_id'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        $_SESSION["status"] = 'success';
        header('Location: manage_cate.php');
        exit();
    }
}
?>