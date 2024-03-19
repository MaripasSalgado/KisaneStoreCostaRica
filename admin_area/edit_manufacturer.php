<?php


if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {


?>

    <?php
    //PL/SQL


    ?>

    <div class="row"><!-- 1 row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <ol class="breadcrumb"><!-- breadcrumb Starts -->

                <li class="active">

                    <i class="fa fa-dashboard"></i> Dashboard / Edit Manufacturer

                </li>

            </ol><!-- breadcrumb Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 1 row Ends -->


    <div class="row"><!-- 2 row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <div class="panel panel-default"><!-- panel panel-default Starts -->

                <div class="panel-heading"><!-- panel-heading Starts -->

                    <h3 class="panel-title"><!-- panel-title Starts -->

                        <i class="fa fa-money fa-fw"> </i> Edit Manufacturer

                    </h3><!-- panel-title Ends -->

                </div><!-- panel-heading Ends -->

                <div class="panel-body"><!-- panel-body Starts -->

                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> Manufacturer Name </label>

                            <div class="col-md-6">

                                <input type="text" name="manufacturer_name" class="form-control" value="<?php echo $m_title; ?>">

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> Show as Top Manufacturers </label>

                            <div class="col-md-6">

                                <input type="radio" name="manufacturer_top" value="yes" <?php if ($m_top == 'no') {
                                                                                        } else {
                                                                                            echo "checked='checked'";
                                                                                        } ?>>

                                <label> Yes </label>

                                <input type="radio" name="manufacturer_top" value="no" <?php if ($m_top == 'no') {
                                                                                            echo "checked='checked'";
                                                                                        } else {
                                                                                        } ?>>

                                <label> No </label>

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> Select Manufacturer Image </label>

                            <div class="col-md-6">

                                <input type="file" name="manufacturer_image" class="form-control">

                                <br>

                                <img src="other_images/<?php echo $m_image; ?>" width="70" height="70">

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> </label>

                            <div class="col-md-6">

                                <input type="submit" name="update" class="form-control btn btn-primary" value=" Update Manufacturer ">

                            </div>

                        </div><!-- form-group Ends -->

                    </form><!-- form-horizontal Ends -->

                </div><!-- panel-body Ends -->

            </div><!-- panel panel-default Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 2 row Ends -->

    <?php

    //PL/SQL

    ?>

<?php } ?>