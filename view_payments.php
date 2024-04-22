<?php
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
?>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard / View Payments
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-money fa-fw"></i> View Payments
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Invoice No</th>
                                    <th>Amount Paid</th>
                                    <th>Payment Method</th>
                                    <th>Reference #</th>
                                    <th>Payment Code</th>
                                    <th>Payment Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "CALL GetAllPayments()";
                                $stmt = $pdo->prepare($query);
                                $stmt->execute();
                                $i = 0;
                                while ($row_payments = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    $payment_id = $row_payments['payment_id'];
                                    $invoice_no = $row_payments['invoice_no'];
                                    $amount = $row_payments['amount'];
                                    $payment_mode = $row_payments['payment_mode'];
                                    $ref_no = $row_payments['ref_no'];
                                    $code = $row_payments['code'];
                                    $payment_date = $row_payments['payment_date'];
                                    $i++;
                                ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td bgcolor="yellow"><?php echo $invoice_no; ?></td>
                                        <td>$<?php echo $amount; ?></td>
                                        <td><?php echo $payment_mode; ?></td>
                                        <td><?php echo $ref_no; ?></td>
                                        <td><?php echo $code; ?></td>
                                        <td><?php echo $payment_date; ?></td>
                                        <td>
                                            <a href="index.php?payment_delete=<?php echo $payment_id; ?>">
                                                <i class="fa fa-trash-o"></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>