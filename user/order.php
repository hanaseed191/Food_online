<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('../asset/head/head-user.php'); ?>
</head>

<body>
    <div class="content">
        <div class="container shadow p-5 mb-5 bg-body rounded">
            <h1 align="center" class="p-1">Your Order</h1>
            <table class="table">
                <thead align="center">
                    <th>#</th>
                    <th>Item</th>
                    <th>QTY</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Order Date</th>
                    <th>Action</th>
                </thead>
                <?php 
                    include('../connect.php');
                    $sql ="SELECT * FROM orders WHERE mem_id = '".$_SESSION["mem_id"]."' and order_status IN ('in_process','waiting','delivery','success') ";
                    $query = mysqli_query($conn,$sql);
                    while($result = mysqli_fetch_array($query)){
            ?>

                <tbody class="text-center">
                    <form action="config_order.php" method="POST">
                        <input type="hidden" name="order_id" class="form-control"
                            value="<?php echo $result['order_id']; ?>">
                        <td><input type="hidden" name="order_id" disabled class="form-control"
                                value="<?php echo $result['order_id']; ?>"><?php echo $result['order_id']; ?></td>
                        <td><input type="hidden" name="menu_name" class="form-control"
                                value="<?php echo $result['menu_name']; ?>"><?php echo $result['menu_name']; ?></td>
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
                        <td><button type="submit" name="cancle" class="btn btn-danger ">Cancle</button>
                        </td>
                </tbody>
                </form>
                <?php } ?>
            </table>

            <br>
            <h1 align="center" class="p-1">Order Cancle</h1>
            <table class="table">
                <thead align="center">
                    <th>#</th>
                    <th>Item</th>
                    <th>QTY</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Order Date</th>
                </thead>
                <?php 
                    include('../connect.php');
                    $sql ="SELECT * FROM orders WHERE mem_id = '".$_SESSION["mem_id"]."' and order_status = 'cancle'";
                    $query = mysqli_query($conn,$sql);
                    while($result = mysqli_fetch_array($query)){
            ?>

                <tbody class="text-center">
                    <form>
                        <input type="hidden" name="order_id" class="form-control"
                            value="<?php echo $result['order_id']; ?>">
                        <td><input type="hidden" name="order_id" disabled class="form-control"
                                value="<?php echo $result['order_id']; ?>"><?php echo $result['order_id']; ?></td>
                        <td><input type="hidden" name="menu_name" class="form-control"
                                value="<?php echo $result['menu_name']; ?>"><?php echo $result['menu_name']; ?></td>
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
                                echo '<span class="badge text-bg-warning">WAITING RIDER</span>';
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
                        </td>
                </tbody>
                </form>
                <?php } ?>
            </table>
        </div>
    </div>
</body>

</html>