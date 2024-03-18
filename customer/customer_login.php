<?php
session_start();

include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");

?>

<div class="box">
    <div class="box-header">
        <center>
            <h1>Login</h1>
            <p class="lead">Already our Customer</p>
        </center>
        <p class="text-muted">
            Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.
        </p>
    </div>

    <form action="checkout.php" method="post">
        <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" name="c_email" required>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="c_pass" required>
            <h4 align="center">
                <a href="forgot_pass.php"> Forgot Password </a>
            </h4>
            <br>
            <h4 align="center">
                <a href="./admin_area/login.php"> Are you and Admin? </a>
            </h4>
        </div>

        <div class="text-center">
            <button name="login" value="Login" class="btn btn-primary">
                <i class="fa fa-sign-in"></i> Log in
            </button>
        </div>
    </form>

    <center>
        <a href="customer_register.php">
            <h3>New ? Register Here</h3>
        </a>
    </center>
</div>

<?php
if (isset($_POST['login'])) {
    $customer_email = $_POST['c_email'];
    $customer_pass = $_POST['c_pass'];


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

    // Llamar al procedimiento almacenado para iniciar sesión
    $stmt = oci_parse($conn, "BEGIN customer_login(:p_customer_email, :p_customer_pass, :p_login_status); END;");
    oci_bind_by_name($stmt, ":p_customer_email", $customer_email);
    oci_bind_by_name($stmt, ":p_customer_pass", $customer_pass);
    oci_bind_by_name($stmt, ":p_login_status", $login_status, 255);
    oci_execute($stmt);

    if ($login_status == 'Success') {
        $_SESSION['customer_email'] = $customer_email;
        echo "<script>alert('You are Logged In')</script>";
        echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";
    } else {
        echo "<script>alert('$login_status')</script>";
    }
}
?>

<?php include("includes/footer.php"); ?>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>

</html>