<?php


include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");

?>

<?php

if (isset($_GET['c_id'])) {
    $customer_id = $_GET['c_id'];
}

$ip_add = getRealUserIp();
$status = "pending";
$invoice_no = mt_rand();

// Llamada al procedimiento para obtener los elementos del carrito del cliente
$cart_items = get_cart_items($con, $ip_add);

foreach ($cart_items as $row_cart) {
    $pro_id = $row_cart['P_ID'];
    $pro_size = $row_cart['SIZE'];
    $pro_qty = $row_cart['QTY'];
    $sub_total = $row_cart['P_PRICE'] * $pro_qty;

    // Llamada al procedimiento para insertar el pedido del cliente
    insert_customer_order($con, $customer_id, $sub_total, $invoice_no, $pro_qty, $pro_size, $status);

    // Llamada al procedimiento para insertar el pedido pendiente
    insert_pending_order($con, $customer_id, $invoice_no, $pro_id, $pro_qty, $pro_size, $status);
}

// Llamada al procedimiento para eliminar los elementos del carrito
delete_cart_items($con, $ip_add);

echo "<script>alert('Your order has been submitted. Thanks.')</script>";
echo "<script>window.open('customer/my_account.php?my_orders', '_self')</script>";

include("includes/footer.php");

?>