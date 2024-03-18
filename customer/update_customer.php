<?php

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
// Obtiene los datos del formulario
$c_name = $_POST['c_name'];
$c_email = $_POST['c_email'];
$c_country = $_POST['c_country'];
$c_city = $_POST['c_city'];
$c_contact = $_POST['c_contact'];
$c_address = $_POST['c_address'];
$c_image = $_FILES['c_image']['name'];
$c_image_tmp = $_FILES['c_image']['tmp_name'];

// Ejecuta el procedimiento almacenado para actualizar los datos del cliente
$sql = "BEGIN update_customer(:p_customer_id, :p_customer_name, :p_customer_email, :p_customer_country, :p_customer_city, :p_customer_contact, :p_customer_address, :p_customer_image); END;";
$stmt = oci_parse($conn, $sql);
oci_bind_by_name($stmt, ":p_customer_id", $customer_id);
oci_bind_by_name($stmt, ":p_customer_name", $c_name);
oci_bind_by_name($stmt, ":p_customer_email", $c_email);
oci_bind_by_name($stmt, ":p_customer_country", $c_country);
oci_bind_by_name($stmt, ":p_customer_city", $c_city);
oci_bind_by_name($stmt, ":p_customer_contact", $c_contact);
oci_bind_by_name($stmt, ":p_customer_address", $c_address);
oci_bind_by_name($stmt, ":p_customer_image", $c_image);
oci_execute($stmt);

// Sube la imagen del cliente al servidor
move_uploaded_file($c_image_tmp, "customer_images/$c_image");

// Cierra la conexión a la base de datos Oracle
oci_close($conn);

// Redirecciona al usuario a la página de inicio o a otra página deseada
header("Location: index.php");
exit();
