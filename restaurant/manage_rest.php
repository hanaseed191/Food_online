<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('../asset/head/head-rest.php'); ?>
</head>

<body>
    <?php
    include('../connect.php');
    $mem_id = $_SESSION['mem_id'];
    $sql = "SELECT * FROM restaurant WHERE mem_id = '$mem_id'";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($query);

    $sql1 = "SELECT cate_name FROM cate_res WHERE cate_id = (SELECT cate_id FROM `restaurant` WHERE mem_id = '$mem_id')";
    $query1 = mysqli_query($conn, $sql1);
    $result1 = mysqli_fetch_array($query1);

    $sql2 = "SELECT * FROM cate_res ";
    $query2 = mysqli_query($conn, $sql2);
    $result2 = mysqli_fetch_array($query2);
    ?>
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
            <h1 align="center" class="p-1">Manage Restaurant</h1>
            <center><img src="../asset/uploads/<?php echo $result['res_img']; ?>" class="img-fluid my-4" width="100%"
                    height="50%" style=" width: 100%; height: 400px;  object-fit: cover;"></center>
            <form action="config_rest.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <input type="hidden" name="res_id" value="<?php echo $result['res_id']; ?>">
                    <input type="hidden" name="mem_id" value="<?php echo $result['mem_id']; ?>">
                    <div class="col-2">
                        <label class="col-form-label">Change Category</label>
                        <select class="form-select" name="cate_id">
                            <?php while ($result2 = mysqli_fetch_array($query2)) { ?>
                                <option value="<?php echo $result2["cate_id"]; ?>">
                                    <?php echo "{$result2["cate_id"]} : {$result2["cate_name"]}"; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-3">
                        <label class="col-form-label">Restaurant Category</label>
                        <input type="text" name="cate_name" class="form-control" readonly
                            value="<?php echo $result1["cate_name"]; ?>">
                    </div>
                    <div class="col-4">
                        <label class="col-form-label">Restaurant</label>
                        <input type="text" name="res_name" class="form-control"
                            value="<?php echo $result["res_name"]; ?>">
                    </div>
                    <div class="col-3">
                        <label class="col-form-label">Email</label>
                        <input type="text" name="res_mail" class="form-control"
                            value="<?php echo $result["res_mail"]; ?>">
                    </div>
                    <div class="col-6">
                        <label class="col-form-label">Phone</label>
                        <input type="text" name="res_phone" class="form-control"
                            value="<?php echo $result["res_phone"]; ?>">
                    </div>
                    <div class="col-6">
                        <label class="col-form-label">Day Open-Close</label>
                        <select class="form-select" name="o_day">
                            <option value="<?php echo $result["o_day"]; ?>"><?php echo $result["o_day"]; ?></option>
                            <option value="mon-mon">mon-mon</option>
                            <option value="mon-tue">mon-tue</option>
                            <option value="mon-wed">mon-wed</option>
                            <option value="mon-thu">mon-thu</option>
                            <option value="mon-fri">mon-fri</option>
                            <option value="mon-sat">mon-sat</option>
                            <option value="mon-sun">mon-sun</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label class="col-form-label">Address</label>
                        <textarea name="res_address" class="form-control"
                            value="<?php echo $result["res_address"]; ?>"><?php echo $result["res_address"]; ?></textarea>
                    </div>
                    <div class="col-6">
                        <label class="col-form-label">Open</label>
                        <input type="time" step="60" class="form-control" name="o_hr"
                            value="<?php echo $result["o_hr"]; ?>">
                    </div>
                    <div class="col-6">
                        <label class="col-form-label">Close</label>
                        <input type="time" step="60" class="form-control" name="c_hr"
                            value="<?php echo $result["c_hr"]; ?>">
                    </div>
                </div>
                <br>
                <input type="file" name="file" class="form-control">
                <button type="submit" name="update" class="btn btn-primary btn-lg form-control my-3">Save </button>
            </form>
        </div>
    </div>
</body>

</html>