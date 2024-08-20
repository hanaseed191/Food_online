<?php
include('../connect.php');
session_start(); 
if (isset($_POST["submit"]) && !empty($_FILES["file"]["name"])) {
    $mem_user = $_POST['mem_user'];
    $mem_pass = $_POST['mem_pass'];
    $mem_name = $_POST['mem_name'];
    $mem_last = $_POST['mem_last'];
    $mem_mail = $_POST['mem_mail'];
    $mem_phone = $_POST['mem_phone'];
    $mem_address = $_POST['mem_address'];
    $mem_status = $_POST['mem_status'];
    $mem_img = basename($_FILES["file"]["name"]);
    $targetDir = "../asset/uploads/";
    $targetFilePath = $targetDir . $mem_img;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    // Allow certain file formats
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
    if (in_array($fileType, $allowTypes)) {
        // Upload file to server
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
            // Insert image file name into database
            $sql = "INSERT INTO member(mem_id, mem_user, mem_pass, mem_name, mem_last, mem_mail, mem_phone, mem_img, mem_address, mem_status, mem_check) 
                VALUES (NULL, '$mem_user', '$mem_pass', '$mem_name', '$mem_last', '$mem_mail', '$mem_phone', '$mem_img', '$mem_address', '$mem_status', 'disable')";
            $query = mysqli_query($conn, $sql);
            if ($query) {
                $_SESSION["status"] = 'success'; 
                header('Location: ../index.php'); 
                exit();
            }
        }
    } else {
        $_SESSION["status"] = 'warning'; 
        header('Location: ../index.php'); 
        exit();
    }
} else {
    $_SESSION["status"] = 'warning'; 
    header('Location: ../index.php'); 
    exit();
}
?>
