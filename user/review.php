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
                    <h2 class="text-center">My Review</h2>
                    <form action="config_review.php" method="POST">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Restaurant</th>
                                    <th>Details</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php 
                                include('../connect.php');
                                $mem_id = $_SESSION['mem_id'];
                                $sql = "SELECT * FROM review WHERE mem_id = '$mem_id' ";
                                $query = mysqli_query($conn, $sql); 
                                while ($result = mysqli_fetch_array($query)) {
                            ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $result['review_id']; ?></td>
                                    <td><?php echo $result['res_name']; ?></td>
                                    <td><?php echo $result['detail']; ?></td>
                                    <td>
                                                <a href="config_review.php?delete=<?php echo $result['review_id']; ?>"
                                                    class="btn btn-danger">Delete</a>
                                            </td>
                                </tr>
                            </tbody>
                            <?php } ?>
                        </table>
                    </div>

                    <br>
                </div>

                <!-- ข้อมูลการจัดส่งด้านขวา -->
                <div class="col-md-3 col-sm-12">
                    <h3 class="text-center">Writing Review Restaurant</h3>
                    <div class="mb-3">
                            <label for="mem_name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="mem_name" name="mem_name" value="<?php echo $_SESSION['mem_name'];
                            echo "  ";
                            echo $_SESSION['mem_last']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <select class="form-select" name="res_name" >
                            <option selected>Select Restaurant</option>
                            <option value="MAHACHAI">MAHACHAI</option>
                            <option value="Sweet">Sweet</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="detail" class="form-label">Review</label>
                        <textarea class="form-control" id="detail" name="detail" rows="3" required></textarea>
                    </div>
                    <button type="submit" name="add" class="btn btn-success w-100">Confrim Review</button>
                    </form>
                    <br>
                    <br>
                    <?php
                    session_start();
                    if (isset($_SESSION['status'])) {
                        if ($_SESSION['status'] === 'success') {
                            echo '<div class="alert alert-primary" align="left" role="alert"><b>Add Review Successful. !!</b></div>';
                        } else if ($_SESSION['status'] === 'delete') {
                            echo '<div class="alert alert-danger" align="left" role="alert"><b>Delete Review Successful. !!</b></div>';
                        } 
                        }
                        unset($_SESSION['status']);
                    ?>

                </div>
            </div>

            <br>
        </div>
    </div>

</body>

</html>