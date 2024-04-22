<?php

if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
?>

    <div class="row"><!-- 1 row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <ol class="breadcrumb"><!-- breadcrumb Starts -->

                <li class="active">

                    <i class="fa fa-dashboard"></i> Dashboard / Insert Relation

                </li>

            </ol><!-- breadcrumb Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 1 row Ends -->


    <div class="row"><!-- 2 row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <div class="panel panel-default"><!-- panel panel-default Starts -->

                <div class="panel-heading"><!-- panel-heading Starts -->

                    <h3 class="panel-title"><!-- panel-title Starts -->

                        <i class="fa fa-money fa-fw"></i> Insert Relation

                    </h3><!-- panel-title Ends -->

                </div><!-- panel-heading Ends -->

                <div class="panel-body"><!-- panel-body Starts -->

                    <form class="form-horizontal" action="" method="post"><!-- form-horizontal Starts -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> Relation Title </label>

                            <div class="col-md-6">

                                <input type="text" name="rel_title" class="form-control">

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> Select Product </label>

                            <div class="col-md-6">

                                <select name="product_id" class="form-control">

                                    <option> Select Product </option>

                                    <?php

                                    $get_p = $pdo->prepare("SELECT * FROM products WHERE status='product'");
                                    $get_p->execute();
                                    $products = $get_p->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($products as $product) {
                                        echo "<option value='{$product['product_id']}'>{$product['product_title']}</option>";
                                    }

                                    ?>

                                </select>

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> Select Bundle </label>

                            <div class="col-md-6">

                                <select name="bundle_id" class="form-control">

                                    <option> Select Bundle </option>

                                    <?php

                                    $get_b = $pdo->prepare("SELECT * FROM products WHERE status='bundle'");
                                    $get_b->execute();
                                    $bundles = $get_b->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($bundles as $bundle) {
                                        echo "<option value='{$bundle['product_id']}'>{$bundle['product_title']}</option>";
                                    }

                                    ?>

                                </select>

                            </div>

                        </div><!-- form-group Ends -->


                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> </label>

                            <div class="col-md-6">

                                <input type="submit" name="submit" class="btn btn-primary form-control" value="Insert Relation">

                            </div>

                        </div><!-- form-group Ends -->

                    </form><!-- form-horizontal Ends -->

                </div><!-- panel-body Ends -->

            </div><!-- panel panel-default Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 2 row Ends -->


    <?php

    if (isset($_POST['submit'])) {

        $rel_title = $_POST['rel_title'];

        $product_id = $_POST['product_id'];

        $bundle_id = $_POST['bundle_id'];

        $insert_rel = $pdo->prepare("INSERT INTO bundle_product_relation (rel_title, product_id, bundle_id) VALUES (:rel_title, :product_id, :bundle_id)");
        $insert_rel->bindParam(':rel_title', $rel_title);
        $insert_rel->bindParam(':product_id', $product_id);
        $insert_rel->bindParam(':bundle_id', $bundle_id);

        if ($insert_rel->execute()) {
            echo "<script>alert('New Relation Has Been Inserted')</script>";
            echo "<script>window.open('index.php?view_rel','_self')</script>";
        }
    }

    ?>


<?php } ?>