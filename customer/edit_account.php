<?php
session_start();

include("includes/db.php");
include("functions/functions.php");

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['customer_email'])) {
    echo "<script>window.open('../checkout.php','_self')</script>";
} else {
    // Obtener la información del cliente actual
    $customer_session = $_SESSION['customer_email'];
    $get_customer = "SELECT * FROM customers WHERE customer_email='$customer_session'";
    $run_customer = oci_parse($conn, $get_customer);
    oci_execute($run_customer);
    $row_customer = oci_fetch_array($run_customer);
    $customer_id = $row_customer['CUSTOMER_ID'];
    $customer_name = $row_customer['CUSTOMER_NAME'];
    $customer_email = $row_customer['CUSTOMER_EMAIL'];
    $customer_country = $row_customer['CUSTOMER_COUNTRY'];
    $customer_city = $row_customer['CUSTOMER_CITY'];
    $customer_contact = $row_customer['CUSTOMER_CONTACT'];
    $customer_address = $row_customer['CUSTOMER_ADDRESS'];
    $customer_image = $row_customer['CUSTOMER_IMAGE'];
?>

    <h1 align="center"> Edit Your Account </h1>

    <form action="" method="post" enctype="multipart/form-data"><!--- form Starts -->

        <div class="form-group"><!-- form-group Starts -->

            <label> Customer Name: </label>

            <input type="text" name="c_name" class="form-control" required value="<?php echo $customer_name; ?>">


        </div><!-- form-group Ends -->

        <div class="form-group"><!-- form-group Starts -->

            <label> Customer Email: </label>

            <input type="text" name="c_email" class="form-control" required value="<?php echo $customer_email; ?>">


        </div><!-- form-group Ends -->

        <div class="form-group"><!-- form-group Starts -->

            <label> Customer Country: </label>

            <input type="text" name="c_country" class="form-control" required value="<?php echo $customer_country; ?>">


        </div><!-- form-group Ends -->

        <div class="form-group"><!-- form-group Starts -->

            <label> Customer City: </label>

            <input type="text" name="c_city" class="form-control" required value="<?php echo $customer_city; ?>">


        </div><!-- form-group Ends -->

        <div class="form-group"><!-- form-group Starts -->

            <label> Customer Contact: </label>

            <input type="text" name="c_contact" class="form-control" required value="<?php echo $customer_contact; ?>">


        </div><!-- form-group Ends -->

        <div class="form-group"><!-- form-group Starts -->

            <label> Customer Address: </label>

            <input type="text" name="c_address" class="form-control" required value="<?php echo $customer_address; ?>">


        </div><!-- form-group Ends -->

        <div class="form-group"><!-- form-group Starts -->

            <label> Customer Image: </label>

            <input type="file" name="c_image" class="form-control" required><br>

            <img src="customer_images/<?php echo $customer_image; ?>" width="100" height="100" class="img-responsive">


        </div><!-- form-group Ends -->

        <div class="text-center"><!-- text-center Starts -->

            <button name="update" class="btn btn-primary">

                <i class="fa fa-user-md"></i> Update Now

            </button>


        </div><!-- text-center Ends -->


    </form><!--- form Ends -->

<?php
    // Procesar el formulario de actualización del cliente
    if (isset($_POST['update'])) {
        $update_id = $customer_id;
        $c_name = $_POST['c_name'];
        $c_email = $_POST['c_email'];
        $c_country = $_POST['c_country'];
        $c_city = $_POST['c_city'];
        $c_contact = $_POST['c_contact'];
        $c_address = $_POST['c_address'];
        $c_image = $_FILES['c_image']['name'];
        $c_image_tmp = $_FILES['c_image']['tmp_name'];
        move_uploaded_file($c_image_tmp, "customer_images/$c_image");

        // Llamar a la función updateCustomer para actualizar la información del cliente
        if (updateCustomer($update_id, $c_name, $c_email, $c_country, $c_city, $c_contact, $c_address, $c_image, $conn)) {
            echo "<script>alert('Your account has been updated please login again')</script>";
            echo "<script>window.open('logout.php','_self')</script>";
        } else {
            echo "<script>alert('Failed to update account information')</script>";
        }
    }
}

// Definir la función updateCustomer para llamar al procedimiento almacenado en PL/SQL
?>