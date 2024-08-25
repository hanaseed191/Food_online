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
            <h1 align="center" class="p-1">Report Restaurant</h1>
            <br>
            <div class="row">
                <!-- Daily Order Summary -->
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <h3 class="text-center">Daily Order Summary</h3>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th class="text-nowrap">Order Date</th>
                                    <th class="text-nowrap">Total Orders</th>
                                    <th class="text-nowrap">Total Sales</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php
                                include('../connect.php');
                                $sql = "SELECT DATE(order_date) AS order_day, COUNT(order_id) AS total_orders, SUM(order_price * order_qty) AS total_sales FROM orders GROUP BY DATE(order_date) ORDER BY order_day;";
                                $query = mysqli_query($conn, $sql);
                                while ($result = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td class="text-nowrap"><?php echo $result['order_day']; ?></td>
                                        <td class="text-nowrap"><?php echo $result['total_orders']; ?></td>
                                        <td class="text-nowrap"><?php echo number_format($result['total_sales'], 2); ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Monthly Order Summary -->
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <h3 class="text-center">Monthly Order Summary</h3>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th class="text-nowrap">Order Month</th>
                                    <th class="text-nowrap">Total Orders</th>
                                    <th class="text-nowrap">Total Sales</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php
                                $sql = "SELECT DATE_FORMAT(order_date, '%Y-%m') AS order_month, COUNT(order_id) AS total_orders, SUM(order_price * order_qty) AS total_sales FROM orders GROUP BY DATE_FORMAT(order_date, '%Y-%m') ORDER BY order_month;";
                                $query = mysqli_query($conn, $sql);
                                while ($result = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td class="text-nowrap"><?php echo $result['order_month']; ?></td>
                                        <td class="text-nowrap"><?php echo $result['total_orders']; ?></td>
                                        <td class="text-nowrap"><?php echo number_format($result['total_sales'], 2); ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Annual Order Summary -->
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <h3 class="text-center">Annual Order Summary</h3>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th class="text-nowrap">Order Year</th>
                                    <th class="text-nowrap">Total Orders</th>
                                    <th class="text-nowrap">Total Sales</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php
                                $sql = "SELECT YEAR(order_date) AS order_year, COUNT(order_id) AS total_orders, SUM(order_price * order_qty) AS total_sales FROM orders GROUP BY YEAR(order_date) ORDER BY order_year;";
                                $query = mysqli_query($conn, $sql);
                                while ($result = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td class="text-nowrap"><?php echo $result['order_year']; ?></td>
                                        <td class="text-nowrap"><?php echo $result['total_orders']; ?></td>
                                        <td class="text-nowrap"><?php echo number_format($result['total_sales'], 2); ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
