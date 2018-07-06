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
                                Add Item
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form role="form" name="myForm" onsubmit="return validate()" action="add_user.php" method="POST">
                                            <div class="form-group">

                                                <input class="form-control" type="text" name="iname" placeholder="Item Name">

                                            </div>
                                            <div class="form-group">

                                                <input class="form-control" type="text" name="idesc" placeholder="Description">

                                            </div>
                                            <div class="form-group">

                                                <input class="form-control" type="text" name="erp" placeholder="ERP code">
                                            </div>
                                            <div class="form-group">
                                            <input class="form-control" type="text" name="uom" placeholder="UOM">
                                            </div>
                                            <div class="form-group">
                                            <input class="form-control" type="text" name="iprice" placeholder="Item Price">
                                              </div>

                                
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control" type="text" name="status">
                                                  <option value="1">Active</option>
                                                  <option value="0">Inactive</option>
                                                </select>
                                            </div>

                                            <button type="submit" class="btn btn-default"  name="add_item">Submit</button>

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
                                    if(isset($_POST['editbtn'])){?>
                                        <?php

                                $editid = $_POST['editid'];
                                $sql = "SELECT * FROM `tbl_items` WHERE `id`=$editid";
                                $result=$conn->query($sql);
                                $row=$result->fetch_assoc();
                                ?>
                        <div class="panel panel-default" style="margin-left:250px;">
                            <div class="panel-heading">
                                Edit Item
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form role="form" name="myForm2" onsubmit="return validate2()" action="add_user.php" method="POST">
                                            <div class="form-group">

                                                <div class="form-group">

                                            <input class="form-control" type="text" name="iname" placeholder="Item Name" value="<?php echo $row['item_name'];?>">

                                            </div>
                                            <div class="form-group">

                                            <input class="form-control" type="text" name="idesc" placeholder="Description" value="<?php echo $row['description'];?>">

                                            </div>
                                            <div class="form-group">

                                            <input class="form-control" type="text" name="erp" placeholder="ERP code" value="<?php echo $row['erp_code'];?>">
                                            </div>
                                            <div class="form-group">
                                            <input class="form-control" type="text" name="uom" placeholder="UOM" value="<?php echo $row['uom'];?>">
                                            </div>
                                            <div class="form-group">
                                            <input class="form-control" type="text" name="iprice" placeholder="Item Price" value="<?php echo $row['item_price'];?>">
                                            </div>


                                            <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" type="text" name="status">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                            </select>
                                            </div>
                                            <input type="hidden" value="<?php echo $row['id'];?>" name="editid">
                                            <button type="submit" class="btn btn-default"  name="edit_item">Submit</button>

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
        
                if(document.myForm.iname.value == "" || 
                    document.myForm.idesc.value == "" ||
                    document.myForm.erp.value == "" ||
                    document.myForm.uom.value == "" ||
                    document.myForm.iprice.value == "" ||
                    document.myForm.status.value == ""){
                    $('#message').html("");
$('#message').prepend("<div class='alert alert-danger alert-dismissable' style='margin-left:250px';><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Please fill all the fields.</div>");
                    return false;
                    
                } 
        
            }
         function validate2(){   
            if(document.myForm2.iname.value == "" || 
                    document.myForm2.idesc.value == "" ||
                    document.myForm2.erp.value == "" ||
                    document.myForm2.uom.value == "" ||
                    document.myForm2.iprice.value == "" ||
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
