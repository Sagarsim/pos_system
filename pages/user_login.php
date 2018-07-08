<?php
include 'connect.php';

	if(isset($_REQUEST['user_login'])){
	$uname=mysqli_real_escape_string($conn, $_POST['username']);
	
	$pwd=mysqli_real_escape_string($conn, $_REQUEST['password']);
	
	$sql="SELECT * FROM `tbl_user` WHERE `uname`='$uname'";
	$result=$conn->query($sql);
	$row=$result->fetch_assoc();
$hash_pwd=$row['upass'];

$hash = password_verify($pwd, $hash_pwd);

			if($hash == 0){
			header("Location: login.php?error=uidpwd");
			exit();

			} else {
                        session_start();
						$_SESSION['id']=$row['id'];
						$_SESSION['fname']=$row['fname'];
						$_SESSION['lname']=$row['lname'];
						$_SESSION['uname']=$row['uname'];
						$_SESSION['type']=$row['type'];
						header("Location: index.php");
					exit();

			}
		}
	