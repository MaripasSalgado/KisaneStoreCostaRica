<?php


if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {


?>

    <div class="row"><!-- 1 row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <ol class="breadcrumb"><!-- breadcrumb Starts -->

                <li class="active">

                    <i class="fa fa-dashboard"></i> Dashboard / View Coupons

                </li>

            </ol><!-- breadcrumb Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 1 row Ends -->

    <div class="row"><!-- 2 row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <div class="panel panel-default"><!-- panel panel-default Starts -->

                <div class="panel-heading"><!-- panel-heading Starts -->

                    <h3 class="panel-title"><!-- panel-title Starts -->

                        <i class="fa fa-money fa-fw"></i> View Coupons

                    </h3><!-- panel-title Ends -->

                </div><!-- panel-heading Ends -->

                <div class="panel-body"><!-- panel-body Starts -->

                    <div class="table-responsive"><!-- table-responsive Starts -->

                        <table class="table table-bordered table-hover table-striped"><!-- table table-bordered table-hover table-striped Starts -->

                            <thead><!-- thead Starts -->

                                <tr>

                                    <th>#</th>
                                    <th>Title </th>
                                    <th>Product </th>
                                    <th>Coupon Price </th>
                                    <th>Code </th>
                                    <th>Limit </th>
                                    <th>Used </th>
                                    <th>Delete </th>
                                    <th>Edit </th>

                                </tr>

                            </thead><!-- thead Ends -->

                            <tbody><!-- tbody Starts -->

                                <?php

                                //PL/SQL

                                ?>

                                <tr>

                                    <td></td>

                                    <td></td>

                                    <td></td>

                                    <td></td>

                                    <td></td>

                                    <td></td>

                                    <td></td>

                                    <td>

                                        <a href="index.php?delete_coupon=<?php echo $coupon_id; ?>">

                                            <i class="fa fa-trash-o"></i> Delete

                                        </a>

                                    </td>

                                    <td>

                                        <a href="index.php?edit_coupon=<?php echo $coupon_id; ?>">

                                            <i class="fa fa-pencil"></i> Edit

                                        </a>

                                    </td>

                                </tr>

                            <?php } ?>

                            </tbody><!-- tbody Ends -->

                        </table><!-- table table-bordered table-hover table-striped Ends -->

                    </div><!-- table-responsive Ends -->

                </div><!-- panel-body Ends -->

            </div><!-- panel panel-default Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 2 row Ends -->

    <?php  ?>