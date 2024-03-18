<center><!-- center Starts -->

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

            <?php
            // Obtener el ID del cliente por su correo electrónico
            $customer_email = $_SESSION['customer_email'];
            $stmt_customer_id = oci_parse($con, 'BEGIN get_customer_id(:p_customer_email, :p_customer_id); END;');
            oci_bind_by_name($stmt_customer_id, ':p_customer_email', $customer_email);
            oci_bind_by_name($stmt_customer_id, ':p_customer_id', $customer_id);
            oci_execute($stmt_customer_id);

            $i = 0;

            // Obtener los productos de la lista de deseos del cliente
            $stmt_wishlist = oci_parse($con, 'BEGIN get_customer_wishlist(:p_customer_id, :p_wishlist_id, :p_product_id); END;');
            oci_bind_by_name($stmt_wishlist, ':p_customer_id', $customer_id);
            oci_bind_array_by_name($stmt_wishlist, ':p_wishlist_id', $wishlist_ids, 100, -1, SQLT_INT);
            oci_bind_array_by_name($stmt_wishlist, ':p_product_id', $product_ids, 100, -1, SQLT_INT);
            oci_execute($stmt_wishlist);

            foreach ($wishlist_ids as $key => $wishlist_id) {
                $product_id = $product_ids[$key];
                $stmt_product = oci_parse($con, 'BEGIN get_product_details(:p_product_id, :p_product_title, :p_product_url, :p_product_img1); END;');
                oci_bind_by_name($stmt_product, ':p_product_id', $product_id);
                oci_bind_by_name($stmt_product, ':p_product_title', $product_title);
                oci_bind_by_name($stmt_product, ':p_product_url', $product_url);
                oci_bind_by_name($stmt_product, ':p_product_img1', $product_img1);
                oci_execute($stmt_product);

                $i++;
            ?>

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