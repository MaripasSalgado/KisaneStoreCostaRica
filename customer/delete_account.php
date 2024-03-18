<?php
session_start();

include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");

?>

<center>
    <h1>Do You Really Want To Delete Your Account!</h1>
    <form action="" method="post">
        <input class="btn btn-danger" type="submit" name="yes" value="Yes, I want to delete">
        <input class="btn btn-primary" type="submit" name="no" value="No, I Don't want to delete">
    </form>
</center>

<?php

if (isset($_POST['yes'])) {
    $c_email = $_SESSION['customer_email'];
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
    // Llamar al procedimiento almacenado para eliminar la cuenta del cliente
    $stmt = oci_parse($conn, "BEGIN delete_customer_account(:p_customer_email, :p_success); END;");
    oci_bind_by_name($stmt, ":p_customer_email", $c_email);
    oci_bind_by_name($stmt, ":p_success", $delete_status, 255);
    oci_execute($stmt);

    if ($delete_status == 'success') {
        session_destroy();
        echo "<script>alert('Your Account Has Been Deleted! Goodbye')</script>";
        echo "<script>window.open('../index.php','_self')</script>";
    } else {
        echo "<script>alert('Error deleting account')</script>";
    }
}

if (isset($_POST['no'])) {
    echo "<script>window.open('my_account.php?my_orders','_self')</script>";
}

?>

<?php include("includes/footer.php"); ?>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>

</html>