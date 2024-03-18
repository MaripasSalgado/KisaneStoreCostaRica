<?php

session_start();

include("includes/db.php");


?>

<?php


$ip = $_SERVER['HTTP_X_REAL_IP'] ?? $_SERVER['HTTP_CLIENT_IP'] ?? $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'];

return $ip;

if (isset($_POST['id'])) {

    $id = $_POST['id'];

    $qty = $_POST['quantity'];

    // PL/SQL Update statement
    $change_qty = "BEGIN update_cart_quantity(:id, :qty, :ip); END;";

    // Prepare the statement
    $stmt = oci_parse($con, $change_qty);

    // Bind the parameters
    oci_bind_by_name($stmt, ':id', $id);
    oci_bind_by_name($stmt, ':qty', $qty);
    oci_bind_by_name($stmt, ':ip', $ip);

    // Execute the statement
    oci_execute($stmt);
}

?>