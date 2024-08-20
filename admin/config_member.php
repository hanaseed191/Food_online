<?php
session_start();
include('../connect.php');
if (isset($_POST["submit"]) or !empty($_FILES["file"]["name"])) {
    print_r($_FILES);
    $mem_id = $_POST['mem_id'];
    $mem_user = $_POST['mem_user'];
    $mem_pass = $_POST['mem_pass'];
    $mem_name = $_POST['mem_name'];
    $mem_last = $_POST['mem_last'];
    $mem_mail = $_POST['mem_mail'];
    $mem_phone = $_POST['mem_phone'];
    $mem_address = $_POST['mem_address'];
    $mem_status = $_POST['mem_status'];
    $mem_check = $_POST['mem_check'];
    $images = basename($_FILES["file"]["name"]);
    $targetDir = "../asset/uploads/";
    $redirect = $_POST["redirect"];
    $targetFilePath = $targetDir . $images;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    // Allow certain file formats
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
    if (in_array($fileType, $allowTypes)) {
        // Upload file to server
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
            // Insert image file name into database
            $sql = "UPDATE member SET 
                mem_user='$mem_user',
                mem_pass='$mem_pass',
                mem_name='$mem_name',
                mem_last='$mem_last',
                mem_mail='$mem_mail',
                mem_phone='$mem_phone',
                mem_img='$images',
                mem_address='$mem_address',
                mem_status='$mem_status',
                mem_check='$mem_check' WHERE mem_id = '$mem_id'";
            $query = mysqli_query($conn, $sql);
            if ($query) {
                $_SESSION["status"] = 'success';
                if ($redirect == 'admin') {
                    header('Location: ./profile.php');
                    exit();
                } else if ($redirect == 'restaurant') {
                    header('Location: ../restaurant/profile.php');
                    exit();
                } else if ($redirect == 'rider') {
                    header('Location: ../rider/profile.php');
                    exit();
                } else if ($redirect == 'user') {
                    header('Location: ../user/profile.php');
                    exit();
                }
            }

        }
    }
} else if (isset($_POST['enable'])) {
    $mem_id = $_POST['mem_id'];
    $sql_check = "SELECT * FROM restaurant WHERE mem_id = '$mem_id'";
    $query_check = mysqli_query($conn, $sql_check);
    $result_check = mysqli_fetch_array($query_check);
    if ($result_check) {
        $sql = "UPDATE member SET mem_check = 'enable' WHERE mem_id = '$mem_id'";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            $_SESSION["status"] = 'success';
            header('Location: allow_member.php');
            exit();
        }
    } else if (!$result_check) {
        $sql1 = "INSERT INTO restaurant(res_id, cate_id, res_name, res_mail, res_phone, o_hr, c_hr, o_day, res_address, res_img, mem_id)
            VALUES (NULL,'1','','','','','','','','','$mem_id')";
        $query1 = mysqli_query($conn, $sql1);
        if ($query1) {
            $_SESSION["status"] = 'success';
            header('Location: allow_member.php');
            exit();
        }
    }

} else if (isset($_POST['update'])) {
    $mem_id = $_POST['mem_id'];
    $mem_user = $_POST['mem_user'];
    $mem_pass = $_POST['mem_pass'];
    $mem_name = $_POST['mem_name'];
    $mem_last = $_POST['mem_last'];
    $mem_mail = $_POST['mem_mail'];
    $mem_phone = $_POST['mem_phone'];
    $mem_address = $_POST['mem_address'];
    $mem_status = $_POST['mem_status'];
    $mem_check = $_POST['mem_check'];
    $sql = "UPDATE member SET 
                mem_user='$mem_user',
                mem_pass='$mem_pass',
                mem_name='$mem_name',
                mem_last='$mem_last',
                mem_mail='$mem_mail',
                mem_phone='$mem_phone',
                mem_address='$mem_address',
                mem_status='$mem_status',
                mem_check='$mem_check'
                WHERE member.mem_id = '$mem_id' ";

    $query = mysqli_query($conn, $sql);
    if ($query) {
        $_SESSION["status"] = 'success';
        header('Location: manage_member.php');
        exit();
    }
} else if (isset($_POST['delete'])) {
    $mem_id = $_POST['mem_id'];
    echo $mem_id;
    $sql = "DELETE FROM member WHERE mem_id = '$mem_id' ";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        $_SESSION["status"] = 'success';
        header('Location: manage_member.php');
        exit();
    }
} else if (isset($_POST['insert'])) {
    $mem_id = $_POST['mem_id'];
    $mem_user = $_POST['mem_user'];
    $mem_pass = $_POST['mem_pass'];
    $mem_name = $_POST['mem_name'];
    $mem_last = $_POST['mem_last'];
    $mem_mail = $_POST['mem_mail'];
    $mem_phone = $_POST['mem_phone'];
    $mem_address = $_POST['mem_address'];
    $mem_img = $_POST['mem_img'];
    $mem_status = $_POST['mem_status'];
    $mem_check = $_POST['mem_check'];

    $sql = "INSERT INTO member(mem_id, mem_user, mem_pass, mem_name, mem_last, mem_mail, mem_phone, mem_img, mem_address, mem_status, mem_check) 
                VALUES ('','$mem_user','$mem_pass','$mem_name','$mem_last','$mem_mail','$mem_phone','$mem_img','$mem_address','$mem_status','$mem_check')";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        $_SESSION["status"] = 'success';
        header('Location: manage_member.php');
        exit();
    }
} else {
    $_SESSION["status"] = 'warning';
    header('Location: profile.php');
    exit();
}


?>