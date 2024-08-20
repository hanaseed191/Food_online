<?php
session_start();
include('../connect.php');
if (isset($_POST['insert'])) {
    $cate_id = $_POST['cate_id'];
    $cate_name = $_POST['cate_name'];
    $sql = "INSERT INTO cate_res (cate_id, cate_name) VALUES (NULL, '$cate_name'); ";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        $_SESSION["status"] = 'success';
        header('Location: manage_cate.php');
        exit();
    }
} else if (isset($_POST['update'])) {
    $cate_id = $_POST['cate_id'];
    $cate_name = $_POST['cate_name'];
    $sql = "UPDATE cate_res SET cate_name = '$cate_name' WHERE cate_id = '$cate_id'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        $_SESSION["status"] = 'success';
        header('Location: manage_cate.php');
        exit();
    }
} else if (isset($_POST['delete'])) {
    $cate_id = $_POST['cate_id'];
    $sql = "DELETE FROM cate_res WHERE cate_id = '$cate_id'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        $_SESSION["status"] = 'success';
        header('Location: manage_cate.php');
        exit();
    }
}
?>