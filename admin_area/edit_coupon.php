<?php

if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
    if (isset($_GET['edit_coupon'])) {
        $edit_id = $_GET['edit_coupon'];
        $get_coupon = "CALL GetCoupon(?)";
        $stmt_get_coupon = $pdo->prepare($get_coupon);
        $stmt_get_coupon->bindParam(1, $edit_id, PDO::PARAM_INT);
        $stmt_get_coupon->execute();
        $row_edit = $stmt_get_coupon->fetch(PDO::FETCH_ASSOC);

        $c_id = $row_edit['coupon_id'];
        $c_title = $row_edit['coupon_title'];
        $c_price = $row_edit['coupon_price'];
        $c_code = $row_edit['coupon_code'];
        $c_limit = $row_edit['coupon_limit'];
        $c_used = $row_edit['coupon_used'];
        $p_id = $row_edit['product_id'];

        // Obtener los datos del producto asociado al cupón
        $get_product = "CALL GetProduct(?)";
        $stmt_get_product = $pdo->prepare($get_product);
        $stmt_get_product->bindParam(1, $p_id, PDO::PARAM_INT);
        $stmt_get_product->execute();
        $row_product = $stmt_get_product->fetch(PDO::FETCH_ASSOC);
        $product_id = $row_product['product_id'];
        $product_title = $row_product['product_title'];
    }


?>

    <div class="row"><!-- 1 row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <ol class="breadcrumb"><!-- breadcrumb Starts -->

                <li class="active">

                    <i class="fa fa-dashboard"> </i> Dashboard / Edit Coupon

                </li>

            </ol><!-- breadcrumb Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 1 row Ends -->

    <div class="row"><!-- 2 row Starts --->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <div class="panel panel-default"><!-- panel panel-default Starts -->

                <div class="panel-heading"><!-- panel-heading Starts -->

                    <h3 class="panel-title"><!-- panel-title Starts -->

                        <i class="fa fa-money fa-fw"> </i> Edit Coupon

                    </h3><!-- panel-title Ends -->

                </div><!-- panel-heading Ends -->

                <div class="panel-body"><!--panel-body Starts -->

                    <form class="form-horizontal" method="post" action=""><!-- form-horizontal Starts -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> Coupon Title </label>

                            <div class="col-md-6">

                                <input type="text" name="coupon_title" class="form-control" value="<?php echo $c_title; ?>">

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> Coupon Price </label>

                            <div class="col-md-6">

                                <input type="text" name="coupon_price" class="form-control" value="<?php echo $c_price; ?>">

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> Coupon Code </label>

                            <div class="col-md-6">

                                <input type="text" name="coupon_code" class="form-control" value="<?php echo $c_code; ?> ">

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> Coupon Limit </label>

                            <div class="col-md-6">

                                <input type="number" name="coupon_limit" value="<?php echo $c_limit; ?>" class="form-control">

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> Select Coupon For Product or Bundle </label>

                            <div class="col-md-6">

                                <select name="product_id" class="form-control">

                                    <option value="<?php echo $product_id; ?>"> <?php echo $product_title; ?> </option>


                                    <?php

                                    // Consulta preparada para obtener productos de tipo 'product'
                                    $get_products = "CALL GetProductsByStatus('product')";
                                    $stmt_products = $pdo->prepare($get_products);
                                    $stmt_products->execute();

                                    // Iterar sobre los resultados y generar las opciones del select
                                    while ($row_p = $stmt_products->fetch(PDO::FETCH_ASSOC)) {
                                        $p_id = $row_p['product_id'];
                                        $p_title = $row_p['product_title'];
                                        echo "<option value='$p_id'> $p_title </option>";
                                    }
                                    ?>

                                    <option></option>

                                    <option>Select Coupon for bundle</option>

                                    <option></option>

                                    <?php

                                    // Consulta preparada para obtener productos de tipo 'bundle'
                                    $get_products_bundle = "CALL GetProductsByStatus('bundle')";
                                    $stmt_products_bundle = $pdo->prepare($get_products_bundle);
                                    $stmt_products_bundle->execute();

                                    // Iterar sobre los resultados y generar las opciones del select
                                    while ($row_p_bundle = $stmt_products_bundle->fetch(PDO::FETCH_ASSOC)) {
                                        $p_id_bundle = $row_p_bundle['product_id'];
                                        $p_title_bundle = $row_p_bundle['product_title'];
                                        echo "<option value='$p_id_bundle'> $p_title_bundle </option>";
                                    }
                                    ?>


                                </select>

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> </label>

                            <div class="col-md-6">

                                <input type="submit" name="update" class=" btn btn-primary form-control" value=" Update Coupon ">

                            </div>

                        </div><!-- form-group Ends -->

                    </form><!-- form-horizontal Ends -->

                </div><!--panel-body Ends -->

            </div><!-- panel panel-default Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 2 row Ends --->

    <?php

    // Procesar el formulario cuando se envíe
    if (isset($_POST['update'])) {
        $coupon_title = $_POST['coupon_title'];
        $coupon_price = $_POST['coupon_price'];
        $coupon_code = $_POST['coupon_code'];
        $coupon_limit = $_POST['coupon_limit'];
        $product_id = $_POST['product_id'];

        // Actualizar la información del cupón en la base de datos
        $update_coupon = "CALL UpdateCoupon(?, ?, ?, ?, ?, ?, ?)";
        $stmt_update = $pdo->prepare($update_coupon);
        $stmt_update->bindParam(1, $product_id, PDO::PARAM_INT);
        $stmt_update->bindParam(2, $coupon_title);
        $stmt_update->bindParam(3, $coupon_price);
        $stmt_update->bindParam(4, $coupon_code);
        $stmt_update->bindParam(5, $coupon_limit, PDO::PARAM_INT);
        $stmt_update->bindParam(6, $c_used, PDO::PARAM_INT);
        $stmt_update->bindParam(7, $c_id, PDO::PARAM_INT);
        $stmt_update->execute();

        echo "<script>alert('One Coupon Has Been Updated')</script>";
        echo "<script>window.open('index.php?view_coupons','_self')</script>";
    }

    ?>


<?php } ?>