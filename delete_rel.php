<?php

if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
    if (isset($_GET['delete_rel'])) {
        // Obtener el ID de la relación a eliminar
        $delete_id = $_GET['delete_rel'];

        // Llamar al procedimiento almacenado para eliminar la relación
        $procedure = oci_parse($conn, "BEGIN delete_bundle_relation(:delete_id, :success); END;");
        oci_bind_by_name($procedure, ":delete_id", $delete_id);
        oci_bind_by_name($procedure, ":success", $success, 1); // 1 indica que es un valor de salida
        oci_execute($procedure);

        // Verificar si el procedimiento se ejecutó con éxito
        if ($success == 1) {
            echo "<script>alert('One Relation Has Been Deleted')</script>";
            echo "<script>window.open('index.php?view_rel','_self')</script>";
        } else {
            echo "<script>alert('Error deleting relation')</script>";
        }
    }
}
