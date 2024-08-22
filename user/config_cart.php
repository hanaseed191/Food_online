<?php 
    session_start();
    include('../connect.php');
    if(isset($_POST["add"])){
        print_r($_POST);
        $mem_id = $_POST['mem_id'];
        $menu_id = $_POST['menu_id'];
        $res_id = $_POST['res_id'];
        $menu_name = $_POST['menu_name'];
        $menu_price = $_POST['menu_price'];
        $order_qty = $_POST['order_qty'];
                $sql = "INSERT INTO `sum` (`sum_id`, `mem_id`, `menu_id`, `res_id`, `menu_name`, `menu_price`, `order_qty`) VALUES (NULL, '$mem_id', '$menu_id', '$res_id', '$menu_name', '$menu_price', '$order_qty')";
                $query = mysqli_query($conn, $sql);
                if($query){
                    header('Location: cart.php'); 
                } 

            }
            else if (isset($_POST["delete"])){
                print_r($_POST);
                $sum_id = $_POST['sum_id'];
                $sql = "DELETE FROM sum WHERE sum_id = '$sum_id'";
                $query = mysqli_query($conn,$sql);
                if($query){
                    header('Location: cart.php'); 
                }
            }

    else{
        echo "<script>alert('ไม่สามารถอัพเดทข้อมูลเสร็จสิ้นได้'); window.location = 'cart.php';</script>";
    }
    
?>