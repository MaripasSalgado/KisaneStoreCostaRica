<?php
session_start();
include("includes/db.php");
include("functions/functions.php");

if (isset($_GET['delete_wishlist'])) {
    $delete_id = $_GET['delete_wishlist'];

    // Llamada al procedimiento almacenado para eliminar un elemento de la lista de deseos
    $procedure = deleteWishlistItem($delete_id, $db);

    // Verificar si el procedimiento se ejecutó con éxito
    if ($success == 1) {
        echo "<script>alert('One Wishlist Product/Bundle Has Been Deleted')</script>";
        echo "<script>window.open('my_account.php?my_wishlist','_self')</script>";
    } else {
        echo "<script>alert('Failed to delete wishlist item')</script>";
    }
}
