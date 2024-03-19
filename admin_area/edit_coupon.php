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

                    <i class="fa fa-dashboard"> </i> Dashboard / Edit Coupon

                </li>

            </ol><!-- breadcrumb Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 1 row Ends -->

    <div class="row"><!-- 2 row Starts --->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <div class="panel panel-default"><!-- panel panel-default Starts -->

                <div class="panel-heading"><!-- panel-heading Starts -->

                    <h3 class="panel-title"><!-- panel-title Starts -->

                        <i class="fa fa-money fa-fw"> </i> Edit Coupon

                    </h3><!-- panel-title Ends -->

                </div><!-- panel-heading Ends -->

                <div class="panel-body"><!--panel-body Starts -->

                    <form class="form-horizontal" method="post" action=""><!-- form-horizontal Starts -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> Coupon Title </label>

                            <div class="col-md-6">

                                <input type="text" name="coupon_title" class="form-control" value="<?php echo $c_title; ?>">

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> Coupon Price </label>

                            <div class="col-md-6">

                                <input type="text" name="coupon_price" class="form-control" value="<?php echo $c_price; ?>">

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> Coupon Code </label>

                            <div class="col-md-6">

                                <input type="text" name="coupon_code" class="form-control" value="<?php echo $c_code; ?> ">

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> Coupon Limit </label>

                            <div class="col-md-6">

                                <input type="number" name="coupon_limit" value="<?php echo $c_limit; ?>" class="form-control">

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> Select Coupon For Product or Bundle </label>

                            <div class="col-md-6">

                                <select name="product_id" class="form-control">

                                    <option value="<?php echo $product_id; ?>"> <?php echo $product_title; ?> </option>


                                    <?php

                                    //PL/SQL

                                    ?>

                                    <option></option>

                                    <option>Select Coupon for bundle</option>

                                    <option></option>

                                    <?php
                                    //PL/SQL

                                    ?>

                                </select>

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> </label>

                            <div class="col-md-6">

                                <input type="submit" name="update" class=" btn btn-primary form-control" value=" Update Coupon ">

                            </div>

                        </div><!-- form-group Ends -->

                    </form><!-- form-horizontal Ends -->

                </div><!--panel-body Ends -->

            </div><!-- panel panel-default Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 2 row Ends --->

    <?php
    //PL/SQL

    ?>

<?php } ?>