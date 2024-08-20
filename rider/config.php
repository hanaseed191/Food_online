<?php
    session_start();
    include('../connect.php');
    if(isset($_POST["submit"]) or !empty($_FILES["file"]["name"])){
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
        $targetFilePath = $targetDir . $images;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
        // Allow certain file formats
        $allowTypes = array('jpg','png','jpeg','gif','pdf');
        if(in_array($fileType, $allowTypes)){
            // Upload file to server
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
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
                if($query){
                    echo "<script>alert('อัพเดทข้อมูลเสร็จสิ้น'); window.location = 'profile.php';</script>";
                } 

            }
        }

    }
    else{
        echo "<script>alert('ไม่สามารถอัพเดทข้อมูลเสร็จสิ้นได้'); window.location = 'profile.php';</script>";
    }


?>