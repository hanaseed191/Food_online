<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Online Delivery</title>
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
</head>

<body>

    <div class="content">
        <section class="vh-100">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-7">
                        <div class="card shadow p-3 mb-5 bg-body rounded">
                            <div class="card-body p-5 text-center">
                                <form action="login.php" method="POST">
                                    <h1 class="mb-5">Online Food Delivery </h1>
                                    <input type="text" id="mem_user" name="mem_user"
                                        class="form-control form-control-lg my-4" placeholder="Username" />
                                    <input type="password" id="mem_pass" name="mem_pass"
                                        class="form-control form-control-lg my-4" placeholder="Password" />
                                    <button type="submit" class="btn btn-primary btn-lg form-control">Login</button>
                                    <br><br>
                                    <h5>Don't have an Account? <b onclick="location.href='register/register.php';"
                                            style="color: green;"> &nbsp;Sign up</b></h5>
                                    <br>
                                    <?php
                                    session_start(); 
                                    if (isset($_SESSION['status'])) {
                                        if ($_SESSION['status'] === 'success') {
                                            echo '<div class="alert alert-primary" role="alert"><b>Registration successful. <br> Please wait for admin approval.</b></div>';
                                        } elseif ($_SESSION['status'] === 'warning') {
                                            echo '<div class="alert alert-danger" role="alert"><b>Registration failed. Please try again.</b></div>';
                                        } elseif ($_SESSION['status'] === 'allow') {
                                            echo '<div class="alert alert-warning" role="alert"><b>Please wait for admin approval.</b></div>';
                                        } elseif ($_SESSION['status'] === 'wrong') {
                                            echo '<div class="alert alert-danger" role="alert"><b>Username or Password Wrong !!</b></div>';
                                        }
                                        unset($_SESSION['status']);
                                    }
                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
</body>

</html>
