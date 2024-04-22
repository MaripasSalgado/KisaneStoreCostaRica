<?php

// Datos de conexión
$user = 'maripas1234';
$pass = '123456';
$host = 'localhost';
$port = '1521';
$sid = 'orcl';

// Construye la cadena de conexión
$tns = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = $host)(PORT = $port)))(CONNECT_DATA=(SID=$sid)))";
$db_conn = oci_connect($user, $pass, $tns);
