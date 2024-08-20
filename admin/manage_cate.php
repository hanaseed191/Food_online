<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('../asset/head/head-admin.php'); ?>
</head>

<body>
<div class="container-fluid content"> <!-- Added container class -->
        <div class="card shadow p-5 mb-5 bg-body rounded">
            <?php
            session_start();
            if (isset($_SESSION['status'])) {
                $_SESSION['status'] === 'success';
                echo '<div class="alert alert-primary" align="left" role="alert"><b>Manage Data Category Successful. !!</b></div>';
                unset($_SESSION['status']);
            }
            ?>
            <h1 class="text-center p-1">Manage Category</h1>
            <div class="table-responsive">
            <table class="table">
                <thead align="center">
                    <th>Cate_ID</th>
                    <th>Cate_Name</th>
                    <th colspan="2">Action</th>
                </thead>
                <tbody>
                    <form action="config_cate.php" method="POST">
                        <input type="hidden" name="cate_id" class="form-control">
                        <td><input type="text" name="cate_id" class="form-control" placeholder="Cate_ID" disabled></td>
                        <td><input type="text" name="cate_name" class="form-control" placeholder="Cate_Name"></td>
                        <center>
                            <td colspan="2"><button type="submit" name="insert"
                                    class="btn btn-secondary form-control">Insert</button></td>
                        </center>
                    </form>
                </tbody>
                <?php
                include('../connect.php');
                $sql = "SELECT * FROM cate_res";
                $query = mysqli_query($conn, $sql);
                while ($result = mysqli_fetch_array($query)) {
                    ?>
                    <tbody>
                        <form action="config_cate.php" method="POST">
                            <input type="hidden" name="cate_id" class="form-control"
                                value="<?php echo $result['cate_id']; ?>">
                            <td><input type="text" name="cate_id" disabled class="form-control"
                                    value="<?php echo $result['cate_id']; ?>"></td>
                            <td><input type="text" name="cate_name" class="form-control"
                                    value="<?php echo $result['cate_name']; ?>"></td>
                            <td><button type="submit" name="update" class="btn btn-success  form-control">Update</button>
                            </td>
                            <td><button type="submit" name="delete" class="btn btn-danger  form-control">Delete</button>
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