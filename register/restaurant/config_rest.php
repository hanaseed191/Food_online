<?php
session_start();
include('../connect.php');
print_r($_POST);
if (isset($_POST["update"]) and !empty($_FILES["file"]["name"])) {
    $res_id = $_POST['res_id'];
    $cate_id = $_POST['cate_id'];
    $res_name = $_POST['res_name'];
    $res_mail = $_POST['res_mail'];
    $res_phone = $_POST['res_phone'];
    $o_hr = $_POST['o_hr'];
    $c_hr = $_POST['c_hr'];
    $o_day = $_POST['o_day'];
    $res_address = $_POST['res_address'];
    $mem_id = $_POST['mem_id'];
    $images = basename($_FILES["file"]["name"]);
    $targetDir = "../asset/uploads/";
    $targetFilePath = $targetDir . $images;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    // Allow certain file formats
    $allowTypes = array('JPG', 'jpg', 'png', 'jpeg', 'gif', 'pdf');
    if (in_array($fileType, $allowTypes)) {
        // Upload file to server
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
            // Insert image file name into database
            $sql = "UPDATE restaurant SET 
                cate_id='$cate_id',
                res_name='$res_name',
                res_mail='$res_mail',
                res_phone='$res_phone',
                o_hr='$o_hr',
                c_hr='$c_hr',
                o_day='$o_day',
                res_address='$res_address',
                res_img='$images',
                mem_id='$mem_id'
                WHERE res_id='$res_id' ";
            $query = mysqli_query($conn, $sql);
            if ($query) {
                $_SESSION["status"] = 'success';
                header('Location: manage_rest.php');
                exit();
            }

        }
    }

} else {
    $_SESSION["status"] = 'danger';
    header('Location: manage_rest.php');
    exit();
}
?>