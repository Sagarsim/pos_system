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
            <th class="desc">Name</th>
            <th class="total">Username</th>
            <th class="desc">Designation</th>
            <th class="total">Status</th>
            
          </tr>
        </thead>
        <tbody>
        <?php
        
        $sql = "SELECT * FROM `tbl_user`";
        $result = $conn->query($sql);
        
        $cnt = 1;
        
        while($row = $result->fetch_assoc()){?>
          <tr>
            <td class="no"><?php echo $cnt++;?></td>
            <td class="desc"><?php echo $row['fname']." ".$row['lname'];?></td>
            <td class="total"><?php echo $row['uname'];?></td>
            <td class="desc"><?php 
                    if($row['type'] == 1){
                        echo 'Super Admin';
                    } else {
                        echo 'Normal User';
                    }?></td>
                    <td class="total"><?php 
                    if($row['status'] == 1){
                        echo 'Active';
                    } else {
                        echo 'Inactive';
                    }?></td>
            
          </tr>


       <?php }?>
        
          
        </tbody>
        
      </table>
     
      
    </main>
    
  </body>
</html>
