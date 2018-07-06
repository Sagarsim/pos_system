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

<div class="container">

    <table id="exportTable" class="table table-hover">
    <thead>
    <tr>
                                                <th>ItemName</th>
                                                <th>Description</th>
                                                <th>ERPcode</th>
                                                <th>UOM</th>
                                                <th>ItemPrice</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT * FROM `tbl_items`";
                                            $result = $conn->query($sql);
                                            while($row=$result->fetch_assoc()){?>
                                            
                                            <tr class="odd gradeX">
                                                <td><?php echo $row['item_name'];?></td>
                                                <td><?php echo $row['description'];?></td>
                                                <td><?php echo $row['erp_code'];?></td>
                                                <td><?php echo $row['uom'];?></td>
                                                <td><?php echo $row['item_price'];?></td>
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
                        ItemName: { type: String },
                        Description: { type: String },
                        ERPcode: { type: String },
                        UOM: { type: String },
                        ItemPrice: { type: String },
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
                        { field: "ItemName", title: "Item Name", width: 80 },
                        { field: "Description", title: "Description", width: 80 },
                        { field: "ERPcode", title: "ERP code", width: 80 },
                        { field: "UOM", title: "UOM", width: 80 },
                        { field: "ItemPrice", title: "Item Price", width: 80 },
                        { field: "Status", title: "Status", width: 80 }
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
          window.location.href="./tables2.php";
      </script>
</body>
</html>