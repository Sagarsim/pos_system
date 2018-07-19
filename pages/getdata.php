<?php
include "connect.php";
$sql = "SELECT `date_time`,`item_name`,`purchase_quantity`*`item_price` AS `total` FROM `tbl_transation_header` `tth`
        INNER JOIN `tbl_transation_detail` `ttd`
        ON `tth`.`invoice` = `ttd`.`invoice`
        INNER JOIN `tbl_items` `ti`
        ON `ttd`.`item_id` = `ti`.`item_id`";
$result=$conn->query($sql);
$data = array();
$iname = array();
$date = array();
$i = 0;
while($row = $result->fetch_assoc()){
$data[$i] = $row['total'];
$iname[$i] = $row['item_name'];
$date[$i] = $row['date_time'];
$i++;
}

$sql2 = "SELECT DISTINCT `date_time` FROM `tbl_transation_header`";
$result2 = $conn->query($sql2);

$eachdate = array();
$unique_date = array();
$y = 0;
while($unidate = $result2->fetch_assoc()){
        $unique_date[$y] = $unidate['date_time'];
       $x = array(); 
        for($i=0;$i<sizeof($date);$i++){
                if($date[$i] == $unidate['date_time']){
                        array_push($x, $i);
                }
        }
        array_push($eachdate, $x);
        $y++;
}

$final = array($data, $iname, $unique_date, $eachdate);
echo json_encode($final);


?>