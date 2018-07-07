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
                                Add Stock
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form role="form" name="myForm" onsubmit="return validate()" action="add_user.php" method="POST">
                                            <div class="form-group">


                                                <input class="form-control" type="text" name="iname" placeholder="Item name">


                                            </div>
                                            <div class="form-group">

                                              <input class="form-control" type="text" name="icode" placeholder="Item code">
                                            </div>
                                            <div class="form-group">

                                              <input class="form-control" type="text" name="eid" placeholder="Employee id">

                                            </div><div class="form-group">

                                              <input class="form-control" type="text" name="rec_quantity" placeholder="Recorded quantity">
                                            </div>
                                            <div class="form-group">


                                              <input class="form-control" type="text" name="daily_quantity" placeholder="Daily sell quantity">
                                            </div>
                                            <div class="form-group">

                                              <input class="form-control" type="text" name="avai_quantity" placeholder="Available quantity">
                                            </div>

                                            <button type="submit" class="btn btn-default"  name="add_stock">Add Stock</button>

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
                                $sql = "SELECT * FROM `tbl_item_stock` WHERE `id`=$editid";
                                $result=$conn->query($sql);
                                $row=$result->fetch_assoc();
                                ?>
                        <div class="panel panel-default" style="margin-left:250px;">
                            <div class="panel-heading">
                                Edit Stock
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form role="form" name="myForm2" onsubmit="return validate2()" action="add_user.php" method="POST">
                                          <div class="form-group">

                                              <input class="form-control" type="text" name="iname" placeholder="Item name" value=" <?php echo $row['item_code'];?>">

                                          </div>
                                          <div class="form-group">

                                              <input class="form-control" type="text" name="icode" placeholder="Item code" value=" <?php echo $row['item_name'];?>">
                                          </div>
                                          <div class="form-group">

                                              <input class="form-control" type="text" name="eid" placeholder="Employee id"  value=" <?php echo $row['employee_id'];?>">

                                          </div>
                                          <div class="form-group">

                                              <input class="form-control" type="text" name="rec_quantity" placeholder="Recorded quantity" value=" <?php echo $row['recorded_quantity'];?>">
                                          </div>
                                          <div class="form-group">

                                              <input class="form-control" type="text" name="daily_quantity" placeholder="Daily sell quantity" value=" <?php echo $row['daily_sell_quantity'];?>">
                                          </div>
                                          <div class="form-group">

                                              <input class="form-control" type="text" name="avai_quantity" placeholder="Available quantity" value=" <?php echo $row['available_quantity'];?>">
                                          </div>


                                            <input type="hidden" value="<?php echo $row['id'];?>" name="editid">
                                            <button type="submit" class="btn btn-default"  name="edit_stock">Edit Stock</button>

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
                    document.myForm.icode.value == "" ||
                    document.myForm.eid.value == "" ||
                    document.myForm.rec_quantity.value == "" ||
                    document.myForm.daily_quantity.value == "" ||
                    document.myForm.avai_quantity.value == ""){
                    $('#message').html("");
$('#message').prepend("<div class='alert alert-danger alert-dismissable' style='margin-left:250px';><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Please fill all the fields.</div>");
                    return false;

                }

            }
         function validate2(){
            if(document.myForm2.iname.value == "" ||
                    document.myForm2.icode.value == "" ||
                    document.myForm2.eid.value == "" ||
                    document.myForm2.rec_quantity.value == "" ||
                    document.myForm2.daily_quantity.value == "" ||
                    document.myForm2.avai_quantity.value == ""){
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
