<?php
session_start();
include("includes/db.php");
include("functions/functions.php");

if (isset($_POST['submit'])) {
    $c_email = $_SESSION['customer_email'];
    $old_pass = $_POST['old_pass'];
    $new_pass = $_POST['new_pass'];
    $new_pass_again = $_POST['new_pass_again'];

    // Verificar si las nuevas contraseñas coinciden
    if ($new_pass != $new_pass_again) {
        echo "<script>alert('Your New Passwords do not match')</script>";
    } else {
        // Llamar a la función para cambiar la contraseña
        if (changePassword($c_email, $old_pass, $new_pass, $db)) {
            echo "<script>alert('Your Password has been changed successfully')</script>";
            echo "<script>window.open('my_account.php?my_orders','_self')</script>";
        } else {
            echo "<script>alert('Your Current Password is not valid, please try again')</script>";
        }
    }
}

oci_close($db);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
</head>

<body>
    <h1 align="center">Change Password</h1>

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
                <i class="fa fa-user-md"></i> Change Password
            </button>
        </div><!-- text-center Ends -->
    </form><!-- form Ends -->
</body>

</html>