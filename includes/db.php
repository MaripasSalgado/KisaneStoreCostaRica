<?php

// Datos de conexión
$user = 'HR';
$pass = '123456';
$host = 'localhost';
$port = '1521';
$sid = 'orcl';

global $con;
$tns = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = $host)(PORT = $port)))(CONNECT_DATA=(SID=$sid)))";
$conn = oci_connect($user, $pass, $tns);
// Verifica si la conexión fue exitosa
if (!$conn) {
    $error = oci_error();
    echo "Error de conexión: " . $error['message'];
} else {
    echo "Conexión exitosa a la base de datos Oracle.";
}
