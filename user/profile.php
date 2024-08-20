<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('../asset/head/head-user.php'); ?>
</head>

<body>
    <?php
    include('../connect.php');
    $sql = "SELECT * FROM member WHERE mem_id = '" . $_SESSION["mem_id"] . "'";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($query);
    ?>
    <div class="content">
        <div class="container shadow p-5 mb-5 bg-body rounded">
            <h1 align="center" class="p-1">Your Account Profile</h1>
            <form action="../admin/config_member.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="mem_id" value="<?php echo $result['mem_id']; ?>" />

                <div class="text-center ">
                    <img src="../asset/uploads/<?php echo $result['mem_img']; ?>"
                        class="img-fluid rounded-circle shadow" width="50%" height="50%"
                        style="width: 200px; height: 200px; object-fit: cover;">
                </div>

                <div class="my-2">
                    <label for="mem_user">Username</label>
                    <input type="text" name="mem_user" id="mem_user" class="form-control"
                        value="<?php echo $result['mem_user']; ?>" />
                </div>

                <div class="my-2">
                    <label for="mem_pass">Password</label>
                    <input type="password" name="mem_pass" id="mem_pass" class="form-control"
                        value="<?php echo $result['mem_pass']; ?>" />
                </div>

                <div class="my-2">
                    <label for="mem_name">First Name</label>
                    <input type="text" name="mem_name" id="mem_name" class="form-control"
                        value="<?php echo $result['mem_name']; ?>" />
                </div>

                <div class="my-2">
                    <label for="mem_last">Last Name</label>
                    <input type="text" name="mem_last" id="mem_last" class="form-control"
                        value="<?php echo $result['mem_last']; ?>" />
                </div>

                <div class="my-2">
                    <label for="mem_mail">Email</label>
                    <input type="email" name="mem_mail" id="mem_mail" class="form-control"
                        value="<?php echo $result['mem_mail']; ?>" />
                </div>

                <div class="my-2">
                    <label for="mem_phone">Phone Number</label>
                    <input type="tel" name="mem_phone" id="mem_phone" class="form-control"
                        value="<?php echo $result['mem_phone']; ?>" />
                </div>

                <div class="my-2">
                    <label for="mem_address">Address</label>
                    <textarea rows="4" name="mem_address" id="mem_address" class="form-control">
                        <?php echo $result['mem_address']; ?>
                    </textarea>
                </div>

                <div class="my-2">
                    <label for="mem_status">Status</label>
                    <input type="tel" name="mem_status" id="mem_status" class="form-control"
                        value="<?php echo $result['mem_status']; ?>" />
                </div>

                <div class="my-2">
                    <input type="hidden" name="mem_check" id="mem_check" value="<?php echo $result['mem_check']; ?>" />
                </div>

                <div class="my-2">
                    <label for="file">Picture Profile</label>
                    <input type="file" name="file" id="file" class="form-control" />
                </div>
                <input type="hidden" name="redirect" value="user">

                <button type="submit" name="submit" value="Upload" class="btn btn-success form-control my-2">
                    Save 
                </button>
                <hr>
                <?php
                session_start();
                if (isset($_SESSION['status'])) {
                    $_SESSION['status'] === 'success';
                    echo '<div class="alert alert-success" align="left" role="alert"><b>Update Profile Successful. !!</b></div>';
                    unset($_SESSION['status']);
                }
                ?>
            </form>
        </div>
    </div>
</body>

</html>