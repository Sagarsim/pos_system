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
            <th class="desc">Customer Name</th>
            <th class="total">Description</th>
            <th class="desc">ERP code</th>
            <th class="total">Email</th>
            <th class="desc">Address</th>
            <th class="total">Contact</th>
            <th class="desc">Company</th>
            <th class="total">Payment Type</th>
            <th class="desc">Status</th>
            
          </tr>
        </thead>
        <tbody>
        <?php
        
        $sql = "SELECT * FROM `customer_table`";
        $result = $conn->query($sql);
        
        $cnt = 1;
        
        while($row = $result->fetch_assoc()){?>
          <tr>
            <td class="no"><?php echo $cnt++;?></td>
            <td class="desc"><?php echo $row['name'];?></td>
            <td class="total"><?php echo $row['description'];?></td>
            <td class="desc"><?php echo $row['erp_code'];?></td>
            <td class="total"><?php echo $row['email'];?></td>
            <td class="desc"><?php echo $row['address'];?></td>
            <td class="total"><?php echo $row['contact_number'];?></td>
            <td class="desc"><?php echo $row['company_name'];?></td>
            
                    <td class="total"><?php 
                    if($row['payment_type'] == 0){
                        echo 'Cash';
                    } else {
                        echo 'Credit';
                    }?></td>
                    <td class="desc"><?php 
                    if($row['status'] == 1){
                        echo 'Active';
                    } else {
                        echo 'Inactive';
                    }?></td>
            
          </tr>


       <?php }?>
        
          
        </tbody>
		</table>
	</body>
</html>
<?php
header('Content-Type: application/xls');
header('Content-Disposition: attachment; filename=customerlist.xls');
?>