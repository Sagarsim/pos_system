<?php
include "connect.php";
session_start();
if(!isset($_SESSION["id"])){
    header("Location: login.php?error=unauthorised");
    exit();
}
?> 
<!DOCTYPE html>
<html>
	<head>
		<title>Customers</title>
	</head>
	<body>
		<table>
        <thead>
          <tr>
            <th class="no">#</th>
            <th class="desc">Item Name</th>
            <th class="total">Employee</th>
            <th class="desc">Recorded Quantity</th>
            <th class="total">Daily Sell Quantity</th>
            <th class="desc">Available Quantity</th>
            <th class="total">Date</th>
            
          </tr>
        </thead>
        <tbody>
        <?php
        
        $sql = "SELECT * FROM `tbl_item_stock`";
        $result = $conn->query($sql);
        
        $cnt = 1;
        
        while($row = $result->fetch_assoc()){?>
          <tr>
            <td class="no"><?php echo $cnt++;?></td>
            <td class="desc"><?php echo $row['item_name'];?></td>
            <td class="total"><?php echo $row['employee_uname'];?></td>
            <td class="desc"><?php echo $row['recorded_quantity'];?></td>
            <td class="total"><?php echo $row['daily_sell_quantity'];?></td>
            <td class="desc"><?php echo $row['available_quantity'];?></td>
            <td class="total"><?php echo $row['date_time'];?></td>
            
          </tr>


       <?php }?>
        
          
        </tbody>
		</table>
	</body>
</html>
<?php
header('Content-Type: application/xls');
header('Content-Disposition: attachment; filename=stocklist.xls');
?>