<?php

include "connect.php";
if(isset($_POST['add_user'])){
session_start();

$uname =mysqli_real_escape_string($conn, $_POST['username']);
$fname =mysqli_real_escape_string($conn, $_POST['fname']);
$lname =mysqli_real_escape_string($conn, $_POST['lname']);
$password =mysqli_real_escape_string($conn, $_POST['password']);
$type = mysqli_real_escape_string($conn, $_POST['type']);
$status = mysqli_real_escape_string($conn, $_POST['status']);
$passwordcon=mysqli_real_escape_string($conn, $_POST['conpassword']);

$sql = "SELECT * FROM `tbl_user` WHERE `uname`='$uname'";
$result = $conn->query($sql);
$row = $result->num_rows;
	
	
	if ($passwordcon != $password) {
		header("Location: forms.php?error=pass");
		exit();
	}
	elseif($row > 0){
		header("Location: forms.php?error=userexists");
		exit();

	}
	else{
		$encrypted_password=password_hash($passwordcon, PASSWORD_DEFAULT);
			$sql = "INSERT INTO `tbl_user` (`uname`,`fname`, `lname`, `upass`, `type`, `status`) 
	VALUES ('$uname','$fname', '$lname', '$encrypted_password', '$type', '$status')";

	$result = $conn->query($sql);

	header("Location: tables.php?error=success_add");
	}

}
if(isset($_POST['edit_user'])){
	session_start();
	
	$uname =mysqli_real_escape_string($conn, $_POST['username']);
	$fname =mysqli_real_escape_string($conn, $_POST['fname']);
	$lname =mysqli_real_escape_string($conn, $_POST['lname']);
	$password =mysqli_real_escape_string($conn, $_POST['password']);
	$type = mysqli_real_escape_string($conn, $_POST['type']);
	$status = mysqli_real_escape_string($conn, $_POST['status']);
	$passwordcon=mysqli_real_escape_string($conn, $_POST['conpassword']);
	$editid=mysqli_real_escape_string($conn, $_POST['editid']);
		if ($passwordcon != $password) {
			header("Location: forms.php?error=pass");
			exit();
		}
		else{
			$encrypted_password=password_hash($passwordcon, PASSWORD_DEFAULT);
			$sql = "UPDATE `tbl_user` SET `fname`='$fname',
                                            `lname`='$lname',
                                            `uname`='$uname',
                                            `upass`='$encrypted_password',
                                    		`status`='$status',
                                            `type`='$type'
                                    WHERE `id`=$editid";

		$result = $conn->query($sql);
	
		header("Location: tables.php?error=success_edit");
		}
	
	}

	if(isset($_POST['add_item'])){
		session_start();
		
		$iname =mysqli_real_escape_string($conn, $_POST['iname']);
		$desc =mysqli_real_escape_string($conn, $_POST['idesc']);
		$erp =mysqli_real_escape_string($conn, $_POST['erp']);
		$uom =mysqli_real_escape_string($conn, $_POST['uom']);
		$price = mysqli_real_escape_string($conn, $_POST['iprice']);
		$status = mysqli_real_escape_string($conn, $_POST['status']);
	
		$sql = "INSERT INTO `tbl_items` (`item_name`,`description`, `erp_code`, `uom`, `item_price`, `status`) 
			VALUES ('$iname','$desc', '$erp', '$uom', '$price', '$status')";
		
			$result = $conn->query($sql);
		
			header("Location: tables2.php?error=success_add");
			
		
		}

		if(isset($_POST['edit_item'])){
			session_start();
			
			$iname =mysqli_real_escape_string($conn, $_POST['iname']);
		$desc =mysqli_real_escape_string($conn, $_POST['idesc']);
		$erp =mysqli_real_escape_string($conn, $_POST['erp']);
		$uom =mysqli_real_escape_string($conn, $_POST['uom']);
		$price = mysqli_real_escape_string($conn, $_POST['iprice']);
		$status = mysqli_real_escape_string($conn, $_POST['status']);
			$editid=mysqli_real_escape_string($conn, $_POST['editid']);
				
				
					$encrypted_password=password_hash($passwordcon, PASSWORD_DEFAULT);
					$sql = "UPDATE `tbl_items` SET `item_name`='$iname',
													`description`='$desc',
													`erp_code`='$erp',
													`uom`='$uom',
													`item_price`='$price',
													`status`='$status'
											WHERE `id`=$editid";
		
				$result = $conn->query($sql);
			
				header("Location: tables2.php?error=success_edit");
				
			
			}

			if(isset($_POST['add_customer'])){
				session_start();
				
				$name =mysqli_real_escape_string($conn, $_POST['name']);
				$desc =mysqli_real_escape_string($conn, $_POST['idesc']);
				$erp =mysqli_real_escape_string($conn, $_POST['erp_code']);
				$email =mysqli_real_escape_string($conn, $_POST['email']);
				$address = mysqli_real_escape_string($conn, $_POST['address']);
				$contact = mysqli_real_escape_string($conn, $_POST['contact_number']);
				$company = mysqli_real_escape_string($conn, $_POST['company_name']);
				$payment = mysqli_real_escape_string($conn, $_POST['payment_type']);
				$status = mysqli_real_escape_string($conn, $_POST['status']);
				$sql = "INSERT INTO `customer_table` (`name`,`erp_code`, `description`, `email`, `address`, `contact_number`, `company_name`, `payment_type`, `status`) 
					VALUES ('$name','$erp', '$desc', '$email', '$address', '$contact', '$company', '$payment', '$status')";
				
					$result = $conn->query($sql);
				
					header("Location: tables3.php?error=success_add");
					
				
				}
				if(isset($_POST['edit_customer'])){
					session_start();
					
					$name =mysqli_real_escape_string($conn, $_POST['name']);
					$desc =mysqli_real_escape_string($conn, $_POST['idesc']);
					$erp =mysqli_real_escape_string($conn, $_POST['erp']);
					$email =mysqli_real_escape_string($conn, $_POST['email']);
					$address = mysqli_real_escape_string($conn, $_POST['address']);
					$contact = mysqli_real_escape_string($conn, $_POST['contact_number']);
					$company = mysqli_real_escape_string($conn, $_POST['company_name']);
					$payment = mysqli_real_escape_string($conn, $_POST['payment_type']);
					$status = mysqli_real_escape_string($conn, $_POST['status']);
					$editid=mysqli_real_escape_string($conn, $_POST['editid']);
					$sql = "UPDATE `customer_table` SET `name`='$name',
													`erp_code`='$erp',
													`description`='$desc',
													`email`='$email',
													`address`='$address',
													`contact_number`='$contact',
													`company_name`='$company',
													`payment_type`='$payment',
													`status`='$status'
											WHERE `id`=$editid";
		
				$result = $conn->query($sql);
						header("Location: tables3.php?error=success_add");
						
					
					}