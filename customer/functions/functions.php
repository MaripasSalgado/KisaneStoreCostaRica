<?php
include("includes/db.php");
/// IP address code starts /////
/// IP address code Ends /////

// Función para cambiar la contraseña del cliente
function changePassword($customer_email, $old_pass, $new_pass, $db_conn)
{

  global $db_conn;
  // Llamada al procedimiento almacenado para cambiar la contraseña
  $procedure = oci_parse($db_conn, "BEGIN change_customer_password(:customer_email, :old_pass, :new_pass, :success); END;");
  oci_bind_by_name($procedure, ":customer_email", $customer_email);
  oci_bind_by_name($procedure, ":old_pass", $old_pass);
  oci_bind_by_name($procedure, ":new_pass", $new_pass);
  oci_bind_by_name($procedure, ":success", $success, 1); // 1 indica que es un valor de salida
  oci_execute($procedure);

  // Verificar si el procedimiento se ejecutó con éxito
  if ($success == 1) {
    return true;
  } else {
    return false;
  }
}

// Función para confirmar el pago y actualizar el estado del pedido
function confirmPayment($order_id, $invoice_no, $amount, $payment_mode, $ref_no, $code, $payment_date, $db_conn)
{
  global $db_conn;
  // Llamada al procedimiento almacenado para confirmar el pago
  $procedure = oci_parse($db_conn, "BEGIN confirm_payment(:order_id, :invoice_no, :amount, :payment_mode, :ref_no, :code, :payment_date, :success); END;");
  oci_bind_by_name($procedure, ":order_id", $order_id);
  oci_bind_by_name($procedure, ":invoice_no", $invoice_no);
  oci_bind_by_name($procedure, ":amount", $amount);
  oci_bind_by_name($procedure, ":payment_mode", $payment_mode);
  oci_bind_by_name($procedure, ":ref_no", $ref_no);
  oci_bind_by_name($procedure, ":code", $code);
  oci_bind_by_name($procedure, ":payment_date", $payment_date);
  oci_bind_by_name($procedure, ":success", $success, 1); // 1 indica que es un valor de salida
  oci_execute($procedure);

  // Verificar si el procedimiento se ejecutó con éxito
  if ($success == 1) {
    return true;
  } else {
    return false;
  }
}


function customerLogin($customer_email, $customer_pass, $db_conn)
{
  global $db_conn;
  // Llamada al procedimiento almacenado para iniciar sesión
  $procedure = oci_parse($db_conn, "BEGIN customer_login(:customer_email, :customer_pass, :success); END;");
  oci_bind_by_name($procedure, ":customer_email", $customer_email);
  oci_bind_by_name($procedure, ":customer_pass", $customer_pass);
  oci_bind_by_name($procedure, ":success", $success, '1'); // 1 indica que es un valor de salida
  oci_execute($procedure);

  // Verificar si el procedimiento se ejecutó con éxito
  if ($success == 1) {
    return true;
  } else {
    return false;
  }
}


function deleteCustomer($customer_email, $db_conn)
{
  global $db_conn;
  // Llamada al procedimiento almacenado para eliminar un cliente
  $procedure = oci_parse($db_conn, "BEGIN delete_customer(:customer_email, :success); END;");
  oci_bind_by_name($procedure, ":customer_email", $customer_email);
  oci_bind_by_name($procedure, ":success", $success, 1); // 1 indica que es un valor de salida
  oci_execute($procedure);

  // Verificar si el procedimiento se ejecutó con éxito
  if ($success == 1) {
    return true; // Éxito: el cliente se eliminó correctamente
  } else {
    return false; // Error: no se pudo eliminar el cliente
  }
}


function deleteWishlistItem($wishlist_id, $db_conn)
{
  // Llamada al procedimiento almacenado para eliminar un elemento de la lista de deseos
  $procedure = oci_parse($db_conn, "BEGIN delete_wishlist_item(:wishlist_id, :success); END;");
  oci_bind_by_name($procedure, ":wishlist_id", $wishlist_id);
  oci_bind_by_name($procedure, ":success", $success, 1); // 1 indica que es un valor de salida
  oci_execute($procedure);

  // Verificar si el procedimiento se ejecutó con éxito
  if ($success == 1) {
    return true; // Éxito: se eliminó el elemento de la lista de deseos
  } else {
    return false; // Error: no se pudo eliminar el elemento de la lista de deseos
  }
}

function updateCustomer($customer_id, $c_name, $c_email, $c_country, $c_city, $c_contact, $c_address, $c_image, $db_conn)
{
  // Llamada al procedimiento almacenado para actualizar la información del cliente
  $procedure = oci_parse($db_conn, "BEGIN update_customer(:customer_id, :c_name, :c_email, :c_country, :c_city, :c_contact, :c_address, :c_image, :success); END;");
  oci_bind_by_name($procedure, ":customer_id", $customer_id);
  oci_bind_by_name($procedure, ":c_name", $c_name);
  oci_bind_by_name($procedure, ":c_email", $c_email);
  oci_bind_by_name($procedure, ":c_country", $c_country);
  oci_bind_by_name($procedure, ":c_city", $c_city);
  oci_bind_by_name($procedure, ":c_contact", $c_contact);
  oci_bind_by_name($procedure, ":c_address", $c_address);
  oci_bind_by_name($procedure, ":c_image", $c_image);
  oci_bind_by_name($procedure, ":success", $success, 1); // 1 indica que es un valor de salida
  oci_execute($procedure);

  // Verificar si el procedimiento se ejecutó con éxito
  if ($success == 1) {
    return true; // Éxito: la información del cliente se actualizó correctamente
  } else {
    return false; // Error: no se pudo actualizar la información del cliente
  }
}


function confirmEmail($confirm_code, $db_conn)
{
  // Llamada al procedimiento almacenado para confirmar el correo electrónico del cliente
  $procedure = oci_parse($db_conn, "BEGIN confirm_email(:confirm_code, :success); END;");
  oci_bind_by_name($procedure, ":confirm_code", $confirm_code);
  oci_bind_by_name($procedure, ":success", $success, 1); // 1 indica que es un valor de salida
  oci_execute($procedure);

  // Verificar si el procedimiento se ejecutó con éxito
  return $success == 1;
}

function get_customer_orders($customer_email)
{
  // Conexión a la base de datos Oracle
  global $db_conn;
  // Verificar la conexión
  if (!$db_conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
  }

  // Llamada al procedimiento almacenado para obtener los detalles de los pedidos del cliente
  $query = "BEGIN :result := get_customer_orders(:customer_email); END;";
  $stmt = oci_parse($db_conn, $query);

  // Declarar el parámetro de salida
  oci_bind_by_name($stmt, ":result", $result, 200);
  oci_bind_by_name($stmt, ":customer_email", $customer_email);

  // Ejecutar el procedimiento almacenado
  oci_execute($stmt);

  // Procesar el resultado
  $orders = [];
  while (($row = oci_fetch_assoc($result)) != false) {
    $orders[] = $row;
  }

  // Cerrar la conexión y liberar recursos
  oci_free_statement($stmt);
  oci_close($db_conn);

  return $orders;
}


function get_customer_wishlist($customer_email)
{
  // Conexión a la base de datos Oracle
  global $db_conn;

  // Verificar la conexión
  if (!$db_conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
  }

  // Obtener el ID del cliente usando el correo electrónico
  $query = "SELECT customer_id FROM customers WHERE customer_email = :customer_email";
  $stmt = oci_parse($db_conn, $query);
  oci_bind_by_name($stmt, ":customer_email", $customer_email);
  oci_execute($stmt);
  $row = oci_fetch_assoc($stmt);
  $customer_id = $row['CUSTOMER_ID'];

  // Llamada al procedimiento almacenado para obtener la lista de deseos del cliente
  $query = "BEGIN :result := get_customer_wishlist(:customer_id); END;";
  $stmt = oci_parse($db_conn, $query);
  oci_bind_by_name($stmt, ":result", $result, 200, OCI_B_CLOB);
  oci_bind_by_name($stmt, ":customer_id", $customer_id);

  // Ejecutar el procedimiento almacenado
  oci_execute($stmt);

  // Obtener los datos de la lista de deseos del resultado del procedimiento almacenado
  $wishlist_data = '';
  oci_fetch($stmt);
  $wishlist_data = oci_result($stmt, 1);
  oci_free_statement($stmt);
  oci_close($db_conn);

  return $wishlist_data;
}

// Obtener la lista de deseos del cliente actual
$customer_email = $_SESSION['customer_email'];
$customer_wishlist = get_customer_wishlist($customer_email);

// Imprimir la lista de deseos del cliente
echo $customer_wishlist;
