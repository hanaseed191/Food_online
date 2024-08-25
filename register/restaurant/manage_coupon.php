<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('../asset/head/head-rest.php'); ?>
</head>

<body>
    <div class="container-fluid content"> <!-- Added container class -->
        <div class="card shadow p-5 mb-5 bg-body rounded">
            <?php
            if (isset($_SESSION['status'])) {
                if ($_SESSION['status'] === 'success') {
                    echo '<div class="alert alert-primary" align="left" role="alert"><b>Action Completed Successfully!</b></div>';
                    unset($_SESSION['status']);
                } else if ($_SESSION['status'] === 'danger') {
                    echo '<div class="alert alert-danger" align="left" role="alert"><b> Failed to save data. !!</b></div>';
                    unset($_SESSION['status']);

                }
            }
            ?>
            <h1 align="center" class="p-1">Manage Coupon</h1>
            <div class="table-responsive">
                <table class="table">
                    <thead align="center">
                        <th>Coupun_ID</th>
                        <th>Coupun_Name</th>
                        <th>Coupun_Discount</th>
                        <th colspan="2">Action</th>
                    </thead>
                    <tbody>
                        <form action="config_coupon.php" method="POST">
                            <input type="hidden" name="coupon_id" class="form-control">
                            <td><input type="text" name="coupon_id" class="form-control" placeholder="ID" disabled></td>
                            <td><input type="text" name="coupon_name" class="form-control" placeholder="Name"></td>
                            <td><input type="text" name="coupon_discount" class="form-control"
                                    placeholder="Discount (%)"></td>
                            <center>
                                <td colspan="2"><button type="submit" name="insert"
                                        class="btn btn-primary form-control">Insert</button></td>
                            </center>
                        </form>
                    </tbody>
                    <?php
                    include('../connect.php');
                    $sql = "SELECT * FROM coupon";
                    $query = mysqli_query($conn, $sql);
                    while ($result = mysqli_fetch_array($query)) {
                        ?>
                        <tbody>
                            <form action="config_coupon.php" method="POST">
                                <input type="hidden" name="coupon_id" class="form-control"
                                    value="<?php echo $result['coupon_id']; ?>">
                                <td><input type="text" name="coupon_id" disabled class="form-control"
                                        value="<?php echo $result['coupon_id']; ?>"></td>
                                <td><input type="text" name="coupon_name" class="form-control"
                                        value="<?php echo $result['coupon_name']; ?>"></td>
                                <td><input type="text" name="coupon_discount" class="form-control"
                                        value="<?php echo $result['coupon_discount']; ?>"></td>
                                <td><button type="submit" name="update" class="btn btn-success form-control">UpDate</button>
                                </td>
                                <td><button type="submit" name="delete" class="btn btn-danger form-control">Delete</button>
                                </td>
                        </tbody>
                        </form>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>