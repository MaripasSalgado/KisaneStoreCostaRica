<?php

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {


?>

<?php

    //PL/SQL

    echo "<script>alert('One User Has Been Deleted')</script>";

    echo "<script>window.open('index.php?view_users','_self')</script>";
}





?>

<?php ?>