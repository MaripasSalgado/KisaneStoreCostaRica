<?php

session_start();

include("includes/db.php");

?>
<!DOCTYPE HTML>
<html>

<head>

    <title>Admin Login</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="css/login.css">

</head>

<body>

    <div class="container"><!-- container Starts -->

        <form class="form-login" action="" method="post"><!-- form-login Starts -->

            <h2 class="form-login-heading">Admin Login</h2>

            <input type="text" class="form-control" name="admin_email" placeholder="Email Address" required>

            <input type="password" class="form-control" name="admin_pass" placeholder="Password" required>

            <button class="btn btn-lg btn-primary btn-block" type="submit" name="admin_login">

                Log in

            </button>


        </form><!-- form-login Ends -->

    </div><!-- container Ends -->



</body>

</html>

<?php

if (isset($_POST['admin_login'])) {

    $admin_email = $_POST['admin_email'];
    $admin_pass = $_POST['admin_pass'];

    $query = "SELECT * FROM admins WHERE admin_email=:admin_email AND admin_pass=:admin_pass";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':admin_email', $admin_email);
    $stmt->bindParam(':admin_pass', $admin_pass);
    $stmt->execute();

    $count = $stmt->rowCount();

    if ($count == 1) {
        $_SESSION['admin_email'] = $admin_email;
        echo "<script>alert('You are Logged in into admin panel')</script>";
        echo "<script>window.open('index.php?dashboard','_self')</script>";
    } else {
        echo "<script>alert('Email or Password is Wrong')</script>";
    }
}

?>