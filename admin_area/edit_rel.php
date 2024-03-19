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

                    <i class="fa fa-dashboard"></i> Dashboard / Edit Relation

                </li>

            </ol><!-- breadcrumb Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 1 row Ends -->


    <div class="row"><!-- 2 row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <div class="panel panel-default"><!-- panel panel-default Starts -->

                <div class="panel-heading"><!-- panel-heading Starts -->

                    <h3 class="panel-title"><!-- panel-title Starts -->

                        <i class="fa fa-money fa-fw"></i> Edit Relation

                    </h3><!-- panel-title Ends -->

                </div><!-- panel-heading Ends -->

                <div class="panel-body"><!-- panel-body Starts -->

                    <form class="form-horizontal" action="" method="post"><!-- form-horizontal Starts -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> Relation Title </label>

                            <div class="col-md-6">

                                <input type="text" name="rel_title" class="form-control" value="<?php echo $r_title; ?>">

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> Select Product </label>

                            <div class="col-md-6">

                                <select name="product_id" class="form-control">

                                    <option value=""> </option>

                                    <?php

                                    //PL/SQL

                                    ?>

                                </select>

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> Select Bundle </label>

                            <div class="col-md-6">

                                <select name="bundle_id" class="form-control">

                                    <option value="<?php echo $b_id; ?>"> <?php echo $b_title; ?> </option>

                                    <?php
                                    //PL/SQL

                                    ?>

                                </select>

                            </div>

                        </div><!-- form-group Ends -->


                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> </label>

                            <div class="col-md-6">

                                <input type="submit" name="update" class="btn btn-primary form-control" value="Update Relation">

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