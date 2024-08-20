<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('../asset/head/head-user.php'); ?>
</head>

<body>
    <div class="container shadow p-5 mb-5 bg-body rounded">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content">

            <?php 
            include('../connect.php');        
            $sql ="SELECT * FROM restaurant WHERE res_name !='' ";
            $query = mysqli_query($conn,$sql);
            if(mysqli_num_rows($query)>0){
                while($result = mysqli_fetch_array($query)){
        ?>
            <div class="col mb-5">
                <div class="card h-100">
                    <img src="../asset/uploads/<?php echo $result['res_img']; ?>" class="img-fluid"
                        style="width: 100%; height: 100%; object-fit: cover;">
                    <div class="card-body p-4">
                        <div class="text-center">
                            <form action="menu.php" method="POST">
                                <input type="hidden" name="res_id" value="<?php echo $result['res_id']; ?>">
                                <h5 class="fw-bolder"><?php echo $result['res_name']; ?></h5>
                                <hr>
                                Address : <?php echo $result['res_address']; ?><br>
                                Phone : <?php echo $result['res_phone']; ?><br>
                                <hr>
                                Days : <?php echo $result['o_day']; ?> <br>
                                Open : <?php echo $result['o_hr']; ?> <br>
                                Close : <?php echo $result['c_hr']; ?> <br>
                        </div>
                    </div>
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent text-center">
                        <div><button class="btn btn-outline-primary" type="submit" name="menu">View Menu</button></div>
                    </div>
                    </form>
                </div>
            </div>
            <?php 
            }
        } 
        ?>

        </div>
    </div>
</body>

</html>