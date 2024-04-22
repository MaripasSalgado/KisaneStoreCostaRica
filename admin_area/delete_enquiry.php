<?php

if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {

    if (isset($_GET['delete_enquiry'])) {
        // Obtener el ID del tipo de consulta a eliminar
        $delete_id = $_GET['delete_enquiry'];

        // Llamar al procedimiento almacenado para eliminar el tipo de consulta
        $procedure = oci_parse($conn, "BEGIN delete_enquiry_type(:delete_id, :success); END;");
        oci_bind_by_name($procedure, ":delete_id", $delete_id);
        oci_bind_by_name($procedure, ":success", $success, 1); // 1 indica que es un valor de salida
        oci_execute($procedure);

        // Verificar si el procedimiento se ejecutó con éxito
        if ($success == 1) {
            echo "<script>alert('One Enquiry Type Has Been Deleted')</script>";
            echo "<script>window.open('index.php?view_enquiry','_self')</script>";
        } else {
            echo "<script>alert('Error deleting enquiry type')</script>";
        }
    }
}
