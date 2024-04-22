<?php

session_start();

include("includes/db.php");

include("functions/functions.php");

?>

<?php


$ip_add = getRealUserIp();

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $qty = $_POST['quantity'];
    updateCartItemQuantity($id, $qty, $ip_add);
}





?>