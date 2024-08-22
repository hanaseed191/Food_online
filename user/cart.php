<?php
include('../connect.php');

// Fetch data from the 'sum' table
session_start();
$mem_id = $_SESSION['mem_id'];
$sql = "SELECT `sum_id`, `mem_id`, `menu_id`, `res_id`, `menu_name`, `menu_price`, `order_qty` FROM `sum` WHERE `mem_id` = '$mem_id'";
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
                <div class="col-6">
                    <h2 class="text-center">ตะกร้าสินค้า</h2>
                    <form action="order.php" method="POST">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>สินค้า</th>
                                    <th>ราคา</th>
                                    <th>จำนวน</th>
                                    <th>รวม(บาท)</th>
                                    <th>ลบ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 1;
                                while ($result = mysqli_fetch_array($query)) {
                                    $item_total = $result['menu_price'] * $result['order_qty'];
                                    $total += $item_total;
                                    ?>
                                    <tr>
                                        <form action="config_cart.php" method="post">
                                            <input type="hidden" name="sum_id" value="<?php echo $result['sum_id']; ?>">
                                        <td><?php echo $count++; ?></td>
                                        <td><?php echo $result['menu_name']; ?></td>
                                        <td><?php echo '฿' . number_format($result['menu_price'], 2); ?></td>
                                        <td> <?php echo $result['order_qty']; ?></td>
                                        <td><?php echo '฿' . number_format($item_total, 2); ?></td>
                                        <td><button type="submit" name ="delete" class="btn btn-danger">ลบ</button></td>
                                        </form>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4" class="text-center"><b>ราคารวม</b></td>
                                    <td class="text-right"><b><?php echo '฿' . number_format($total, 2); ?></b></td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="d-flex justify-content-between">
                            <a href="restaurant.php" class="btn btn-primary">กลับหน้ารายการสินค้า</a>
                        </div>
                    </form>
                </div>
                <!-- ข้อมูลการจัดส่งด้านขวา -->
                <div class="col-1"></div>
                <div class="col-3">
                    <h3 class="text-center">ข้อมูลการจัดส่ง</h3>
                    <form action="order.php" method="POST">
                        <div class="mb-3">
                            <label for="name" class="form-label">ชื่อผู้รับ</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">ที่อยู่</label>
                            <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">เบอร์โทรศัพท์</label>
                            <input type="text" class="form-control" id="phone" name="phone" required>
                        </div>
                        <div class="mb-3">
                            <label for="notes" class="form-label">หมายเหตุ</label>
                            <textarea class="form-control" id="notes" name="notes" rows="2"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success w-100">ยืนยันการสั่งซื้อ</button>
                    </form>
                </div>
            </div>

            <br>
        </div>
    </div>

</body>

</html>
