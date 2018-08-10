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
                                        <form name="myForm" enctype="multipart/form-data">
                                           
                                        <div class="form-group">


                                        <input class="form-control" type="email" name="to" placeholder="To">
                                        </div>
                                            <div class="form-group">

                                              <input class="form-control" type="email" name="from" placeholder="From">
                                            </div>
                                            <div class="form-group">

                                              <input class="form-control" type="text" name="sub" placeholder="Subject">
                                            </div>
                                            
                                            <div class="form-group">
                                            <label>Body</label>
                                            <textarea class="form-control" rows="3" name="body"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Attach file</label>
                                                <input type="file" name="billpdf">
                                            </div>
                                           
                                           
                                            <button type="submit" class="btn btn-default"  name="sendmail"  onclick="sendMail()">Send</button>

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
function sendMail(){
    if(document.myForm.from.value == "" ||
                    document.myForm.to.value == "" ||
                    document.myForm.sub.value == ""){
                    $('#message').html("");
                    $('#message').prepend("<div class='alert alert-danger alert-dismissable' style='margin-left:250px';><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Please fill all the fields.</div>");
                    event.preventDefault();

                } else {
                    $('#message').html("");
                    $('#message').prepend("<div class='alert alert-success alert-dismissable' style='margin-left:250px';><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Sending mail...</div>");
                    event.preventDefault();
            var formData = new FormData();

                formData.append("to", document.myForm.to.value);
                formData.append("from", document.myForm.from.value);
                formData.append("sub", document.myForm.sub.value);
                formData.append("body", document.myForm.body.value);
                formData.append("billpdf", document.myForm.billpdf.files[0]);
                            getdata = new XMLHttpRequest();
                    getdata.onreadystatechange=function() {
                        if (this.readyState==4 && this.status==200) {
                            if(this.responseText == "success"){
                                $('#message').html("");
                                $('#message').prepend("<div class='alert alert-success alert-dismissable' style='margin-left:250px';><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Mail sent successfully</div>");
                               
                            } else {
                                $('#message').html("");
                                $('#message').prepend("<div class='alert alert-danger alert-dismissable' style='margin-left:250px';><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Some error occured. Please try again</div>");
                               
                            }
                            
                            
                        }
                    }
                getdata.open("POST", "sendmail.php" );
                getdata.send(formData);
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
