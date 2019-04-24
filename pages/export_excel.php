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
		<title>Users</title>
	</head>
	<body>
		<table>
			<thead>
                <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Username</th>
                    <th>Type</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM `tbl_user`";
                $result = $conn->query($sql);
                while($row=$result->fetch_assoc()){?>
                
                <tr class="odd gradeX">
                    <td><?php echo $row['fname'];?></td>
                    <td><?php echo $row['lname'];?></td>
                    <td><?php echo $row['uname'];?></td>
                    <td><?php 
                    if($row['type'] == 1){
                        echo 'Super Admin';
                    } else {
                        echo 'Normal User';
                    }?></td>
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
header('Content-Disposition: attachment; filename=userlist.xls');
?>