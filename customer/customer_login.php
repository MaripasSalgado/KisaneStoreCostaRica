<?php
include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");


?>

<div class="box"><!-- box Starts -->
    <div class="box-header"><!-- box-header Starts -->
        <center>
            <h1>Login</h1>
            <p class="lead">Already our Customer</p>
        </center>
        <p class="text-muted">
            Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.
        </p>
    </div><!-- box-header Ends -->

    <form action="checkout.php" method="post"><!--form Starts -->
        <div class="form-group"><!-- form-group Starts -->
            <label>Email</label>
            <input type="text" class="form-control" name="c_email" required>
        </div><!-- form-group Ends -->

        <div class="form-group"><!-- form-group Starts -->
            <label>Password</label>
            <input type="password" class="form-control" name="c_pass" required>
            <h4 align="center">
                <a href="forgot_pass.php"> Forgot Password </a>
            </h4>
            <br>
            <h4 align="center">
                <a href="./admin_area/login.php"> Are you and Admin? </a>
            </h4>
        </div><!-- form-group Ends -->

        <div class="text-center"><!-- text-center Starts -->
            <button name="login" value="Login" class="btn btn-primary">
                <i class="fa fa-sign-in"></i> Log in
            </button>
        </div><!-- text-center Ends -->
    </form><!--form Ends -->

    <center><!-- center Starts -->
        <a href="customer_register.php">
            <h3>New ? Register Here</h3>
        </a>
    </center><!-- center Ends -->
</div><!-- box Ends -->

<?php
if (isset($_POST['login'])) {
    $customer_email = $_POST['c_email'];
    $customer_pass = $_POST['c_pass'];

    // Llamada al procedimiento almacenado para iniciar sesión
    $procedure = customerLogin($customer_email, $customer_pass, $db);

    // Verificar si el procedimiento se ejecutó con éxito
    if ($success == 1) {
        $get_ip = getRealUserIp();
        $select_cart = "SELECT * FROM cart WHERE ip_add='$get_ip'";
        $run_cart = oci_parse($db, $select_cart);
        oci_execute($run_cart);
        $check_cart = oci_fetch_array($run_cart);

        if (empty($check_cart)) {
            $_SESSION['customer_email'] = $customer_email;
            echo "<script>alert('You are Logged In')</script>";
            echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";
        } else {
            $_SESSION['customer_email'] = $customer_email;
            echo "<script>alert('You are Logged In')</script>";
            echo "<script>window.open('checkout.php','_self')</script>";
        }
    } else {
        echo "<script>alert('password or email is wrong')</script>";
        exit();
    }
}
?>


<script src="js/jquery.min.js"> </script>
<script src="js/bootstrap.min.js"></script>
</body>

</html>