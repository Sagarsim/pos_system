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
		<title>jQuery Boilerplate</title>
	</head>
	<body>
		<table>
        <thead>
                                            <tr>
                                                <th>Item Name</th>
                                                <th>Description</th>
                                                <th>ERP code</th>
                                                <th>UOM</th>
                                                <th>Item Price</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT * FROM `tbl_items`";
                                            $result = $conn->query($sql);
                                            while($row=$result->fetch_assoc()){?>
                                            
                                            <tr class="odd gradeX">
                                                <td><?php echo $row['item_name'];?></td>
                                                <td><?php echo $row['description'];?></td>
                                                <td><?php echo $row['erp_code'];?></td>
                                                <td><?php echo $row['uom'];?></td>
                                                <td><?php echo $row['item_price'];?></td>
                                                <td><?php 
                                                if($row['status'] == 1){
                                                    echo 'Active';
                                                } else {
                                                    echo 'Inactive';
                                                }?></td>
                                                
                                            </tr>
                                            <?php } ?>
                                        </tbody>
		</table>
	</body>
</html>
<?php
header('Content-Type: application/xls');
header('Content-Disposition: attachment; filename=itemlist.xls');
?>