<?php


if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {


?>

    <div class="row"><!-- 1 row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <ol class="breadcrumb"><!-- breadcrumb Starts  --->

                <li class="active">

                    <i class="fa fa-dashboard"></i> Dashboard / View Orders

                </li>

            </ol><!-- breadcrumb Ends  --->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 1 row Ends -->


    <div class="row"><!-- 2 row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <div class="panel panel-default"><!-- panel panel-default Starts -->

                <div class="panel-heading"><!-- panel-heading Starts -->

                    <h3 class="panel-title"><!-- panel-title Starts -->

                        <i class="fa fa-money fa-fw"></i> View Orders

                    </h3><!-- panel-title Ends -->

                </div><!-- panel-heading Ends -->

                <div class="panel-body"><!-- panel-body Starts -->

                    <div class="table-responsive"><!-- table-responsive Starts -->

                        <table class="table table-bordered table-hover table-striped"><!-- table table-bordered table-hover table-striped Starts -->

                            <thead><!-- thead Starts -->

                                <tr>

                                    <th>#</th>
                                    <th>Customer</th>
                                    <th>Invoice</th>
                                    <th>Product</th>
                                    <th>Qty</th>
                                    <th>Size</th>
                                    <th>Order Date</th>
                                    <th>Total Amount</th>
                                    <th>Status</th>
                                    <th>Action</th>


                                </tr>

                            </thead><!-- thead Ends -->


                            <tbody><!-- tbody Starts -->

                                <?php

                                //PL/SQL

                                ?>

                                <tr>

                                    <td><?php echo $i; ?></td>

                                    <td>
                                        <?php
                                        //PL/SQL

                                        ?>
                                    </td>

                                    <td bgcolor="orange"><?php echo $invoice_no; ?></td>

                                    <td><?php //PL/SQL 
                                        ?></td>

                                    <td><?php //PL/SQL
                                        ?></td>

                                    <td><?php //PL/SQL 
                                        ?></td>

                                    <td>
                                        <?php
                                        //PL/SQL
                                        ?>
                                    </td>

                                    <td>$<?php echo $due_amount; ?></td>

                                    <td>
                                        //PL/SQL

                                        ?>
                                    </td>

                                    <td>

                                        <a href="index.php?order_delete=<?php echo $order_id; ?>">

                                            <i class="fa fa-trash-o"></i> Delete

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