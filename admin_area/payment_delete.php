<?php

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {

?>


<?php

    if (isset($_GET['payment_delete'])) {

        $delete_id = $_GET['payment_delete'];

        $query = "DELETE FROM payments WHERE payment_id=:payment_id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':payment_id', $delete_id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {

            echo "<script>alert('Payment Has Been Deleted')</script>";

            echo "<script>window.open('index.php?view_payments','_self')</script>";
        } else {
            echo "<script>alert('Failed to delete payment')</script>";
        }
    }

?>

<?php } ?>
