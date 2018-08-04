<?php
include "sidepanel.php";
?>

 <style>

#overlay {
    
    
    display: none;
    left: 0;
    right: 0;
    bottom: 0;
    
    z-index: 2;
    cursor: pointer;
}
#overlay2 {
    
    
    display: none;
    left: 0;
    right: 0;
    bottom: 0;
    
    z-index: 2;
    cursor: pointer;
}
.hiddeni{
    display: none;
}



</style>

            <div id="page-wrapper">
            
            <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Forms</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-9" id="message">
                    <?php
                        $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                if(strpos($url, 'error=out_of_stock') !== false){?>
                    <div class="alert alert-danger alert-dismissable" style="margin-left:250px;">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    Item is out of stock 
                                                </div>
                <?php } ?> 
                    
                </div>
                <div class="col-lg-9">
                <?php
                if(isset($_POST['addbtn']) ||
                strpos($url, 'error=out_of_stock') !== false){?>
               
                                     <div class="panel panel-default" style="margin-left:250px;">
                            <div class="panel-heading">
                                New Purchase Order
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form role="form" name="myForm" action="add_order.php" method="POST" id="checkcnt">
                                            <div class="form-group">
                                            
                                            <label>Selected Customer</label>
                                           
                                                <input type="text" class="form-control" name="cname" readonly>
                                              </div>
                                              <div class="form-group">
                                                <button type="button" class="btn btn-default" onclick="sCustomers()">Select Customer</button>
                                            </div>  
                                            
                                            <div class="form-group">
                                           
                                            <label>Selected Items</label>
                                            <label class="inline col-md-offset-3">Quantity</label>
                                            
                                            
                                                  <div id="iadded">
                                                  </div>

                                            
                                            </div>
                                            
                                            <div class="form-group">
                                                <button type="button" class="btn btn-default" onclick="sItems()">Select items</button>
                                            </div>
                                            <label>Total Amount</label>
                                            <div class="form-group input-group">
                                                <input type="text" class="form-control" name="total_amt" id="tot_amt" readonly>
                                                <span class="input-group-addon">.00</span>
                                            </div>
                                               

                                            
                                            <button type="submit" class="btn btn-default"  name="add_order">Submit</button>

                                        </form>
                                    </div>
                                    <!-- /.col-lg-6 (nested) -->

                                </div>
                                <!-- /.row (nested) -->
                            </div>
                            <!-- /.panel-body -->

                </div><?php } ?>
                        <!-- /.panel -->




                                   



                    </div>
                    <!-- /.col-lg-9 -->
                </div>
                <!-- /.row -->
                     
               
                <div id="overlay">
                                            <div class="row">
                                                <div class="col-lg-12">
                                            <div class="panel panel-default">
                            <div class="panel-heading">
                                DataTables Advanced Tables
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                           
                    
                                <div class="dataTable_wrapper">
                                
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    
                                        <thead>
                                            <tr>
                                                <th>Item Name</th>
                                                <th>Description</th>
                                                <th>ERP code</th>
                                                <th>UOM</th>
                                                <th>Item Price</th>
                                                <th>Status</th>
                                                <th>Add</th>
                                                
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
                                                <td class="center itemsi">
                                                   
                                                <input type="button" class="btn btn-outline btn-success added" id="<?php echo $row['item_id'];?>" value="Add">
                                                
                                                <div class="row iteminfo hiddeni">
                                                            <div class="col-xs-4 checkbox">
                                                                <label>
                                                                <input type="checkbox" class="check" onchange="calc()" value="<?php echo $row['item_id'];?>" name="item_id[]" checked><?php echo $row['item_name'];?>
                                                                <input type="hidden" class="iprice" value="<?php echo $row['item_price'];?>">
                                                                </label>
                                                            </div>
                                                            <div class="col-xs-6">
                                                                <input style="margin-top:8px;"  type="text" class="qty" oninput="calc()" name="item_qt[<?php echo $row['item_id'];?>]"> <?php echo " ".$row['uom'];?>
                                                            </div>  
                                                            
                                                        </div>
                                                   
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
                        </div>
                        </div>
                    <div id="overlay2">
                    <div class="row">
                    <div class="col-lg-12">
                  
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
                                                <th>Contact Number</th>
                                                  <th>Company Name</th>
                                                  <th>Payment</th>
                                                  <th>Status</th>
                                                  <th>Select</th>
                                                  
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                             $sql= "SELECT * FROM `customer_table`";
                                             $result=$conn->query($sql);
                                            while($row=$result->fetch_assoc()){?>

                                        <tr class="odd gradeX">
                                                <td><?php echo $row['name'];?></td>
                                               <td><?php echo $row['contact_number'];?></td>
                                                <td><?php echo $row['company_name'];?></td>
                                                <td><?php
                                                if($row['payment_type'] == 0){
                                                    echo 'Cash';
                                                } else {
                                                    echo 'Credit';
                                                }?></td><td><?php
                                                if($row['status'] == 1){
                                                    echo 'Active';
                                                } else {
                                                    echo 'Inactive';
                                                }?></td>
                                                <td class="center">
                                                      <form action="forms3.php" method="POST">
                                                      <input type="hidden" value="<?php echo $row['customer_id']?>" name="detailid">
                                                      <button type="submit" class="btn btn-outline btn-success" name="detailbtn">Details</button>
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
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->
        
        <script src="../js/jquery.min.js"></script>
        <script type="text/javascript">
            
          
            function calc(){
            var sum = 0;
           $('#iadded>.iteminfo').each(function(){
                if( $(this).find('.check').is(':checked')){
                    sum += $(this).find('.iprice').val()*$(this).find('.qty').val();
                        }
                    
                });
                    
                $('input#tot_amt').val(sum);
                $('input#tot_amt').text(sum);
           
            }
            function sItems() {
                $('#overlay2>.table').removeAttr('id');
                    $('#overlay>.table').attr('id', 'dataTables-example');
                    document.getElementById("overlay").style.display = "block";
                    document.getElementById("overlay2").style.display = "none";
                   
                    
                    

                }

                function sCustomers() {
                    $('#overlay>.table').removeAttr('id');
                    $('#overlay2>.table').attr('id', 'dataTables-example');
                    document.getElementById("overlay2").style.display = "block";
                    document.getElementById("overlay").style.display = "none";
                    
                    
                }

                $(document).ready(function() {
                                $('#dataTables-example').DataTable({
                                        responsive: true
                                });
                            });

            $('.added').click(function(){
                if($(this).val() == 'Add'){
                    
                    $(this).val('Added');
                    rid = $(this).attr('id');
                    $('.itemsi').each(function(){
                        if($(this).find('.check').val() == rid){
                            $('#iadded').append($(this).find('.iteminfo').clone(true));
                            $('#iadded>.iteminfo').removeClass('hiddeni');
                        }
                    })
                }
                else if( $(this).val() == 'Added'){
                   
                    $(this).val('Add');
                    rid = $(this).attr('id');
                    $('#iadded>.iteminfo').each(function(){
                        if($(this).find('.check').val() == rid){
                            $(this).remove();
                        }
                    });
                }
               calc();
            });
            
        </script>


        <!-- jQuery -->
        

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../js/metisMenu.min.js"></script>

        <!-- DataTables JavaScript -->
        <script src="../js/dataTables/jquery.dataTables.min.js"></script>
        <script src="../js/dataTables/dataTables.bootstrap.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../js/startmin.js"></script>

    </body>
</html>
