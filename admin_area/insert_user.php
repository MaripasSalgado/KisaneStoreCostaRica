<?php



if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {

?>


    <div class="row"><!-- 1  row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <ol class="breadcrumb"><!-- breadcrumb Starts -->

                <li class="active">

                    <i class="fa fa-dashboard"></i> Dashboard / Insert User

                </li>



            </ol><!-- breadcrumb Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 1  row Ends -->

    <div class="row"><!-- 2 row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <div class="panel panel-default"><!-- panel panel-default Starts -->

                <div class="panel-heading"><!-- panel-heading Starts -->

                    <h3 class="panel-title">

                        <i class="fa fa-money fa-fw"></i> Insert User

                    </h3>


                </div><!-- panel-heading Ends -->


                <div class="panel-body"><!-- panel-body Starts -->

                    <form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label">User Name: </label>

                            <div class="col-md-6"><!-- col-md-6 Starts -->

                                <input type="text" name="admin_name" class="form-control" required>

                            </div><!-- col-md-6 Ends -->

                        </div><!-- form-group Ends -->


                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label">User Email: </label>

                            <div class="col-md-6"><!-- col-md-6 Starts -->

                                <input type="text" name="admin_email" class="form-control" required>

                            </div><!-- col-md-6 Ends -->

                        </div><!-- form-group Ends -->


                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label">User Password: </label>

                            <div class="col-md-6"><!-- col-md-6 Starts -->

                                <input type="password" name="admin_pass" class="form-control" required>

                            </div><!-- col-md-6 Ends -->

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label">User Country: </label>

                            <div class="col-md-6"><!-- col-md-6 Starts -->

                                <input type="text" name="admin_country" class="form-control" required>

                            </div><!-- col-md-6 Ends -->

                        </div><!-- form-group Ends -->


                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label">User Job: </label>

                            <div class="col-md-6"><!-- col-md-6 Starts -->

                                <input type="text" name="admin_job" class="form-control" required>

                            </div><!-- col-md-6 Ends -->

                        </div><!-- form-group Ends -->


                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label">User Contact: </label>

                            <div class="col-md-6"><!-- col-md-6 Starts -->

                                <input type="text" name="admin_contact" class="form-control" required>

                            </div><!-- col-md-6 Ends -->

                        </div><!-- form-group Ends -->


                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label">User About: </label>

                            <div class="col-md-6"><!-- col-md-6 Starts -->

                                <textarea name="admin_about" class="form-control" rows="3"> </textarea>

                            </div><!-- col-md-6 Ends -->

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label">User Image: </label>

                            <div class="col-md-6"><!-- col-md-6 Starts -->

                                <input type="file" name="admin_image" class="form-control" required>

                            </div><!-- col-md-6 Ends -->

                        </div><!-- form-group Ends -->


                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"></label>

                            <div class="col-md-6"><!-- col-md-6 Starts -->

                                <input type="submit" name="submit" value="Insert User" class="btn btn-primary form-control">

                            </div><!-- col-md-6 Ends -->

                        </div><!-- form-group Ends -->


                    </form><!-- form-horizontal Ends -->

                </div><!-- panel-body Ends -->

            </div><!-- panel panel-default Ends -->

        </div><!-- col-lg-12 Ends -->


    </div><!-- 2 row Ends -->

<?php

    //PL/SQL

    if ($run_admin) {

        echo "<script>alert('One User Has Been Inserted successfully')</script>";

        echo "<script>window.open('index.php?view_users','_self')</script>";
    }
}


?>



<?php  ?>