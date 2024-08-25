<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('../asset/head/head-rest.php'); ?>
</head>

<body>
    <div class="container-fluid content">
        <div class="card shadow p-5 mb-5 bg-body rounded">
            <?php
            session_start();
            if (isset($_SESSION['status'])) {
                if ($_SESSION['status'] === 'success') {
                    echo '<div class="alert alert-primary" align="left" role="alert"><b>Order Successful!</b></div>';
                } else if ($_SESSION['status'] === 'cancle') {
                    echo '<div class="alert alert-primary" align="left" role="alert"><b>Order Canceled!</b></div>';
                }
                unset($_SESSION['status']);
            }
            ?>

            <h1 align="center" class="p-1">Your Order</h1>
            <div class="table-responsive">
                <table class="table">
                    <thead align="center">
                        <tr>
                            <th>Order_ID</th>
                            <th>QTY</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Order Date</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <?php
                    include('../connect.php');
                    $sql1 = "SELECT * FROM restaurant ";
                    $query1 = mysqli_query($conn, $sql1);
                    $result1 = mysqli_fetch_array($query1);
                    ?>
                    <?php
                    $res_id = $result1['res_id'];
                    $sql = "SELECT * FROM orders WHERE res_id = '$res_id' and order_status IN ('in_process','waiting','delivery','success') ";
                    $query = mysqli_query($conn, $sql);
                    while ($result = mysqli_fetch_array($query)) {
                        $order_group = $result['order_group'];
                        ?>
                        <tbody class="text-center">
                            <form action="config_order.php" method="POST">
                                <input type="hidden" name="order_id" class="form-control"
                                    value="<?php echo $result['order_id']; ?>">
                                <tr>
                                    <td>Order #<?php echo $result['order_id']; ?></td>
                                    <td><?php echo $result['order_qty']; ?></td>
                                    <td><?php echo '฿' . number_format($result['order_price'], 2); ?></td>
                                    <td>
                                        <?php
                                        if ($result['order_status'] == 'in_process') {
                                            echo '<span class="badge text-bg-primary">IN PROCESS</span>';
                                        } else if ($result['order_status'] == 'waiting') {
                                            echo '<span class="badge text-bg-warning">WAITING ORDER</span>';
                                        } else if ($result['order_status'] == 'delivery') {
                                            echo '<span class="badge text-bg-info text-dark">DELIVERY</span>';
                                        } else if ($result['order_status'] == 'success') {
                                            echo '<span class="badge text-bg-success">SUCCESS</span>';
                                        } else if ($result['order_status'] == 'cancle') {
                                            echo '<span class="badge text-bg-danger">CANCELLED</span>';
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo $result['order_date']; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#modal-<?php echo $result['order_id']; ?>">
                                            Detail
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="modal-<?php echo $result['order_id']; ?>" tabindex="-1"
                                            aria-labelledby="modalLabel-<?php echo $result['order_id']; ?>"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <?php
                                                        $sql1 = "SELECT * FROM `sum` WHERE order_group = '$order_group'";
                                                        $query1 = mysqli_query($conn, $sql1);
                                                        ?>
                                                        <h1 align="center">My Orders</h1>
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Item</th>
                                                                    <th>Product</th>
                                                                    <th>Price</th>
                                                                    <th>QTY.</th>
                                                                    <th>Total(฿)</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $count = 1;
                                                                $total_qty = 0;
                                                                $total = 0;
                                                                while ($result1 = mysqli_fetch_array($query1)) {
                                                                    $item_total = $result1['menu_price'] * $result1['order_qty'];
                                                                    $total += $item_total;
                                                                    $total_qty += $result1['order_qty'];
                                                                    ?>
                                                                    <tr>
                                                                        <td><?php echo $count++; ?></td>
                                                                        <td><?php echo $result1['menu_name']; ?></td>
                                                                        <td><?php echo '฿' . number_format($result1['menu_price'], 2); ?>
                                                                        </td>
                                                                        <td><?php echo $result1['order_qty']; ?></td>
                                                                        <td><?php echo '฿' . number_format($item_total, 2); ?>
                                                                        </td>
                                                                    </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <td colspan="3" class="text-center"><b>Total</b></td>
                                                                    <td class="text-right">
                                                                        <b><?php echo number_format($total_qty); ?></b>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        <b><?php echo '฿' . number_format($total, 2); ?></b>
                                                                    </td>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td><button type="submit" name="cancle" class="btn btn-danger">Cancel</button></td>
                                </tr>
                            </form>
                        <?php } ?>
                </table>
            </div>

            <br>
            <h1 align="center" class="p-1">Order Cancelled</h1>
            <div class="table-responsive">
                <table class="table">
                    <thead align="center">
                        <tr>
                            <th>Order</th>
                            <th>QTY</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Order Date</th>
                        </tr>
                    </thead>
                    <?php
                    $sql2 = "SELECT * FROM orders WHERE res_id = '$res_id' and order_status = 'cancle'";
                    $query2 = mysqli_query($conn, $sql2);
                    while ($result2 = mysqli_fetch_array($query2)) {
                        ?>
                        <tbody class="text-center">
                            <form>
                                <input type="hidden" name="order_id" class="form-control"
                                    value="<?php echo $result2['order_id']; ?>">
                                <tr>
                                    <td>Order #<?php echo $result2['order_id']; ?></td>
                                    <td><?php echo $result2['order_qty']; ?></td>
                                    <td><?php echo '฿' . number_format($result2['order_price'], 2); ?></td>
                                    <td>
                                        <?php
                                        if ($result2['order_status'] == 'in_process') {
                                            echo '<span class="badge text-bg-primary">IN PROCESS</span>';
                                        } else if ($result2['order_status'] == 'waiting') {
                                            echo '<span class="badge text-bg-warning">WAITING RIDER</span>';
                                        } else if ($result2['order_status'] == 'delivery') {
                                            echo '<span class="badge text-bg-info text-dark">DELIVERY</span>';
                                        } else if ($result2['order_status'] == 'success') {
                                            echo '<span class="badge text-bg-success">SUCCESS</span>';
                                        } else if ($result2['order_status'] == 'cancle') {
                                            echo '<span class="badge text-bg-danger">CANCELLED</span>';
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo $result2['order_date']; ?></td>
                                </tr>
                            </form>
                        </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>