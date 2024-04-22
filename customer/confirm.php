<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
if (!isset($_SESSION['customer_email'])) {
    echo "<script>window.open('../checkout.php','_self')</script>";
} else {
    include("includes/db.php");
    include("includes/header.php");
    include("functions/functions.php");
    include("includes/main.php");

    if (isset($_GET['order_id'])) {
        $order_id = $_GET['order_id'];
    }
?>

    <div id="content"><!-- content Starts -->
        <div class="container"><!-- container Starts -->
            <div class="col-md-3"><!-- col-md-3 Starts -->
                <?php include("includes/sidebar.php"); ?>
            </div><!-- col-md-3 Ends -->

            <div class="col-md-9"><!-- col-md-9 Starts -->
                <div class="box"><!-- box Starts -->
                    <h1 align="center"> Please Confirm Your Payment </h1>

                    <form action="confirm.php?update_id=<?php echo $order_id; ?>" method="post" enctype="multipart/form-data"><!--- form Starts -->
                        <div class="form-group"><!-- form-group Starts -->
                            <label>Invoice No:</label>
                            <input type="text" class="form-control" name="invoice_no" required>
                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label>Amount Sent:</label>
                            <input type="text" class="form-control" name="amount_sent" required>
                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label>Select Payment Mode:</label>
                            <select name="payment_mode" class="form-control"><!-- select Starts -->
                                <option>Select Payment Mode</option>
                                <option>Bank Code</option>
                                <option>UBL/Omni</option>
                                <option>Western Union</option>
                            </select><!-- select Ends -->
                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label>Transaction/Reference Id:</label>
                            <input type="text" class="form-control" name="ref_no" required>
                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label>Omni Code:</label>
                            <input type="text" class="form-control" name="code" required>
                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label>Payment Date:</label>
                            <input type="text" class="form-control" name="date" required>
                        </div><!-- form-group Ends -->

                        <div class="text-center"><!-- text-center Starts -->
                            <button type="submit" name="confirm_payment" class="btn btn-primary btn-lg">
                                <i class="fa fa-user-md"></i> Confirm Payment
                            </button>
                        </div><!-- text-center Ends -->
                    </form><!--- form Ends -->

                <?php
                if (isset($_POST['confirm_payment'])) {
                    $update_id = $_GET['update_id'];
                    $invoice_no = $_POST['invoice_no'];
                    $amount = $_POST['amount_sent'];
                    $payment_mode = $_POST['payment_mode'];
                    $ref_no = $_POST['ref_no'];
                    $code = $_POST['code'];
                    $payment_date = $_POST['date'];

                    // Llamar a la función para confirmar el pago
                    if (confirmPayment($update_id, $invoice_no, $amount, $payment_mode, $ref_no, $code, $payment_date, $conn)) {
                        echo "<script>alert('Your Payment has been received, order will be completed within 24 hours')</script>";
                        echo "<script>window.open('my_account.php?my_orders','_self')</script>";
                    } else {
                        echo "<script>alert('Error confirming payment')</script>";
                    }
                }
            }
                ?>
                </div><!-- box Ends -->
            </div><!-- col-md-9 Ends -->
        </div><!-- container Ends -->
    </div><!-- content Ends -->

    <?php
    include("includes/footer.php");
