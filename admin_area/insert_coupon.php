<?php

if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
?>

    <div class="row"><!-- 1 row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <ol class="breadcrumb"><!-- breadcrumb Starts -->

                <li class="active">

                    <i class="fa fa-dashboard"> </i> Dashboard / Insert Coupon

                </li>

            </ol><!-- breadcrumb Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 1 row Ends -->

    <div class="row"><!-- 2 row Starts --->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <div class="panel panel-default"><!-- panel panel-default Starts -->

                <div class="panel-heading"><!-- panel-heading Starts -->

                    <h3 class="panel-title"><!-- panel-title Starts -->

                        <i class="fa fa-money fa-fw"> </i> Insert Coupon

                    </h3><!-- panel-title Ends -->

                </div><!-- panel-heading Ends -->

                <div class="panel-body"><!--panel-body Starts -->

                    <form class="form-horizontal" method="post" action=""><!-- form-horizontal Starts -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> Coupon Title </label>

                            <div class="col-md-6">

                                <input type="text" name="coupon_title" class="form-control">

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> Coupon Price </label>

                            <div class="col-md-6">

                                <input type="text" name="coupon_price" class="form-control">

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> Coupon Code </label>

                            <div class="col-md-6">

                                <input type="text" name="coupon_code" class="form-control">

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> Coupon Limit </label>

                            <div class="col-md-6">

                                <input type="number" name="coupon_limit" value="1" class="form-control">

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label">Select coupon for Product Or bundle</label>

                            <div class="col-md-6">

                                <select name="product_id" class="form-control">

                                    <option> Select Coupon Product </option>

                                    <?php

                                    $get_products = $pdo->prepare("SELECT * FROM products WHERE status = 'product'");
                                    $get_products->execute();

                                    while ($row_product = $get_products->fetch(PDO::FETCH_ASSOC)) {

                                        $p_id = $row_product['product_id'];
                                        $p_title = $row_product['product_title'];

                                        echo "<option value='$p_id'> $p_title </option>";
                                    }

                                    ?>

                                    <option></option>

                                    <option>Select Coupon For Bundle</option>

                                    <option></option>

                                    <?php

                                    $get_bundles = $pdo->prepare("SELECT * FROM products WHERE status = 'bundle'");
                                    $get_bundles->execute();

                                    while ($row_bundle = $get_bundles->fetch(PDO::FETCH_ASSOC)) {

                                        $b_id = $row_bundle['product_id'];
                                        $b_title = $row_bundle['product_title'];

                                        echo "<option value='$b_id'> $b_title </option>";
                                    }

                                    ?>

                                </select>

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> </label>

                            <div class="col-md-6">

                                <input type="submit" name="submit" class=" btn btn-primary form-control" value=" Insert Coupon ">

                            </div>

                        </div><!-- form-group Ends -->

                    </form><!-- form-horizontal Ends -->

                </div><!--panel-body Ends -->

            </div><!-- panel panel-default Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 2 row Ends --->

    <?php

    if (isset($_POST['submit'])) {

        $coupon_title = $_POST['coupon_title'];
        $coupon_price = $_POST['coupon_price'];
        $coupon_code = $_POST['coupon_code'];
        $coupon_limit = $_POST['coupon_limit'];
        $product_id = $_POST['product_id'];
        $coupon_used = 0;

        $get_coupons = $pdo->prepare("SELECT * FROM coupons WHERE product_id=:product_id OR coupon_code=:coupon_code");
        $get_coupons->bindParam(':product_id', $product_id);
        $get_coupons->bindParam(':coupon_code', $coupon_code);
        $get_coupons->execute();

        $check_coupons = $get_coupons->rowCount();

        if ($check_coupons == 1) {
            echo "<script>alert('Coupon Code or Product Already Added Choose another Coupon code or Product')</script>";
        } else {

            $insert_coupon = $pdo->prepare("INSERT INTO coupons (product_id,coupon_title,coupon_price,coupon_code,coupon_limit,coupon_used) VALUES (:product_id, :coupon_title, :coupon_price, :coupon_code, :coupon_limit, :coupon_used)");
            $insert_coupon->bindParam(':product_id', $product_id);
            $insert_coupon->bindParam(':coupon_title', $coupon_title);
            $insert_coupon->bindParam(':coupon_price', $coupon_price);
            $insert_coupon->bindParam(':coupon_code', $coupon_code);
            $insert_coupon->bindParam(':coupon_limit', $coupon_limit);
            $insert_coupon->bindParam(':coupon_used', $coupon_used);

            if ($insert_coupon->execute()) {
                echo "<script>alert('New Coupon Has Been Inserted')</script>";
                echo "<script>window.open('index.php?view_coupons','_self')</script>";
            }
        }
    }
    ?>

<?php } ?>