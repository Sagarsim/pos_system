<?php
include "connect.php";
if(isset($_POST['add_order'])){
session_start();

$cname = mysqli_real_escape_string($conn, $_POST['cname']);
$items = mysqli_real_escape_string($conn, $_POST['itemno']);
$total_amt = mysqli_real_escape_string($conn, $_POST['total_amt']);
$employee = $_SESSION['uname'];
$item_ids = $_POST['item_id'];
$item_qts = $_POST['item_qt'];

$sql = "INSERT INTO `tbl_transation_header`(`customer_name`, `employee_uname`, `total_amt`)
                           VALUES('$cname', '$employee', '$total_amt')";
$result=$conn->query($sql);
$last_id = $conn->insert_id;
$queries = "";

foreach($item_ids as $item_id){
$qts = $item_qts[$item_id];
$queries .="INSERT INTO `tbl_transation_detail`(`invoice`, `item_id`, `purchase_quantity`, `total_amt`)
                        VALUES('$last_id', '$item_id', '$qts', '$total_amt');"; 
}

$result = $conn->multi_query($queries);
header("Location: tables5.php?error=success_add");
}
?>