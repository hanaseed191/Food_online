<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Online Delivery</title>
    <link rel="stylesheet" href="../asset/css/bootstrap.min.css">
</head>

<body>
    <div class="content">
        <section class="vh-100">
            <div class=" container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-8">
                    <div class="card shadow p-5 mb-5 bg-body rounded">
                        <div class="card-body p-3 text-center">
                            <form action="config.php" method="POST" enctype="multipart/form-data">
                                <h2 class="mb-4">Create Your Account</h2>
                                <input type="text" name="mem_user" class="form-control form-control-lg my-3 " placeholder="Username" />
                                <input type="password" name="mem_pass" class="form-control form-control-lg my-3"
                                    placeholder="Password" />
                                <input type="text" name="mem_name" class="form-control form-control-lg my-3" placeholder="Name" />
                                <input type="text" name="mem_last" class="form-control form-control-lg my-3" placeholder="Last Name" />
                                <input type="email" name="mem_mail" class="form-control form-control-lg my-3" placeholder="Email">
                                <input type="tel" name="mem_phone" class="form-control  form-control-lg my-3" placeholder="Phone" />
                                <textarea rows="4" class="form-control form-control-lg my-3" name="mem_address"
                                    placeholder="Address"></textarea>
                                <select class="form-select form-select-lg my-3" name="mem_status">
                                    <option value="user">User</option>
                                    <option value="rest">Restaurant</option>
                                    <option value="rider">Rider</option>
                                </select>
                                <h4>Picture Profile</h4>
                                <input type="file" name="file" class="form-control form-control-lg my-3" />
                                <button type="submit" name="submit" value="submit"
                                    class="btn btn-success btn-lg form-control mb-2 ">Sign Up</button>
                                <hr>
                                <h5>Already have an Account ?? <b onclick="location.href='../index.php';" style="color: blue;"> &nbsp;Sign in</b></h5>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>