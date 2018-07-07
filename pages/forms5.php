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
                                        <form role="form" name="myForm" onsubmit="return validate()" action="add_user.php" method="POST">
                                            <div class="form-group">
                                            
                                            <label>Select Customer</label>
                                                <select class="form-control" type="text" name="status">
                                                <?php
                                                    while($row2=$result2->fetch_assoc()){?>
                                                        <option value="<?php echo $row2['customer_id'];?>"><?php echo $row2['name'];?></option>
                                                   <?php }?>
                                                </select>

                                            </div>
                                            
                                            <div class="form-group">
                                           
                                            <label>Select Item</label>
                                                <select class="form-control" type="text" name="status">
                                                <?php
                                                    while($row=$result->fetch_assoc()){?>
                                                        <option value="<?php echo $row['item_id'];?>"><?php echo $row['item_name'];?></option>
                                                   <?php }?>
                                                  
                                                </select>

                                            </div>
                                            <div class="form-group">
                                            <label>Purchase Quantity</label>
                                                <input class="form-control" type="text" name="email" placeholder="Purchase Quantity">
                                            </div>
                                            <div class="form-group">
                                            
                                            <label>Salesman ID</label>
                                                <select class="form-control" type="text" name="status">
                                                   
                                                
                                                  <option value="1">1221</option>
                                                  <option value="0">2342</option>
                                                </select>
                                            </div>
                                            <label>Total Amount</label>
                                            <div class="form-group input-group">
                                            
                                                <span class="input-group-addon"><i class="fa fa-inr"></i>
                                                </span>
                                                <input type="text" class="form-control">
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
        <script type="text/javascript">

            function validate(){

                if(document.myForm.name.value == "" ||
                    document.myForm.erp.value == "" ||
                    document.myForm.idesc.value == "" ||
                    document.myForm.email.value == "" ||
                    document.myForm.address.value == "" ||
                    document.myForm.contact_number.value == "" ||
                    document.myForm.company_name.value == "" ||
                   document.myForm.payment_type.value == ""||
                   document.myForm.status.value == ""){
                    $('#message').html("");
$('#message').prepend("<div class='alert alert-danger alert-dismissable' style='margin-left:250px';><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Please fill all the fields.</div>");
                    return false;

                }

            }
         function validate2(){
            if(document.myForm2.name.value == "" ||
                document.myForm2.erp.value == "" ||
                document.myForm2.idesc.value == "" ||
                document.myForm2.email.value == "" ||
                document.myForm2.address.value == "" ||
                document.myForm2.contact_number.value == "" ||
                document.myForm2.company_name.value == "" ||
               document.myForm2.payment_type.value == ""||
               document.myForm2.status.value == ""){
                       $('#message').html("");
$('#message').prepend("<div class='alert alert-danger alert-dismissable' style='margin-left:250px';><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Please fill all the fields.</div>");
return false;
                    }

                }


        </script>


        <!-- jQuery -->
        <script src="../js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../js/startmin.js"></script>

    </body>
</html>
