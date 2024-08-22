<?php
include('../connect.php');
session_start();

$res_name = '';

if (isset($_GET['res_name'])) {
    $res_name =  $_GET['res_name'];
}

$cate_id = isset($_GET['cate_id']) ? $_GET['cate_id'] : null;

// สร้างคำสั่ง SQL สำหรับการค้นหาหรือการกรองตามหมวดหมู่และชื่อร้าน
$sql = "SELECT 
            m.menu_id, 
            m.res_id, 
            m.cate_menu_id, 
            m.menu_name, 
            m.menu_price, 
            m.m_img, 
            r.res_name, 
            c.cate_menu_name
        FROM 
            menu m
        LEFT JOIN 
            restaurant r ON m.res_id = r.res_id
        LEFT JOIN 
            cate_menu c ON m.cate_menu_id = c.cate_menu_id";

if ($cate_id) {
    $sql .= " WHERE m.cate_menu_id = $cate_id";
}

if (!empty($res_name)) {
    if ($cate_id) {
        $sql .= " AND r.res_name LIKE '%$res_name%'";
    } else {
        $sql .= " WHERE r.res_name LIKE '%$res_name%'";
    }
}

$query = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('../asset/head/head-user.php'); ?>
    <style>
        .order-qty {
            width: 60px; /* Adjust width as needed */
            text-align: center; /* Align text to center */
            border: none; /* Hide border */
            padding: 0; /* Remove padding to fit nicely */
        }
        .order-qty-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
    </style>
</head>

<body>

    <div class="container-fluid content">
        <div class="card shadow p-5 mb-5 bg-body rounded">
            <div class="row justify-content-center mb-4">
                <div class="col-md-6">
                    <form action="" method="GET">
                        <div class="input-group mb-3">
                            <input type="text" name="res_name" class="form-control" placeholder="Search for restaurants"
                                value="<?php echo $res_name; ?>">
                            <button class="btn btn-secondary" type="submit">Search</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="category">
                <a href="?cate_id=0" class="btn btn-secondary"
                    style="border-radius: 50px; padding: 10px 20px;">All</a>&nbsp;
                <?php
                $sql_cate = "SELECT cate_menu_id, cate_menu_name FROM cate_menu";
                $query_cate = mysqli_query($conn, $sql_cate);
                if (mysqli_num_rows($query_cate) > 0) {
                    while ($row_cate = mysqli_fetch_array($query_cate)) {
                        echo '<a href="?cate_id=' . $row_cate['cate_menu_id'] . '" class="btn btn-secondary" style="border-radius: 50px; padding: 10px 20px;">' . $row_cate['cate_menu_name'] . '</a>&nbsp;';
                    }
                }
                ?>
            </div>
            <br>
            <div class="row ">
                <?php
                if (mysqli_num_rows($query) > 0) {
                    while ($result = mysqli_fetch_array($query)) {
                        ?>
                        <!-- In restaurant.php -->
                        <div class="col-lg-2 col-md-4 mb-4 ">
                            <form action="config_cart.php" method="POST">
                                <div class="card border-0">
                                    <img src="../asset/uploads/<?php echo $result['m_img']; ?>" class="card-img-top rounded shadow"
                                        style="width: 100%; height: 200px; object-fit: cover;">
                                    <div class="card-body">
                                        <h5 class="card-title d-flex justify-content-between">
                                            <span><?php echo $result['menu_name']; ?></span>
                                            <b class="text-secondary"><?php echo $result['menu_price']; ?> ฿</b>
                                        </h5>
                                        <p class="text-muted">• <?php echo $result['res_name']; ?> •
                                            <?php echo $result['cate_menu_name']; ?></p>
                                        <div class="order-qty-container mt-3">
                                            <input type="hidden" name="mem_id" value="<?php echo $_SESSION['mem_id']; ?>">
                                            <input type="hidden" name="menu_id" value="<?php echo $result['menu_id']; ?>">
                                            <input type="hidden" name="res_id" value="<?php echo $result['res_id']; ?>">
                                            <input type="hidden" name="menu_name" value="<?php echo $result['menu_name']; ?>">
                                            <input type="hidden" name="menu_price" value="<?php echo $result['menu_price']; ?>">
                                            <input type="number" name="order_qty" class="order-qty" value="1" min="1">
                                            <input type="hidden" name="cate_menu_id"
                                                value="<?php echo $result['cate_menu_id']; ?>">
                                            <button type="submit" name="add" class="btn btn-primary btn-sm">Add to Cart</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <?php
                    }
                } else {
                    echo '<p class="text-center">ไม่พบผลลัพธ์การค้นหา</p>';
                }
                ?>
            </div>
        </div>
    </div>

</body>

</html>
