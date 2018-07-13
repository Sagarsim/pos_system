<?php
include "connect.php";
session_start();
if(!isset($_SESSION["id"])){
    header("Location: login.php?error=unauthorised");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Example 2</title>
    <link rel="stylesheet" href="../css/tbl-style.css" media="all" />
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
      
      <table border="0" cellspacing="0" cellpadding="0">
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
     
      
    </main>
    
  </body>
</html>
