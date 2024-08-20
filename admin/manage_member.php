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
                echo '<div class="alert alert-primary" align="left" role="alert"><b>Manage Data Restaurant Successful. !!</b></div>';
                unset($_SESSION['status']);
            }
            ?>
            <h1 class="text-center p-1">Manage Member</h1>
            <div class="table-responsive"> <!-- Added table-responsive class -->
                <table class="table">
                    <thead align="center">
                        <tr>
                            <th>User</th>
                            <th>Password</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Status</th>
                            <th>Enable_User</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr> <!-- Added table row -->
                            <form action="config_member.php" method="post">
                                <input type="hidden" name="mem_id">
                                <td><input type="text" class="form-control" name="mem_user"></td>
                                <td><input type="password" class="form-control" name="mem_pass"></td>
                                <td><input type="text" class="form-control" name="mem_name"></td>
                                <td><input type="text" class="form-control" name="mem_last"></td>
                                <input type="hidden" class="form-control" name="mem_img">
                                <td>
                                    <select class="form-select" name="mem_status">
                                        <option value="user">User</option>
                                        <option value="rest">Restaurant</option>
                                        <option value="rider">Rider</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="form-select" name="mem_check">
                                        <option value="enable">Enable</option>
                                        <option value="disable">Disable</option>
                                    </select>
                                </td>
                                <td colspan="2"><button type="submit" name="insert"
                                        class="btn btn-secondary form-control">Insert</button></td>
                            </form>
                        </tr>
                    </tbody>

                    <?php
                    $sql = "SELECT * FROM member WHERE mem_check = 'enable'";
                    $query = mysqli_query($conn, $sql);
                    ?>

                    <?php while ($result = mysqli_fetch_array($query)): ?>
                        <tbody>
                            <tr> <!-- Added table row -->
                                <form action="config_member.php" method="POST">
                                    <input type="hidden" name="mem_id" value="<?php echo $result['mem_id'] ?>">
                                    <td><input type="text" class="form-control" name="mem_user"
                                            value="<?php echo $result['mem_user']; ?>"></td>
                                    <td><input type="password" class="form-control" name="mem_pass"
                                            value="<?php echo $result['mem_pass']; ?>"></td>
                                    <td><input type="text" class="form-control" name="mem_name"
                                            value="<?php echo $result['mem_name']; ?>"></td>
                                    <td><input type="text" class="form-control" name="mem_last"
                                            value="<?php echo $result['mem_last']; ?>"></td>
                                    <td><input type="text" disabled class="form-control" name="mem_status"
                                            value="<?php echo $result['mem_status']; ?>"></td>
                                    <input type="hidden" class="form-control" name="mem_status"
                                        value="<?php echo $result['mem_status']; ?>">
                                    <td>
                                        <select class="form-control form-select " name="mem_check">
                                            <option value="enable">Enable</option>
                                            <option value="disable">Disable</option>
                                        </select>
                                    </td>
                                    <td><button type="submit" name="update" class="btn btn-primary">Update</button></td>
                                    <td><button type="submit" name="delete" class="btn btn-danger">Delete</button></td>
                                </form>
                            </tr>
                        </tbody>
                    <?php endwhile; ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>