<?php
include "connect.php";
if(isset($_POST['add_order'])){
session_start();

$cname = mysqli_real_escape_string($conn, $_POST['cname']);
$total_amt = mysqli_real_escape_string($conn, $_POST['total_amt']);
$employee = $_SESSION['uname'];
$item_ids = $_POST['item_id'];
$item_qts = $_POST['item_qt'];
$queries = "";
foreach($item_ids as $item_id){
    $qts = $item_qts[$item_id];
    $sql= "SELECT `available_quantity` FROM `tbl_item_stock` WHERE `item_id`='$item_id'";
    $result=$conn->query($sql);
    $row = $result->fetch_assoc();
    if($row['available_quantity'] < $qts){
        header("Location: forms5.php?error=out_of_stock");
        exit();
        
    } else {
        
        $final_qt = $row['available_quantity'] - $qts;
        $queries .="UPDATE `tbl_item_stock` SET `available_quantity`='$final_qt' WHERE `item_id`='$item_id';";

    }

}
$result = $conn->multi_query($queries);

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