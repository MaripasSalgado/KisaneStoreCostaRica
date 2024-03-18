<?php

session_start();

if (!isset($_SESSION['customer_email'])) {
    echo "<script>window.open('../checkout.php','_self')</script>";
} else {
    include("includes/db.php");
    include("../includes/header.php");
    include("functions/functions.php");
    include("includes/main.php");
    // Datos de conexión
    $user = 'HR';
    $pass = '123456';
    $host = 'localhost';
    $port = '1521';
    $sid = 'orcl';

    // Construye la cadena de conexión
    $tns = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = $host)(PORT = $port)))(CONNECT_DATA=(SID=$sid)))";
    $db_conn = oci_connect($user, $pass, $tns);

    // Verifica si la conexión fue exitosa
    if (!$db_conn) {
        $error = oci_error();
        echo "Error de conexión: " . $error['message'];
    } else {
        echo "Conexión exitosa a la base de datos Oracle.";
    }

    $customer_session = $_SESSION['customer_email'];

    $stmt_customer = oci_parse($con, 'BEGIN get_customer_id(:p_customer_email, :p_customer_id); END;');
    oci_bind_by_name($stmt_customer, ':p_customer_email', $customer_session);
    oci_bind_by_name($stmt_customer, ':p_customer_id', $customer_id, 255);
    oci_execute($stmt_customer);

    $stmt_orders = oci_parse($con, 'BEGIN get_customer_orders(:p_customer_id, :p_order_id, :p_due_amount, :p_invoice_no, :p_qty, :p_size, :p_order_date, :p_order_status); END;');
    oci_bind_by_name($stmt_orders, ':p_customer_id', $customer_id);
    oci_bind_array_by_name($stmt_orders, ':p_order_id', $order_id, 255, -1, SQLT_INT);
    oci_bind_array_by_name($stmt_orders, ':p_due_amount', $due_amount, 255, -1, SQLT_NUM);
    oci_bind_array_by_name($stmt_orders, ':p_invoice_no', $invoice_no, 255, -1, SQLT_INT);
    oci_bind_array_by_name($stmt_orders, ':p_qty', $qty, 255, -1, SQLT_INT);
    oci_bind_array_by_name($stmt_orders, ':p_size', $size, 255, -1, SQLT_CHR);
    oci_bind_array_by_name($stmt_orders, ':p_order_date', $order_date, 255, -1, SQLT_CHR);
    oci_bind_array_by_name($stmt_orders, ':p_order_status', $order_status, 255, -1, SQLT_CHR);
    oci_execute($stmt_orders);

?>

    <center><!-- center Starts -->
        <h1>My Orders</h1>
        <p class="lead"> Your orders on one place.</p>
        <p class="text-muted">
            If you have any questions, please feel free to <a href="../contact.php">contact us,</a> our customer service center is working for you 24/7.
        </p>
    </center><!-- center Ends -->
    <hr>
    <div class="table-responsive"><!-- table-responsive Starts -->
        <table class="table table-bordered table-hover"><!-- table table-bordered table-hover Starts -->
            <thead><!-- thead Starts -->
                <tr>
                    <th>#</th>
                    <th>Amount</th>
                    <th>Invoice</th>
                    <th>Qty</th>
                    <th>Size</th>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead><!-- thead Ends -->
            <tbody><!--- tbody Starts --->
                <?php
                $i = 0;
                foreach ($order_id as $key => $value) {
                    $i++;
                    if ($order_status[$key] == 'pending') {
                        $order_status[$key] = "<b style='color:red;'>Unpaid</b>";
                    } else {
                        $order_status[$key] = "<b style='color:green;'>Paid</b>";
                    }
                ?>
                    <tr><!-- tr Starts -->
                        <th><?php echo $i; ?></th>
                        <td>$<?php echo $due_amount[$key]; ?></td>
                        <td><?php echo $invoice_no[$key]; ?></td>
                        <td><?php echo $qty[$key]; ?></td>
                        <td><?php echo $size[$key]; ?></td>
                        <td><?php echo $order_date[$key]; ?></td>
                        <td><?php echo $order_status[$key]; ?></td>
                        <td>
                            <a href="confirm.php?order_id=<?php echo $value; ?>" target="blank" class="btn btn-success btn-xs"> Confirm If Paid </a>
                        </td>
                    </tr><!-- tr Ends -->
                <?php } ?>
            </tbody><!--- tbody Ends --->
        </table><!-- table table-bordered table-hover Ends -->
    </div><!-- table-responsive Ends -->

    <?php include("../includes/footer.php"); ?>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    </body>

    </html>

<?php } ?>