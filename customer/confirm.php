<?php
session_start();

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

    <div id="content">
        <div class="container">
            <div class="col-md-3">
                <?php include("includes/sidebar.php"); ?>
            </div>
            <div class="col-md-9">
                <div class="box">
                    <h1 align="center"> Please Confirm Your Payment </h1>
                    <form action="confirm.php?update_id=<?php echo $order_id; ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Invoice No:</label>
                            <input type="text" class="form-control" name="invoice_no" required>
                        </div>
                        <!-- Otros campos del formulario aquí -->
                        <div class="text-center">
                            <button type="submit" name="confirm_payment" class="btn btn-primary btn-lg">
                                <i class="fa fa-user-md"></i> Confirm Payment
                            </button>
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['confirm_payment'])) {
                        $update_id = $_GET['update_id'];
                        $invoice_no = $_POST['invoice_no'];
                        // Otros campos del formulario aquí



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
                        // Llamar al procedimiento almacenado para confirmar el pago
                        $stmt = oci_parse($conn, "BEGIN confirm_payment(:p_order_id, :p_invoice_no, :p_amount, :p_payment_mode, :p_ref_no, :p_code, :p_payment_date, :p_msg); END;");
                        oci_bind_by_name($stmt, ":p_order_id", $update_id);
                        oci_bind_by_name($stmt, ":p_invoice_no", $invoice_no);
                        // Otros campos del formulario aquí
                        oci_bind_by_name($stmt, ":p_msg", $msg, 255);
                        oci_execute($stmt);

                        if ($msg == 'Success') {
                            echo "<script>alert('Your Payment has been received, order will be completed within 24 hours')</script>";
                            echo "<script>window.open('my_account.php?my_orders','_self')</script>";
                        } else {
                            echo "<script>alert('$msg')</script>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <?php
    include("includes/footer.php");
    ?>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    </body>

    </html>

<?php } ?>