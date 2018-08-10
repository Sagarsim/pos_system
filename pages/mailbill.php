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
                if(isset($_POST['mailbtn'])){?>
                   
                                     <div class="panel panel-default" style="margin-left:250px;">
                            <div class="panel-heading">
                                Send Mail
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form role="form" name="myForm" onsubmit="return validate()" action="sendmail.php" method="POST">
                                           
                                            
                                            <div class="form-group">

                                              <input class="form-control" type="email" name="from" placeholder="From">
                                            </div>
                                            <div class="form-group">


                                              <input class="form-control" type="email" name="to" placeholder="To">
                                            </div>
                                           
                                            <button type="submit" class="btn btn-default"  name="add_stock">Send</button>

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

                if(document.myForm.from.value == "" ||
                    document.myForm.to.value == ""){
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
