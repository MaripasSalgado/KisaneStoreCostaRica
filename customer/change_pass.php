<h1 align="center">Change Password </h1>

<form action="" method="post"><!-- form Starts -->

    <div class="form-group"><!-- form-group Starts -->

        <label>Enter Your Current Password</label>

        <input type="password" name="old_pass" class="form-control" required>

    </div><!-- form-group Ends -->


    <div class="form-group"><!-- form-group Starts -->

        <label>Enter Your New Password</label>

        <input type="password" name="new_pass" class="form-control" required>

    </div><!-- form-group Ends -->


    <div class="form-group"><!-- form-group Starts -->

        <label>Enter Your New Password Again</label>

        <input type="password" name="new_pass_again" class="form-control" required>

    </div><!-- form-group Ends -->

    <div class="text-center"><!-- text-center Starts -->

        <button type="submit" name="submit" class="btn btn-primary">

            <i class="fa fa-user-md"> </i> Change Password

        </button>

    </div><!-- text-center Ends -->

</form><!-- form Ends -->

<?php
if (isset($_POST['submit'])) {
    $c_email = $_SESSION['customer_email'];
    $old_pass = $_POST['old_pass'];
    $new_pass = $_POST['new_pass'];
    $new_pass_again = $_POST['new_pass_again'];

    // Realizar la conexión a la base de datos


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

    // Llamar al procedimiento almacenado para cambiar la contraseña
    $stmt = oci_parse($conn, "BEGIN change_password(:c_email, :old_pass, :new_pass, :new_pass_again, :msg); END;");
    oci_bind_by_name($stmt, ":c_email", $c_email);
    oci_bind_by_name($stmt, ":old_pass", $old_pass);
    oci_bind_by_name($stmt, ":new_pass", $new_pass);
    oci_bind_by_name($stmt, ":new_pass_again", $new_pass_again);
    oci_bind_by_name($stmt, ":msg", $msg, 255);
    oci_execute($stmt);

    if ($msg == 'Success') {
        echo "<script>alert('Your Password Has been Changed Successfully')</script>";
        echo "<script>window.open('my_account.php?my_orders','_self')</script>";
    } else {
        echo "<script>alert('$msg')</script>";
    }
}
?>