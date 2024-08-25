<?php
include('../connect.php');

// Fetch data from the 'sum' table
session_start();
$mem_id = $_SESSION['mem_id'];
$sql = "SELECT `sum_id`, `mem_id`, `menu_id`, `res_id`, `menu_name`, `menu_price`, `order_qty` FROM `sum` WHERE `mem_id` = '2' AND order_group IS NULL";
$query = mysqli_query($conn, $sql);

$total = 0; // Initialize total price
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('../asset/head/head-user.php'); ?>
</head>

<body>

    <div class="container-fluid content">
        <div class="card shadow p-5 mb-5 bg-body rounded">
            <div class="row">
                <!-- ตะกร้าสินค้าด้านซ้าย -->
                <div class="col-1"></div>
                <div class="col-md-8 col-sm-12">
                    <h2 class="text-center">My Cart</h2>
                    <form action="config_cart.php" method="POST">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Item</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>QTY.</th>
                                        <th>Total(฿)</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 1;
                                    $total_qty = 0;
                                    $discount = isset($_SESSION["coupon_discount"]) ? $_SESSION["coupon_discount"] / 100 : 0;

                                    while ($result = mysqli_fetch_array($query)) {
                                        $item_total = $result['menu_price'] * $result['order_qty'];
                                        $discounted_total = $item_total - ($item_total * $discount); // คำนวณราคาหลังจากหักส่วนลด
                                        $total += $item_total;
                                        $total_qty += $result['order_qty'];
                                        ?>
                                        <tr>
                                            <input type="hidden" name="menu_id" value="<?php echo $result['menu_id']; ?>">
                                            <input type="hidden" name="menu_name"
                                                value="<?php echo $result['menu_name']; ?>">
                                            <input type="hidden" name="order_price"
                                                value="<?php echo $discounted_total; ?>"> <!-- ส่งราคาหลังจากหักส่วนลด -->
                                            <input type="hidden" name="order_qty"
                                                value="<?php echo $result['order_qty']; ?>">
                                            <td><?php echo $count++; ?></td>
                                            <td><?php echo $result['menu_name']; ?></td>
                                            <td><?php echo '฿' . number_format($result['menu_price'], 2); ?></td>
                                            <td><?php echo $result['order_qty']; ?></td>
                                            <td><?php echo '฿' . number_format($discounted_total, 2); ?></td>
                                            <!-- แสดงราคาหลังจากหักส่วนลด -->
                                            <td>
                                                <a href="config_cart.php?delete=<?php echo $result['sum_id']; ?>"
                                                    class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3" class="text-center"><b>Total</b></td>
                                        <td class="text-right"><b><?php echo number_format($total_qty); ?></b></td>
                                        <td class="text-right"><b><?php echo '฿' . number_format($total, 2); ?></b></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-right"><b>Discount : </b></td>
                                        <td class="text-right">
                                            <b><?php echo '-฿' . number_format($total * $discount, 2); ?></b></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-right"><b>Grand Total:</b></td>
                                        <td class="text-right">
                                            <b><?php echo '฿' . number_format($sum = $total - ($total * $discount), 2); ?></b>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <!-- ส่งค่า Grand Total ใน hidden input -->
                                    <input type="hidden" name="order_price" value="<?php echo $sum; ?>">
                                </tfoot>
                            </table>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="restaurant.php" class="btn btn-primary">Back</a>
                        </div>
                        <br>
                        <?php
                        session_start();
                        if (isset($_SESSION['status'])) {
                            if ($_SESSION['status'] === 'add') {
                                echo '<div class="alert alert-primary" align="left" role="alert"><b>Add Products Successful. !!</b></div>';
                            } else if ($_SESSION['status'] === 'delete') {
                                echo '<div class="alert alert-primary" align="left" role="alert"><b>Delete Products Successful. !!</b></div>';
                            } else if ($_SESSION['status'] === 'error') {
                                echo '<div class="alert alert-danger" align="left" role="alert"><b>Can\'t Add Products  !!</b></div>';
                            }
                            unset($_SESSION['status']);
                            unset($_SESSION['coupon_discount']);
                        }
                        ?>
                </div>

                <!-- ข้อมูลการจัดส่งด้านขวา -->
                <div class="col-md-3 col-sm-12">
                    <h3 class="text-center">Address for Delivery</h3>
                    <div class="mb-3">
                        <label for="mem_name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="mem_name" name="mem_name" value="<?php echo $_SESSION['mem_name'];
                        echo "  ";
                        echo $_SESSION['mem_last']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" id="mem_address" name="mem_address" rows="3"
                            required><?php echo $_SESSION['mem_address']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="mem_phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="mem_phone" name="mem_phone"
                            value="<?php echo $_SESSION['mem_phone']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="mem_note" class="form-label">Notes</label>
                        <textarea class="form-control" id="mem_note" name="mem_note" rows="2"></textarea>
                    </div>
                    <button type="submit" name="confirm" class="btn btn-success w-100">Confrim Order</button>
                    </form>
                    <br><br>
                    <h3 class="text-center">Coupon</h3>
                    <form action="config_cart.php" method="post">
                        <input type="text" class="form-control" name="use_coupon" placeholder="Coupon">
                        <br>
                        <button type="submit" name="coupon" class="btn btn-secondary w-100">Use Coupon</button>
                    </form>
                    <br>
                    <?php
                        session_start();
                        if (isset($_SESSION['status_coupon'])) {
                            if ($_SESSION['status_coupon'] === 'coupon') {
                                echo '<div class="alert alert-primary" align="left" role="alert"><b>Used Coupon Successful. !!</b></div>';
                            } else if ($_SESSION['status_coupon'] === 'nocoupon') {
                                echo '<div class="alert alert-danger" align="left" role="alert"><b>Coupon Not Found !!</b></div>';
                            } 
                            unset($_SESSION['status_coupon']);
                        }
                       ?>
                </div>
            </div>

            <br>
        </div>
    </div>

</body>

</html>