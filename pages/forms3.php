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
                                     <div class="panel panel-default" style="margin-left:250px;">
                            <div class="panel-heading">
                                Add Customer
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form role="form" name="myForm" onsubmit="return validate()" action="add_user.php" method="POST">
                                            <div class="form-group">
                                            
                                                <input class="form-control" type="text" name="name" placeholder="Customer name">

                                            </div>
                                            <div class="form-group">
                                            
                                                <input class="form-control" type="text" name="cid" placeholder="Customer ID">

                                            </div>
                                            <div class="form-group">
                                            
                                                <input class="form-control" type="text" name="erp_code" placeholder="ERP code">
                                            </div>
                                            <div class="form-group">
                                           
                                                <input class="form-control" type="text" name="idesc" placeholder="Description">

                                            </div><div class="form-group">
                                            
                                                <input class="form-control" type="text" name="email" placeholder="Email Id">
                                            </div>
                                            <div class="form-group">

                                                
                                                <input class="form-control" type="text" name="address" placeholder="Address">
                                            </div>
                                            <div class="form-group">
                                            
                                                <input class="form-control" type="text" name="contact_number" placeholder="Contact Number">
                                            </div>
                                            <div class="form-group">
                                            
                                                <input class="form-control" type="text" name="company_name" placeholder="Company Name">
                                            </div>
                                            <div class="form-group">
                                                <label>Payment</label>
                                                <select class="form-control" type="text" name="payment_type">
                                                  <option value="0">Cash</option>
                                                  <option value="1">Credit</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control" type="text" name="status">
                                                  <option value="1">Active</option>
                                                  <option value="0">Inactive</option>
                                                </select>
                                            </div>


                                            <button type="submit" class="btn btn-default"  name="add_customer">Submit</button>

                                        </form>
                                    </div>
                                    <!-- /.col-lg-6 (nested) -->

                                </div>
                                <!-- /.row (nested) -->
                            </div>
                            <!-- /.panel-body -->

                </div><?php } ?>
                        <!-- /.panel -->




                                    <?php
                                    if(isset($_POST['editbtn'])){?>
                                        <?php

                                $editid = $_POST['editid'];
                                $sql = "SELECT * FROM `customer_table` WHERE `id`=$editid";
                                $result=$conn->query($sql);
                                $row=$result->fetch_assoc();
                                ?>
                        <div class="panel panel-default" style="margin-left:250px;">
                            <div class="panel-heading">
                                Edit Customer
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form role="form" name="myForm2" onsubmit="return validate2()" action="add_user.php" method="POST">
                                          <div class="form-group">

                                              <input class="form-control" type="text" name="name" placeholder="Customer name" value=" <?php echo $row['name'];?>">

                                          </div>
                                          <div class="form-group">
                                            
                                                <input class="form-control" type="text" name="cid" placeholder="Customer ID" value=" <?php echo $row['customer_id'];?>">

                                            </div>
                                          <div class="form-group">

                                              <input class="form-control" type="text" name="erp" placeholder="ERP code" value=" <?php echo $row['erp_code'];?>">
                                          </div>
                                          <div class="form-group">

                                              <input class="form-control" type="text" name="idesc" placeholder="Description"  value=" <?php echo $row['description'];?>">

                                          </div>
                                          <div class="form-group">

                                              <input class="form-control" type="text" name="email" placeholder="Email Id" value=" <?php echo $row['email'];?>">
                                          </div>
                                          <div class="form-group">

                                              <input class="form-control" type="text" name="address" placeholder="Address" value=" <?php echo $row['address'];?>">
                                          </div>
                                          <div class="form-group">

                                              <input class="form-control" type="text" name="contact_number" placeholder="Contact Number" value=" <?php echo $row['contact_number'];?>">
                                          </div>
                                          <div class="form-group">

                                              <input class="form-control" type="text" name="company_name" placeholder="Company Name" value=" <?php echo $row['company_name'];?>">
                                          </div>

                                          <div class="form-group">
                                              <label>Payment</label>
                                              <select class="form-control" type="text" name="payment_type">
                                                <option value="0">Cash</option>
                                                <option value="1">Credit</option>
                                              </select>
                                          </div>

                                          <div class="form-group">
                                              <label>Status</label>
                                              <select class="form-control" type="text" name="status">
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                              </select>
                                          </div>


                                            <input type="hidden" value="<?php echo $row['id'];?>" name="editid">
                                            <button type="submit" class="btn btn-default"  name="edit_customer">Edit Customer</button>

                                        </form>
                                    </div>
                                    <!-- /.col-lg-6 (nested) -->

                                </div>
                                <!-- /.row (nested) -->
                            </div>
                            <!-- /.panel-body -->

                        </div>
                        <!-- /.panel -->
                                    <?php } ?>
                                    <?php
                                    if(isset($_POST['detailbtn'])){?>
                                         <?php

                                        $editid = $_POST['detailid'];
                                        $sql = "SELECT * FROM `customer_table` WHERE `id`=$editid";
                                        $result=$conn->query($sql);
                                        $row=$result->fetch_assoc();
                                        ?>
                        <div class="panel panel-default" style="margin-left:250px;">
                            <div class="panel-heading">
                                Customer Details
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form role="form">
                                          <div class="form-group">
                                          <label>Customer Name</label>
                                              <input class="form-control" type="text" name="name" placeholder="Customer name" value=" <?php echo $row['name'];?>">

                                          </div>
                                          <label>Customer ID</label>
                                          <div class="form-group">
                                            
                                                <input class="form-control" type="text" name="cid" placeholder="Customer ID" value=" <?php echo $row['customer_id'];?>">

                                            </div>
                                          <div class="form-group">
                                          <label>ERP code</label>
                                              <input class="form-control" type="text" name="erp" placeholder="ERP code" value=" <?php echo $row['erp_code'];?>">
                                          </div>
                                          <div class="form-group">
                                          <label>Description</label>
                                              <input class="form-control" type="text" name="idesc" placeholder="Description"  value=" <?php echo $row['description'];?>">

                                          </div>
                                          <div class="form-group">
                                          <label>Email Id</label>
                                              <input class="form-control" type="text" name="email" placeholder="Email Id" value=" <?php echo $row['email'];?>">
                                          </div>
                                          <div class="form-group">
                                          <label>Address</label>
                                              <input class="form-control" type="text" name="address" placeholder="Address" value=" <?php echo $row['address'];?>">
                                          </div>
                                          <div class="form-group">
                                          <label>Contact Number</label>
                                              <input class="form-control" type="text" name="contact_number" placeholder="Contact Number" value=" <?php echo $row['contact_number'];?>">
                                          </div>
                                          <div class="form-group">
                                          <label>Company Name</label>
                                              <input class="form-control" type="text" name="company_name" placeholder="Company Name" value=" <?php echo $row['company_name'];?>">
                                          </div>

                                          <div class="form-group">
                                          <label>Payment</label>
                                          <input class="form-control" type="text" name="payment_type" value=" <?php
                                                if($row['payment_type'] == 0){
                                                    echo 'Case';
                                                } else {
                                                    echo 'Credit';
                                                }?>">
                                          </div>

                                          <div class="form-group">
                                          <label>Status</label>
                                          <input class="form-control" type="text" name="status" value=" <?php
                                                if($row['status'] == 1){
                                                    echo 'Active';
                                                } else {
                                                    echo 'Inactive';
                                                }?>">
                                          </div>


                            

                                        </form>
                                    </div>
                                    <!-- /.col-lg-6 (nested) -->

                                </div>
                                <!-- /.row (nested) -->
                            </div>
                            <!-- /.panel-body -->

                        </div>
                        <!-- /.panel -->
                                    <?php } ?>








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
