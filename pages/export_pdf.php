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
    <meta charset="utf-8" />
    <title>Export a Table to PDF Template | PrepBootstrap</title>
    
</head>
<body>

<div class="container">

<div class="page-header">
    <h1>Export a Table to PDF <small>Export an HTML TABLE to PDF</small></h1>
</div>

<!-- Export a Table to PDF - START -->
<link rel="stylesheet" type="text/css" href="/Content/font-awesome/css/font-awesome.min.css" />

<div class="container">

    <table id="exportTable" class="table table-hover">
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
</div>

<!-- you need to include the shieldui css and js assets in order for the components to work -->
<script src="../js/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="../css/all.min.css" />
<script type="text/javascript" src="../js/shieldui-all.min.js"></script>
<script type="text/javascript" src="../js/jszip.min.js"></script>

<script type="text/javascript">
    jQuery(function ($) {
            // parse the HTML table element having an id=exportTable
            var dataSource = shield.DataSource.create({
                data: "#exportTable",
                schema: {
                    type: "table",
                    fields: {
                        Firstname: { type: String },
                        Lastname: { type: String },
                        Username: { type: String },
                        Type: { type: String },
                        Status: { type: String }
                    }
                }
            });

            // when parsing is done, export the data to PDF
            dataSource.read().then(function (data) {
                var pdf = new shield.exp.PDFDocument({
                    author: "PrepBootstrap",
                    created: new Date()
                });

                pdf.addPage("a4", "portrait");

                pdf.table(
                    50,
                    50,
                    data,
                    [
                        { field: "Firstname", title: "Firstname", width: 100 },
                        { field: "Lastname", title: "Lastname", width: 100 },
                        { field: "Username", title: "Username", width: 100 },
                        { field: "Type", title: "Type", width: 100 },
                        { field: "Status", title: "Status", width: 100 }
                    ],
                    {
                        margins: {
                            top: 50,
                            left: 50
                        }
                    }
                );

                pdf.saveAs({
                    fileName: "PrepBootstrapPDF"
                });
            });
        });
</script>

<style>
    #exportButton {
        border-radius: 0;
    }
</style>

<!-- Export a Table to PDF - END -->

</div>
<script type="text/javascript">
          window.location.href="./tables.php";
      </script>
</body>
</html>