<?php
include "sidepanel.php";
?>

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

                    
                </div>
                <div class="col-lg-9">
                <?php
                if(isset($_POST['addbtn'])){?>
                <?php

                
                $sql = "SELECT * FROM `tbl_items`";
                $result=$conn->query($sql);
                $sql2 = "SELECT * FROM `customer_table`";
                $result2=$conn->query($sql2);
                
                ?>
                                     <div class="panel panel-default" style="margin-left:250px;">
                            <div class="panel-heading">
                                New Purchase Order
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form role="form" name="myForm" onsubmit="return validate()" action="add_order.php" method="POST" id="checkcnt">
                                            <div class="form-group">
                                            
                                            <label>Select Customer</label>
                                                <select class="form-control" type="text" name="cname">
                                                <?php
                                                    while($row2=$result2->fetch_assoc()){?>
                                                        <option value="<?php echo $row2['name'];?>"><?php echo $row2['name'];?></option>
                                                   <?php }?>
                                                </select>

                                            </div>
                                            
                                            <div class="form-group">
                                           
                                            <label>Select Item</label>
                                            <label class="inline col-md-offset-3">Quantity</label>
                                            <?php
                                                    while($row=$result->fetch_assoc()){?>
                                                        
                                                    <div class="checkbox">
                                                        <label>
                                                        <input type="checkbox" value="<?php echo $row['item_id'];?>" name="item_id[]"><?php echo $row['item_name'];?>
                                                        </label>
                                                        
                                                        <label class="col-md-offset-3">
                                                        <input class="inline" type="text" name="item_qt[<?php echo $row['item_id'];?>]"> <?php echo " ".$row['uom'];?>
                                                        </label>
                                                    </div>
                                                
                                                   <?php }?>

                                            
                                            </div>
                                            
                                            <label>Total Amount</label>
                                            <div class="form-group input-group">
                                                <input type="text" class="form-control" name="total_amt">
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
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->
        <script src="../js/jquery.min.js"></script>
        <script type="text/javascript">
       
            function validate(){

               var checkboxes = $('#checkcnt input[type="checkbox"]');
               var count = checkboxes.filter(':checked').length;
                if(count == 0){
                    $('#message').html("");
                    $('#message').prepend("<div class='alert alert-danger alert-dismissable' style='margin-left:250px';><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Please Select an Item</div>");
                    return false;
                    
           }
                if(document.myForm.total_amt.value == ""){
                    $('#message').html("");
                    $('#message').prepend("<div class='alert alert-danger alert-dismissable' style='margin-left:250px';><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Please enter total amount</div>");
                    return false;

                }

            }
            


        </script>


        <!-- jQuery -->
        

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../js/startmin.js"></script>

    </body>
</html>
