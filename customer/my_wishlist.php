<?php

session_start();
include("includes/db.php");
include("functions/functions.php");


$customer_session = $_SESSION['customer_email'];

// Llamada al procedimiento almacenado para obtener el ID del cliente
$procedure_customer_id = oci_parse($db, "BEGIN get_customer_id(:customer_email, :customer_id); END;");
oci_bind_by_name($procedure_customer_id, ":customer_email", $customer_session);
oci_bind_by_name($procedure_customer_id, ":customer_id", $customer_id,  SQLT_INT);
oci_execute($procedure_customer_id);

$i = 0;

while ($row_wishlist = oci_fetch_array($customer_wishlist, OCI_ASSOC + OCI_RETURN_NULLS)) {

    $wishlist_id = $row_wishlist['WISHLIST_ID'];
    $product_id = $row_wishlist['PRODUCT_ID'];

    // Llamada al procedimiento almacenado para obtener la información del producto
    $procedure_product_info = oci_parse($db, "BEGIN get_product_info(:product_id, :product_title, :product_url); END;");
    oci_bind_by_name($procedure_product_info, ":product_id", $product_id);
    oci_bind_by_name($procedure_product_info, ":product_title", $product_title,  SQLT_CHR);
    oci_bind_by_name($procedure_product_info, ":product_url", $product_url,  SQLT_CHR);
    oci_execute($procedure_product_info);

    $i++;

?>

    <h1> My Wishlist </h1>

    <p class="lead"> Your all Wishlist Products on one place. </p>

    </center><!-- center Ends -->

    <hr>

    <div class="table-responsive"><!-- table-responsive Starts -->

        <table class="table table-bordered table-hover"><!-- table table-bordered table-hover Starts -->

            <thead>

                <tr>

                    <th> Wishlist No: </th>

                    <th> Wishlist Product </th>

                    <th> Delete Wishlist </th>

                </tr>

            </thead>

            <tbody>




                <tr>

                    <td width="100"> <?php echo $i; ?> </td>

                    <td>

                        <img src="../admin_area/product_images/<?php echo $product_img1; ?>" width="60" height="60">

                        &nbsp;&nbsp;&nbsp;

                        <a href="../<?php echo $product_url; ?>">

                            <?php echo $product_title; ?>

                        </a>

                    </td>

                    <td>

                        <a href="my_account.php?delete_wishlist=<?php echo $wishlist_id; ?>" class="btn btn-primary">

                            <i class="fa fa-trash-o"> </i> Delete

                        </a>

                    </td>

                </tr>

            <?php } ?>

            </tbody>

        </table><!-- table table-bordered table-hover Ends -->

    </div><!-- table-responsive Ends -->