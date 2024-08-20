<?php 
    include('../connect.php');
    if(isset($_POST["cancle"])){
        $order_id = $_POST['order_id'];
        $order_status = $_POST['order_status'];
        $sql = "UPDATE orders SET order_status = 'cancle' WHERE order_id = '$order_id' ";
        $query = mysqli_query($conn,$sql);
        if($query){
            echo "<script>alert('ยกเลิกออเดอร์เสร็จสิ้น'); window.location = 'order.php';</script>";
        }
    }

?>