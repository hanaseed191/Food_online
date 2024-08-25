<?php 
    session_start();
    include('../connect.php');
    if(isset($_POST["insert"])){
        print_r($_POST);
        $res_id = $_POST['res_id'];
        $cate_menu_id = $_POST['cate_menu_id'];
        $menu_name = $_POST['menu_name'];
        $menu_price = $_POST['menu_price'];
        $images = basename($_FILES["file"]["name"]);
        $targetDir = "../asset/uploads/";
        $targetFilePath = $targetDir . $images;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
        if(!empty($_FILES["file"]["name"])){
            // Allow certain file formats
            $allowTypes = array('jpg','png','jpeg','gif','pdf');
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                    // Insert image file name into database
                    $sql = "INSERT INTO menu(menu_id, res_id, cate_menu_id, menu_name, menu_price, m_img) 
                    VALUES (NULL,'$res_id','$cate_menu_id','$menu_name','$menu_price','$images')";
                    $query = mysqli_query($conn, $sql);
                    if($query){
                        $_SESSION["status"] = 'success';
                        header('Location: manage_menu.php');
                        exit();
                    } 
                }
            }
        }
    }else if (isset($_POST['update'])){
        $menu_id = $_POST['menu_id'];
        $res_id = $_POST['res_id'];
        $cate_menu_id = $_POST['cate_menu_id'];
        $menu_name = $_POST['menu_name'];
        $menu_price = $_POST['menu_price'];
        $m_img = $_POST['m_img'];
        $sql = "UPDATE menu SET 
        res_id='$res_id',
        cate_menu_id='$cate_menu_id',
        menu_name='$menu_name',
        menu_price='$menu_price',
        m_img='$m_img' 
        WHERE menu_id='$menu_id'";
        $query = mysqli_query($conn,$sql);
        if($query){
            $_SESSION["status"] = 'success';
            header('Location: manage_menu.php');
            exit();
        }
    }else if (isset($_POST['delete'])){
        $menu_id = $_POST['menu_id'];
        $sql = "DELETE FROM menu WHERE menu_id = '$menu_id'";
        $query = mysqli_query($conn,$sql);
        if($query){
            $_SESSION["status"] = 'success';
            header('Location: manage_menu.php');
            exit();
        }
    } 
?>