<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('../asset/head/head-user.php'); ?>
</head>

<body>


    <div class="container-fluid content">
        <div class="card shadow p-5 mb-5 bg-body rounded">
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
            <div class="row">
                <?php
                $cate_id = isset($_GET['cate_id']) ? $_GET['cate_id'] : null;

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

                $query = mysqli_query($conn, $sql);

                if (mysqli_num_rows($query) > 0) {
                    while ($result = mysqli_fetch_array($query)) {
                        ?>
                        <div class="col-lg-2 col-md-4 mb-4">
                            <form action="cart.php" method="POST">
                                <div class="card border-0">
                                    <img src="../asset/uploads/<?php echo $result['m_img']; ?>" class="card-img-top rounded"
                                        style="width: 100%; height: 200px; object-fit: cover;">
                                    <div class="card-body">
                                        <h5 class="card-title d-flex justify-content-between">
                                            <span><?php echo $result['menu_name']; ?></span>
                                            <b class="text-secondary"><?php echo $result['menu_price']; ?> ฿</b>
                                        </h5>
                                        <p class="text-muted">• <?php echo $result['res_name']; ?> •
                                            <?php echo $result['cate_menu_name']; ?>
                                        </p>
                                        <div class="d-flex justify-content-end mt-3">
                                            <input type="hidden" name="menu_id" value="<?php echo $result['menu_id']; ?>">
                                            <input type="hidden" name="m_img" value="<?php echo $result['m_img']; ?>">
                                            <input type="hidden" name="menu_name" value="<?php echo $result['menu_name']; ?>">
                                            <input type="hidden" name="menu_price" value="<?php echo $result['menu_price']; ?>">
                                            <input type="hidden" name="res_id" value="<?php echo $result['res_id']; ?>">
                                            <input type="hidden" name="cate_menu_id"
                                                value="<?php echo $result['cate_menu_id']; ?>">
                                            <button type="submit" class="btn btn-primary btn-sm">Add to Cart</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>


</body>

</html>