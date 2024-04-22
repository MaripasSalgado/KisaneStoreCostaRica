<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
?>
<center>
    <h1>Do You Really Want To Delete Your Account!</h1>
    <form action="" method="post">
        <input class="btn btn-danger" type="submit" name="yes" value="Yes, I want to delete">
        <input class="btn btn-primary" type="submit" name="no" value="No, I Don't want to delete">
    </form>
</center>

<?php
$c_email = $_SESSION['customer_email'];
if (isset($_POST['yes'])) {
    // Llamada a la función deleteCustomer para eliminar la cuenta del cliente
    if (deleteCustomer($c_email, $db)) {
        session_destroy();
        echo "<script>alert('Your Account Has Been Deleted! Good Bye')</script>";
        echo "<script>window.open('../index.php','_self')</script>";
    } else {
        echo "<script>alert('Failed to delete account. Please try again.')</script>";
    }
}
if (isset($_POST['no'])) {
    echo "<script>window.open('my_account.php?my_orders','_self')</script>";
}
