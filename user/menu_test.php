<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('../asset/head/head-user.php'); ?>
</head>

<body>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>
                </h2><br>
                <?php 
					if(!empty($_GET["memu_id"]))
					{
						if(!isset($_SESSION["intLine"]))
						{
							 $_SESSION["intLine"] = 0;
							 $_SESSION["strmemu_id"][0] = $_GET["memu_id"];
							 $_SESSION["strQty"][0] = 1;
						}else{							
							$key = array_search($_GET["memu_id"], $_SESSION["strmemu_id"]);
							if((string)$key != "")
							{
								 $_SESSION["strQty"][$key] = $_SESSION["strQty"][$key] + 1;
							}else{
								 $_SESSION["intLine"] = $_SESSION["intLine"] + 1;
								 $intNewLine = $_SESSION["intLine"];
								 $_SESSION["strmemu_id"][$intNewLine] = $_GET["memu_id"];
								 $_SESSION["strQty"][$intNewLine] = 1;
							}
						}

						  $Total = 0;
						  $SumTotal = 0;
						?>
                <table class="table">
                    <tr>
                        <th>#</th>
                        <th>รายการ</th>
                        <th>ราคา</th>
                        <th>จำนวน</th>
                        <th>รวม</th>
                    </tr>
                    <thead>
                    </thead>
                    <form action="save_order.php" method="post">
                        <div class="form-group">
                            <label>ชื่อลูกค้า</label>
                            <input type="text" name="cus_name" class="form-control input-sm" required>
                        </div>
                        <?php
                            include('../connect.php');
						  for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
						  {
							  if($_SESSION["strmemu_id"][$i] != "")
							  {
								$strSQL = "SELECT * FROM menu WHERE memu_id = '".$_SESSION["strmemu_id"][$i]."' ";
								$objQuery = mysqli_query($conn,$strSQL) or trigger_error($conn->error."[$strSQL]");
								$objResult = mysqli_fetch_assoc($objQuery);
								$Total = $_SESSION["strQty"][$i] * $objResult["menu_price"];
								$SumTotal = $SumTotal + $Total;
						?>

                        <tr>

                            <td><?=$i+1;?></td>
                            <td><input type="hidden" name="memu_name[]"
                                    value="<?=$objResult["memu_name"];?>"><?=$objResult["memu_name"];?></td>
                            <td><input type="hidden" name="menu_price[]"
                                    value="<?=$objResult["menu_price"];?>"><?=$objResult["menu_price"];?></td>
                            <td><input type="hidden" name="strQty[]"
                                    value="<?=$_SESSION["strQty"][$i];?>"><?=$_SESSION["strQty"][$i];?></td>
                            <td><input type="hidden" name="sum_price[]"
                                    value="<?php echo $Total;?>"><?=number_format($Total,2);?></td>
                        </tr>

                        <?php	
							  }
						  }
						?>
                        <tr>
                            <td colspan="4"><b>รวมทั้งหมด</b></td>
                            <td><b><input type="hidden" name="order_price"
                                        value="<?php echo $SumTotal;?>"><?=number_format($SumTotal,2);?></b></td>
                        </tr>
                </table>
                <hr>
                <input type="submit" name="btsave" class="btn btn-success" value="บันทึก"> &nbsp;
                </form>
                <a href="orders.php?clear=y" class="btn btn-warning">เลือกใหม่</a>
                <?php }?>
                <div class="col-md-3">
                    <div class="row" style="margin-top:20px;">
                        <?php 
                            include('../connect.php');
                            if(isset($_POST['menu'])) { 
                                $res_id = $_POST['res_id'];
							$sql ="SELECT * FROM menu where res_id = '$res_id' ";
							$result = mysqli_query($conn,$sql) or trigger_error($conn->error."[$sql]");
							while($data = mysqli_fetch_assoc($result)){
						?>
                        <div class="col-md-3">
                            <div class="well">
                                <img src="../asset/uploads/<?php echo $data['m_img']?>" alt="<?php echo $data['menu_name'];?>" width="250"
                                    height="250" class="img-thumbnail">
                                <p>
                                <h4>ราคา : <?php echo $data['menu_price'];?> บาท</h4>
                                </p>
                                <p>
                                <h4><a href="menu_test.php?menu_id=<?php echo $data['menu_id'];?>"
                                        class="btn btn-success">เลือก</a></h4>
                                </p>
                            </div>
                        </div>
                        <?php }}?>
                    </div>
                </div>
            </div>
        </div>
</body>
</body>

</html>