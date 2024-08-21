<?php
    session_start(); 
    if(!$_SESSION["mem_id"]){
        header("location: ../index.php");
    }else{?>
<?php include("../connect.php");?>
<header>
    <link rel="stylesheet" href="../asset/css/bootstrap.min.css">
    <script src="../asset/js/bootstrap.bundle.js"></script>
    <nav class="navbar navbar-expand-lg bg-light shadow p-3 mb-5 bg-body rounded">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Online Food Delivery</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0"> 
                <li class="nav-item">
                    <a class="nav-link" href="restaurant.php">Restaurant</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cart.php">Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="order.php">Order</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profile.php">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active"><?php echo strtoupper($_SESSION["mem_name"]); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active"><?php echo strtoupper($_SESSION["mem_last"]); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout&nbsp;&nbsp;</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

</header>
<?php } ?>