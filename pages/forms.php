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

                    <?php
                        $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                if(strpos($url, 'error=userexists') !== false){?>
                    <div class="alert alert-danger alert-dismissable" style="margin-left:250px;">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    This username already exists. 
                                                </div>
                <?php } 
                elseif(strpos($url, 'error=pass') !== false){ ?>
                    <div class="alert alert-danger alert-dismissable" style="margin-left:250px;">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    Confirm password incorrect. 
                                                </div>
                <?php } 
                elseif(strpos($url, 'error=pass_edit') !== false){ ?>
                    <div class="alert alert-danger alert-dismissable" style="margin-left:250px;">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    Confirm password incorrect. 
                                                </div>
                <?php }?>
                </div>
                <div class="col-lg-9">
                                <?php
                                if(isset($_POST['addbtn']) || 
                                strpos($url, 'error=userexists') !== false ||
                                strpos($url, 'error=pass') !== false){?>
    
                                     <div class="panel panel-default" style="margin-left:250px;">
                            <div class="panel-heading">
                                Add User
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form role="form" name="myForm" onsubmit="return validate()" action="add_user.php" method="POST">
                                            <div class="form-group">

                                                <input class="form-control" type="text" name="fname" placeholder="Firstname">

                                            </div>
                                            <div class="form-group">

                                                <input class="form-control" type="text" name="lname" placeholder="Lastname">

                                            </div>
                                            <div class="form-group">

                                                <input class="form-control" type="text" name="username" placeholder="Username">
                                            </div>
                                            <div class="form-group">
                                            <input class="form-control" type="password" name="password" placeholder="Password">
                                            </div>
                                            <div class="form-group">
                                            <input class="form-control" type="password" name="conpassword" placeholder="Confirm Password">
                                              </div>

                                            <div class="form-group">
                                                <label>Designation</label>
                                                <select class="form-control" type="text" name="type">
                                                  <option value="1">Super Admin</option>
                                                  <option value="2">Normal User</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control" type="text" name="status">
                                                  <option value="1">Active</option>
                                                  <option value="0">Inactive</option>
                                                </select>
                                            </div>

                                            <button type="submit" class="btn btn-default"  name="add_user">Submit</button>

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
                                    if(isset($_POST['editbtn']) ||
                                    strpos($url, 'error=pass_edit') !== false){?>
                                        <?php

                                $editid = $_POST['editid'];
                                $sql = "SELECT * FROM `tbl_user` WHERE `id`=$editid";
                                $result=$conn->query($sql);
                                $row=$result->fetch_assoc();
                                ?>
                        <div class="panel panel-default" style="margin-left:250px;">
                            <div class="panel-heading">
                                Edit User
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form role="form" name="myForm2" onsubmit="return validate2()" action="add_user.php" method="POST">
                                            <div class="form-group">

                                                <input class="form-control" type="text" name="fname" placeholder="Firstname" value="<?php echo $row['fname'];?>">

                                            </div>
                                            <div class="form-group">

                                                <input class="form-control" type="text" name="lname" placeholder="Lastname" value="<?php echo $row['lname'];?>">

                                            </div>
                                            <div class="form-group">

                                                <input class="form-control" type="text" name="username" placeholder="Username" value="<?php echo $row['uname'];?>">
                                            </div>
                                            <div class="form-group">
                                            <input class="form-control" type="password" name="password" placeholder="Password">
                                            </div>
                                            <div class="form-group">
                                            <input class="form-control" type="password" name="conpassword" placeholder="Confirm Password">
                                              </div>

                                            <div class="form-group">
                                                <label>Designation</label>
                                                <select class="form-control" type="text" name="type">
                                                  <option value="1">Super Admin</option>
                                                  <option value="2">Normal User</option>
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
                                            <button type="submit" class="btn btn-default"  name="edit_user">Edit User</button>

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
        
                if(document.myForm.username.value == "" || 
                    document.myForm.fname.value == "" ||
                    document.myForm.lname.value == "" ||
                    document.myForm.conpassword.value == "" ||
                    document.myForm.password.value == "" ||
                    document.myForm.type.value == "" || 
                    document.myForm.status.value == ""){
                    $('#message').html("");
$('#message').prepend("<div class='alert alert-danger alert-dismissable' style='margin-left:250px';><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Please fill all the fields.</div>");
                    return false;
                    
                } 
        
            }
         function validate2(){   
            if(document.myForm2.username.value == "" || 
                    document.myForm2.fname.value == "" ||
                    document.myForm2.lname.value == "" ||
                    document.myForm2.conpassword.value == "" ||
                    document.myForm2.password.value == "" ||
                    document.myForm2.type.value == "" || 
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
