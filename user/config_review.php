<?php
session_start();
include('../connect.php');
if (isset($_POST["add"])) {
    print_r($_POST);
    $mem_id =  $_SESSION['mem_id'];
    $res_name = $_POST['res_name'];
    $detail = $_POST['detail'];
    $sql = "INSERT INTO `review` (`review_id`, `res_name`, `mem_id`, `detail`) VALUES (NULL, '$res_name', '$mem_id', '$detail')";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        $_SESSION["status"] = 'success';
        header('Location: review.php');
        exit();
    }

} else if (isset($_GET["delete"])) {
    print_r($_GET);
    $review_id = intval($_GET['delete']);
    $sql = "DELETE FROM review WHERE review_id = '$review_id'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        $_SESSION["status"] = 'delete';
        header('Location: review.php');
        exit();
    }
}  else {
    $_SESSION["status"] = 'error';
    header('Location: review.php');
    exit();
}

?>