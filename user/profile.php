<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('../asset/head/head-user.php');?>
</head>
<body>
    <?php 
        include('../connect.php');
        $sql = "SELECT * FROM member WHERE mem_id = '".$_SESSION["mem_id"]."'";
        $query = mysqli_query($conn, $sql);
        $result = mysqli_fetch_array($query)
    ?>
    <div class="content">
        <div class="container shadow p-5 mb-5 bg-body rounded">
            <h1 align="center" class="p-1">Your Account Profile</h1>
            <form action="config.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="mem_id" class="form-control my-3 "
                    value="<?php echo $result['mem_id']; ?>" />
                <center><img src="../asset/uploads/<?php echo $result['mem_img']; ?>" class="img-fluid" width="50%"
                        height="50%" style="width: 200px; height: 200px; object-fit: cover;"></center>
                <input type="text" name="mem_user" class="form-control my-3 "
                    value="<?php echo $result['mem_user']; ?>" />
                <input type="password" name="mem_pass" class="form-control my-3"
                    value="<?php echo $result['mem_pass']; ?>" />
                <input type="text" name="mem_name" class="form-control my-3"
                    value="<?php echo $result['mem_name']; ?>" />
                <input type="text" name="mem_last" class="form-control my-3"
                    value="<?php echo $result['mem_last']; ?>" />
                <input type="email" name="mem_mail" class="form-control my-3"
                    value="<?php echo $result['mem_mail']; ?>" />
                <input type="tel" name="mem_phone" class="form-control my-3"
                    value="<?php echo $result['mem_phone']; ?>" />
                <textarea rows="4" class="form-control my-3"
                    name="mem_address" /><?php echo $result['mem_address']; ?></textarea>
                <input type="tel" name="mem_status" class="form-control my-3"
                    value="<?php echo $result['mem_status']; ?>" />
                <label>Picture Profile</label>
                <input type="hidden" class="form-control my-3 " name="mem_check"
                    value="<?php echo $result['mem_check']; ?>" />
                <input type="file" name="file" class="form-control my-3" />
                <button type="submit" name="submit" value="Upload" class="btn btn-success btn-lg form-control">Up Date
                    Profile</button>
                <hr>
            </form>
        </div>
    </div>
</body>

</html>