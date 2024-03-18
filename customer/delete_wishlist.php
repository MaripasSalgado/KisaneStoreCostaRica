<?php

if (isset($_GET['delete_wishlist'])) {
    $delete_id = $_GET['delete_wishlist'];

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

    // Llamar al procedimiento almacenado para eliminar el elemento de la lista de deseos
    $stmt = oci_parse($conn, "BEGIN delete_wishlist_item(:p_wishlist_id, :p_success); END;");
    oci_bind_by_name($stmt, ":p_wishlist_id", $delete_id);
    oci_bind_by_name($stmt, ":p_success", $delete_status, 255);
    oci_execute($stmt);

    if ($delete_status == 'success') {
        echo "<script>alert('One Wishlist Product/Bundle Has Been Deleted')</script>";
        echo "<script>window.open('my_account.php?my_wishlist','_self')</script>";
    } else {
        echo "<script>alert('Error deleting wishlist item')</script>";
    }
}
