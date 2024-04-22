<?php

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {

?>

<?php

    if (isset($_GET['order_delete'])) {

        $delete_id = $_GET['order_delete'];

        $query = "DELETE FROM pending_orders WHERE order_id=:order_id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':order_id', $delete_id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {

            echo "<script>alert('Order Has Been Deleted')</script>";

            echo "<script>window.open('index.php?view_orders','_self')</script>";
        } else {
            echo "<script>alert('Failed to delete order')</script>";
        }
    }

?>

<?php }  ?>
