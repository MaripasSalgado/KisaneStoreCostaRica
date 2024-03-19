<?php


if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {


?>




    <div class="row"><!-- 1 row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <ol class="breadcrumb"><!-- breadcrumb Starts -->

                <li class="active">

                    <i class="fa fa-dashboard"></i> Dashboard / View store

                </li>

            </ol><!-- breadcrumb Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 1 row Ends -->

    <div class="row"><!-- 2 row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <div class="panel panel-default"><!-- panel panel-default Starts -->

                <div class="panel-heading"><!-- panel-heading Starts -->

                    <h3 class="panel-title">

                        <i class="fa fa-money fa-fw"></i> View store

                    </h3>

                </div><!-- panel-heading Ends -->

                <div class="panel-body"><!-- panel-body Starts -->

                    <?php

                    //PL/SQL
                    ?>

                    <div class="col-lg-4 col-md-4"><!-- col-lg-4 col-md-4 Starts -->

                        <div class="panel panel-primary"><!-- panel panel-primary Starts -->

                            <div class="panel-heading"><!-- panel-heading Starts -->

                                <h3 class="panel-title" align="center">

                                    <?php echo $store_title; ?>

                                </h3>

                            </div><!-- panel-heading Ends -->

                            <div class="panel-body"><!-- panel-body Starts -->

                                <img src="store_images/<?php echo $store_image; ?>" class="img-responsive">

                                <br>

                                <p><?php echo $store_desc; ?></p>

                            </div><!-- panel-body Ends -->

                            <div class="panel-footer"><!-- panel-footer Starts -->

                                <a href="index.php?delete_store=<?php echo $store_id; ?>" class="pull-left">

                                    <i class="fa fa-trash-o"></i> Delete

                                </a>

                                <a href="index.php?edit_store=<?php echo $store_id; ?>" class="pull-right">

                                    <i class="fa fa-pencil"></i> Edit

                                </a>

                                <div class="clearfix"> </div>

                            </div><!-- panel-footer Ends -->

                        </div><!-- panel panel-primary Ends -->

                    </div><!-- col-lg-4 col-md-4 Ends -->

                <?php } ?>

                </div><!-- panel-body Ends -->

            </div><!-- panel panel-default Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 2 row Ends -->




    <?php  ?>