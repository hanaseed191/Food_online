<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('../asset/head/head-rider.php'); ?>
</head>

<body>
<div class="container-fluid content"> <!-- Added container class -->
<div class="card shadow p-5 mb-5 bg-body rounded">
            <h1 align="center" class="p-1">Order</h1>
            <table class="table">
                <thead align="center">
                    <th>No.</th>
                    <th>Restaurant</th>
                    <th>QTY</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Order Date</th>
                    <th>Action</th>
                </thead>
                <?php 
                    include('../connect.php');
                    $sql1 ="SELECT a.order_id, b.res_name FROM orders a, restaurant b WHERE a.res_id = b.res_id; ";
                    $query1 = mysqli_query($conn,$sql1);
                    $result1 = mysqli_fetch_array($query1);
                ?>
                
                <?php
                    $sql ="SELECT * FROM orders WHERE order_status = 'in_process' and mem_status IS NULL";
                    $query = mysqli_query($conn,$sql);
                    while($result = mysqli_fetch_array($query)){
                ?>

                <tbody class="text-center">
                    <form action="config_order.php" method="POST">
                        <input type="hidden" name="order_id" class="form-control"
                            value="<?php echo $result['order_id']; ?>">
                        <td><input type="hidden" name="order_id" disabled class="form-control"
                                value="<?php echo $result['order_id']; ?>">Order #<?php echo $result['order_id']; ?></td>
                        <td><input type="hidden" name="res_name" disabled class="form-control"
                                value="<?php echo $result1['res_name']; ?>"><?php echo $result1['res_name']; ?></td>
                        
                        <td><input type="hidden" name="order_qty" class="form-control"
                                value="<?php echo $result['order_qty']; ?>"><?php echo $result['order_qty']; ?></td>
                        <td><input type="hidden" name="order_price" class="form-control"
                                value="<?php echo $result['order_price']; ?>"><?php echo $result['order_price']; ?></td>
                        <td><input type="hidden" name="order_status" class="form-control"
                                value="<?php echo $result['order_status']; ?>">
                            <?php 
                            if($result['order_status'] == 'in_process'){
                                echo '<span class="badge text-bg-primary">IN PROCESS</span>';
                            }else if ($result['order_status'] == 'waiting'){
                                echo '<span class="badge text-bg-warning">WAITING ORDER</span>';
                            }else if ($result['order_status'] == 'delivery'){
                                echo '<span class="badge text-bg-info text-dark">DELIVERY</span>';
                            }else if ($result['order_status'] == 'success'){
                                echo '<span class="badge text-bg-success">SUCCESS</span>';
                            }else if ($result['order_status'] == 'cancle'){
                                echo '<span class="badge text-bg-danger">CANCLE</span>';
                            } 
                        ?>
                        </td>
                        <td><input type="hidden" name="order_date" class="form-control"
                                value="<?php echo $result['order_date']; ?>"><?php echo $result['order_date']; ?></td>
                        <td><button type="submit" name="receive" class="btn btn-primary">Receive</button></td>
                </tbody>
                </form>
                <?php } ?>
            </table>
       
        </div>
    </div>
</body>

</html>