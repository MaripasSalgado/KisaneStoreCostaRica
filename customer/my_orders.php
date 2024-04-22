<?php
session_start();

if (!isset($_SESSION['customer_email'])) {
    echo "<script>window.open('../checkout.php','_self')</script>";
} else {
    include("includes/db.php");
    include("../includes/header.php");
    include("functions/functions.php");
    include("includes/main.php");
?>

    <main>
        <div class="nero">
            <div class="nero__heading">
                <span class="nero__bold">My </span>Account
            </div>
            <p class="nero__text"></p>
        </div>
    </main>

    <center><!-- center Starts -->
        <h1>My Orders</h1>
        <p class="lead"> Your orders on one place.</p>
        <p class="text-muted"> If you have any questions, please feel free to <a href="../contact.php"> contact us,</a> our customer service center is working for you 24/7.</p>
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

            <tbody><!-- tbody Starts -->
                <?php
                $customer_session = $_SESSION['customer_email'];

                // Aquí llamarías a un procedimiento almacenado que obtiene los detalles de los pedidos del cliente
                $customer_orders = get_customer_orders($customer_session);

                $i = 0;

                foreach ($customer_orders as $order) {
                    $i++;
                    $order_id = $order['order_id'];
                    $due_amount = $order['due_amount'];
                    $invoice_no = $order['invoice_no'];
                    $qty = $order['qty'];
                    $size = $order['size'];
                    $order_date = substr($order['order_date'], 0, 11);
                    $order_status = $order['order_status'];

                    if ($order_status == 'pending') {
                        $order_status = "<b style='color:red;'>Unpaid</b>";
                    } else {
                        $order_status = "<b style='color:green;'>Paid</b>";
                    }
                ?>
                    <tr><!-- tr Starts -->
                        <th><?php echo $i; ?></th>
                        <td>$<?php echo $due_amount; ?></td>
                        <td><?php echo $invoice_no; ?></td>
                        <td><?php echo $qty; ?></td>
                        <td><?php echo $size; ?></td>
                        <td><?php echo $order_date; ?></td>
                        <td><?php echo $order_status; ?></td>
                        <td>
                            <a href="confirm.php?order_id=<?php echo $order_id; ?>" target="blank" class="btn btn-success btn-xs"> Confirm If Paid </a>
                        </td>
                    </tr><!-- tr Ends -->
                <?php } ?>
            </tbody><!-- tbody Ends -->
        </table><!-- table table-bordered table-hover Ends -->
    </div><!-- table-responsive Ends -->

    <?php
    include("../includes/footer.php");
    ?>
    <script src="js/jquery.min.js"> </script>
    <script src="js/bootstrap.min.js"></script>
    </body>

    </html>

<?php } ?>