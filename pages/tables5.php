<?php
include "sidepanel.php";
?>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="forms5.php" method="POST">
                    <button type="submit" class="btn btn-primary btn-lg" style="float:right;margin:30px 20px 0px 0px;" name="addbtn">
                        <i class="fa fa-edit"></i> New Purchase Order</button></form>
                        
                        <h1 class="page-header">Purchase Order Details</h1>

                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                    <?php
                        $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                if(strpos($url, 'error=success_add') !== false){?>
                    <div class="alert alert-success alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                   New stock added successfully.
                                                </div>
                <?php }
                elseif(strpos($url, 'error=success_edit') !== false){?>
                <div class="alert alert-success alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                   Stock edited successfully.
                                                </div>
                <?php }?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                DataTables Advanced Tables
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">


                                <div class="dataTable_wrapper">

                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <col width="130">

                                        <thead>
                                            <tr>
                                                  <th>Customer Name</th>
                                                  <th>Employee Name</th>
                                                  <th>Total Amount</th>
                                                  <th>Date of purchase</th>
                                                  
                                                  <th>Details</th>
                                                  
                                                  <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT * FROM `tbl_transation_header`";
                                            $result = $conn->query($sql);
                                            while($row=$result->fetch_assoc()){?>

                                        <tr class="odd gradeX">
                                        <td><?php echo $row['customer_id'];?></td>
                                                <td><?php echo $row['user_id'];?></td>
                                                <td><?php echo $row['total_amt'];?></td>
                                                <td><?php echo $row['date_time'];?></td>
                                                
                                                <td class="center">
                                                      <form action="forms5.php" method="POST">
                                                      <input type="hidden" value="<?php echo $row['id']?>" name="detailid">
                                                      <button type="submit" class="btn btn-outline btn-success" name="detailbtn">Details</button>
                                                      </form>
                                                  </td>
                                                  
                                                  <td class="center">
                                                      <form action="delete_user.php" method="POST">
                                                      <input type="hidden" value="<?php echo $row['id']?>" name="deleteid">
                                                      <button type="submit" onclick="return confirm_delete()" class="btn btn-outline btn-danger" name="deletebtn_stock">Delete</button>
                                                    </form>
                                                </td>
                                       </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive
                                <div class="well">
                                    <h4>DataTables Usage Information</h4>
                                    <p>DataTables is a very flexible, advanced tables plugin for jQuery. In SB Admin, we are using a specialized version of DataTables built for Bootstrap 3. We have also customized the table headings to use Font Awesome icons in place of images. For complete documentation on DataTables, visit their website at <a target="_blank" href="https://datatables.net/">https://datatables.net/</a>.</p>
                                    <a class="btn btn-default btn-lg btn-block" target="_blank" href="https://datatables.net/">View DataTables Documentation</a>
                                </div>-->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="../js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../js/metisMenu.min.js"></script>

        <!-- DataTables JavaScript -->
        <script src="../js/dataTables/jquery.dataTables.min.js"></script>
        <script src="../js/dataTables/dataTables.bootstrap.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../js/startmin.js"></script>

        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                        responsive: true
                });
            });
            function confirm_delete(){
                var result = confirm("Want to delete?");
            if (result) {
                return true;
            } else {
                return false;
            }
            }
        </script>


    </body>
</html>
