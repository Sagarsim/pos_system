<?php
include "connect.php";
session_start();
if(!isset($_SESSION["id"])){
    header("Location: login.php?error=unauthorised");
    exit();
}
$invoiceno = $_POST['detailid'];

$sql = "SELECT * FROM `tbl_transation_header` `tth`
        INNER JOIN `tbl_transation_detail` `ttd` ON `tth`.`invoice` = `ttd`.`invoice`
        INNER JOIN `tbl_items` `ti` ON `ttd`.`item_id` = `ti`.`item_id`
        INNER JOIN `customer_table` `ct` ON `tth`.`customer_name` = `ct`.`name`
        WHERE `tth`.`invoice` = '$invoiceno'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
$tot=$row['total_amt'];

$date = new DateTime($row['date_time']);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Example 2</title>
    <link rel="stylesheet" href="../css/bill-style.css" media="all" />
  </head>
  <body>
    <header class="clearfix">
     
      <div id="company">
        <h2 class="name">Shankar Trading</h2>
       <!-- <div>455 Foggy Heights, AZ 85004, US</div>
        <div>(602) 519-0450</div>
        <div><a href="mailto:company@example.com">company@example.com</a></div>-->
      </div>
      </div>
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">INVOICE TO:</div>
          <h2 class="name"><?php echo $row['name']; ?></h2>
          <div class="address"><?php echo $row['address']; ?></div>
          <div class="email"><a href="#"><?php echo $row['email']; ?></a></div>
        </div>
        <div id="invoice">
          <h1>INVOICE NO: <?php echo $invoiceno;?></h1>
          <div class="date">Date of Invoice: <?php echo $date->format('M j\, Y'); ?></div>
          
        </div>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">#</th>
            <th class="desc">DESCRIPTION</th>
            <th class="unit">UNIT PRICE</th>
            <th class="qty">QUANTITY</th>
            <th class="total">TOTAL</th>
          </tr>
        </thead>
        <tbody>
        <?php
        $cnt = 1;
        mysqli_data_seek($result, 0);
        while($row=$result->fetch_assoc()){?>
          <tr>
            <td class="no"><?php echo $cnt++;?></td>
            <td class="desc"><?php echo $row['item_name'];?></td>
            <td class="unit"><?php echo $row['item_price'];?></td>
            <td class="qty"><?php echo $row['purchase_quantity'];?></td>
            <td class="total"><?php echo $row['item_price']*$row['purchase_quantity'];?></td>
          </tr>


       <?php }?>
        
          
        </tbody>
        <tfoot>
         
          <tr>
            <td colspan="2"></td>
            <td colspan="2">TAX</td>
            <td>0.00</td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">GRAND TOTAL</td>
            <td><?php echo $tot;?></td>
          </tr>
        </tfoot>
      </table>
      <div id="thanks">Thank you!</div>
      
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>
