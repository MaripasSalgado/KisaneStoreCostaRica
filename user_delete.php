<?php

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {

?>


<?php

    if (isset($_GET['user_delete'])) {

        $delete_id = $_GET['user_delete'];

        $query = "DELETE FROM admins WHERE admin_id=:admin_id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':admin_id', $delete_id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {

            echo "<script>alert('One User Has Been Deleted')</script>";

            echo "<script>window.open('index.php?view_users','_self')</script>";
        } else {
            echo "<script>alert('Failed to delete user')</script>";
        }
    }


?>

<?php } ?>
