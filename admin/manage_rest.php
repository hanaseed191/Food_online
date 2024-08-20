<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('../asset/head/head-admin.php'); ?>
</head>

<body>
    <div class="container-fluid content">
        <div class="card body shadow p-5 mb-5 bg-body rounded">
            <?php
            session_start();
            if (isset($_SESSION['status'])) {
                $_SESSION['status'] === 'success';
                echo '<div class="alert alert-primary" align="left" role="alert"><b>Manage Restaurant Successful. !!</b></div>';
                unset($_SESSION['status']);
            }
            ?>

            <h1 align="center" class="p-1">Manage Restaurant</h1>
            <div class="table-responsive">
                <table class="table">
                    <thead align="center">
                        <th>Rest_ID</th>
                        <th>Cate_ID</th>
                        <th>Restaurant_Name</th>
                        <th>Restaurant_Email</th>
                        <th>Restaurant_Phone</th>
                        <th>Open</th>
                        <th>Close</th>
                        <th>Openingday</th>
                        <th>Restaurant_Address</th>
                        <th colspan="2">Action</th>
                    </thead>
                    <tbody>
                        <form action="config_rest.php" method="post">
                            <input type="hidden" name="res_id">
                            <tr>
                                <td><input type="text" class="form-control" name="rest_id" disabled></td>
                                <td><input type="text" class="form-control" name="cate_id"></td>
                                <td><input type="text" class="form-control" name="res_name"></td>
                                <td><input type="email" class="form-control" name="res_mail"></td>
                                <td><input type="tel" class="form-control" name="res_phone"></td>
                                <td><input type="time" class="form-control" name="o_hr"></td>
                                <td><input type="time" class="form-control" name="c_hr"></td>
                                <td>
                                    <select class="form-select" name="o_day">
                                        <option value="mon-mon">mon-mon</option>
                                        <option value="mon-tue">mon-tue</option>
                                        <option value="mon-wed">mon-wed</option>
                                        <option value="mon-thu">mon-thu</option>
                                        <option value="mon-fri">mon-fri</option>
                                        <option value="mon-sat">mon-sat</option>
                                        <option value="mon-sun">mon-sun</option>
                                    </select>
                                </td>
                                <td><input type="text" class="form-control" name="res_address"></td>
                                <td colspan="2"><button type="submit" name="insert"
                                        class="btn btn-secondary form-control">Insert</button></td>
                            </tr>
                        </form>
                    </tbody>

                    <?php
                    $sql = "SELECT * FROM restaurant";
                    $query = mysqli_query($conn, $sql);
                    ?>

                    <?php
                    while ($result = mysqli_fetch_array($query)) {
                        ?>
                        <tbody>
                            <form action="config_rest.php" method="POST">
                                <input type="hidden" name="res_id" value="<?php echo $result['res_id'] ?>">
                                <tr>
                                    <td><input type="text" class="form-control" name="res_id" disabled
                                            value="<?php echo $result['res_id']; ?>"></td>
                                    <td><input type="text" class="form-control" name="cate_id"
                                            value="<?php echo $result['cate_id']; ?>"></td>
                                    <td><input type="text" class="form-control" name="res_name"
                                            value="<?php echo $result['res_name']; ?>"></td>
                                    <td><input type="email" class="form-control" name="res_mail"
                                            value="<?php echo $result['res_mail']; ?>"></td>
                                    <td><input type="tel" class="form-control" name="res_phone"
                                            value="<?php echo $result['res_phone']; ?>"></td>
                                    <td><input type="time" class="form-control" name="o_hr"
                                            value="<?php echo $result['o_hr']; ?>"></td>
                                    <td><input type="time" class="form-control" name="c_hr"
                                            value="<?php echo $result['c_hr']; ?>"></td>
                                    <td>
                                        <select class="form-select" name="o_day">
                                            <option value="<?php echo $result['o_day']; ?>"><?php echo $result['o_day']; ?>
                                            </option>
                                            <option value="mon-mon">mon-mon</option>
                                            <option value="mon-tue">mon-tue</option>
                                            <option value="mon-wed">mon-wed</option>
                                            <option value="mon-thu">mon-thu</option>
                                            <option value="mon-fri">mon-fri</option>
                                            <option value="mon-sat">mon-sat</option>
                                            <option value="mon-sun">mon-sun</option>
                                        </select>
                                    </td>
                                    <td><input type="text" class="form-control" name="res_address"
                                            value="<?php echo $result['res_address']; ?>"></td>
                                    <td><button type="submit" name="update" class="btn btn-primary">Update</button></td>
                                    <td><button type="submit" name="delete" class="btn btn-danger">Delete</button></td>
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