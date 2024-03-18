<?php
include("includes/db.php");
include("includes/header.php");

if (isset($_GET['c_id'])) {
    $customer_id = $_GET['c_id'];
}

$ip = $_SERVER['HTTP_X_REAL_IP'] ?? $_SERVER['HTTP_CLIENT_IP'] ?? $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'];

return $ip;
// Se establece la conexión con la base de datos Oracle
$conn = oci_connect('username', 'password', 'localhost/XE');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$status = "pending";
$invoice_no = mt_rand();

$select_cart = "select * from cart where ip_add='$ip_add'";
$run_cart = oci_parse($conn, $select_cart);
oci_execute($run_cart);

while ($row_cart = oci_fetch_array($run_cart, OCI_ASSOC + OCI_RETURN_NULLS)) {
    $pro_id = $row_cart['P_ID'];
    $pro_size = $row_cart['SIZE'];
    $pro_qty = $row_cart['QTY'];
    $sub_total = $row_cart['P_PRICE'] * $pro_qty;

    // Procedimiento almacenado para insertar en customer_orders
    $insert_customer_order = "BEGIN
                                INSERT INTO customer_orders (customer_id, due_amount, invoice_no, qty, size, order_date, order_status)
                                VALUES ('$customer_id', '$sub_total', '$invoice_no', '$pro_qty', '$pro_size', SYSDATE, '$status');
                              END;";
    $statement_customer_order = oci_parse($conn, $insert_customer_order);
    oci_execute($statement_customer_order);

    // Procedimiento almacenado para insertar en pending_orders
    $insert_pending_order = "BEGIN
                                INSERT INTO pending_orders (customer_id, invoice_no, product_id, qty, size, order_status)
                                VALUES ('$customer_id', '$invoice_no', '$pro_id', '$pro_qty', '$pro_size', '$status');
                             END;";
    $statement_pending_order = oci_parse($conn, $insert_pending_order);
    oci_execute($statement_pending_order);
}

// Eliminar elementos del carrito
$delete_cart = "delete from cart where ip_add='$ip_add'";
$run_delete = oci_parse($conn, $delete_cart);
oci_execute($run_delete);

echo "<script>alert('Your order has been submitted, Thanks')</script>";
echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";
