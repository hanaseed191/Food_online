<?php
    session_start();
    include('connect.php');
    if($_POST){
        $mem_user = $_POST['mem_user'];
        $mem_pass = $_POST['mem_pass'];
    $sql = "SELECT * FROM member WHERE mem_user = '$mem_user' and mem_pass = '$mem_pass' " ;
    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query)==1){
        $result = mysqli_fetch_array($query);
        $_SESSION["mem_id"] = $result['mem_id'];
        $_SESSION["mem_user"] = $result['mem_user'];
        $_SESSION["mem_pass"] = $result['mem_pass'];
        $_SESSION["mem_name"] = $result['mem_name'];
        $_SESSION["mem_last"] = $result['mem_last'];
        $_SESSION["mem_status"] = $result['mem_status'];
        $_SESSION["mem_check"] = $result['mem_check'];

        if($_SESSION["mem_status"]=="admin" && $_SESSION["mem_check"]=="enable"){
            header('location: admin/index.php');
        } else if($_SESSION["mem_status"]=="user" && $_SESSION["mem_check"]=="enable"){
            header('location: user/index.php');
        } else if($_SESSION["mem_status"]=="rest" && $_SESSION["mem_check"]=="enable"){
            header('location: restaurant/index.php');
        } else if($_SESSION["mem_status"]=="rider" && $_SESSION["mem_check"]=="enable"){
            header('location: rider/index.php');
        } else if($_SESSION["mem_check"]==="disable"){
            // echo "<script>alert('กรุณารอการอนุมัติจาก Admin'); window.location = 'index.php';</script>";
            $_SESSION["status"] = 'allow'; 
                header('Location: index.php'); 
                exit();
            
        }
    }else{
        // echo "<script>alert('Username หรือ Password ของคุณผิด'); window.location = 'index.php';</script>";
        $_SESSION["status"] = 'wrong'; 
        header('Location: index.php'); 
        exit();
    }
}
?>