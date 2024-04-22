<?php

if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
    if (isset($_GET['edit_rel'])) {
        $edit_id = $_GET['edit_rel'];

        // Llamar al procedimiento almacenado para obtener la relación
        $stmt = $pdo->prepare("CALL GetBundleProductRelation(?)");
        $stmt->bindParam(1, $edit_id);
        $stmt->execute();
        $row_edit = $stmt->fetch(PDO::FETCH_ASSOC);

        $r_id = $row_edit['rel_id'];
        $r_title = $row_edit['rel_title'];
        $r_p = $row_edit['product_id'];
        $r_b = $row_edit['bundle_id'];

        // Llamar al procedimiento almacenado para obtener el producto
        $stmt = $pdo->prepare("CALL GetProduct(?)");
        $stmt->bindParam(1, $r_p);
        $stmt->execute();
        $row_p = $stmt->fetch(PDO::FETCH_ASSOC);

        $p_id = $row_p['product_id'];
        $p_title = $row_p['product_title'];

        // Llamar al procedimiento almacenado para obtener el bundle
        $stmt = $pdo->prepare("CALL GetProduct(?)");
        $stmt->bindParam(1, $r_b);
        $stmt->execute();
        $row_b = $stmt->fetch(PDO::FETCH_ASSOC);

        $b_id = $row_b['product_id'];
        $b_title = $row_b['product_title'];
    }
}

?>

<div class="row"><!-- 1 row Starts -->
    <div class="col-lg-12"><!-- col-lg-12 Starts -->
        <ol class="breadcrumb"><!-- breadcrumb Starts -->
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / Edit Relation
            </li>
        </ol><!-- breadcrumb Ends -->
    </div><!-- col-lg-12 Ends -->
</div><!-- 1 row Ends -->

<div class="row"><!-- 2 row Starts -->
    <div class="col-lg-12"><!-- col-lg-12 Starts -->
        <div class="panel panel-default"><!-- panel panel-default Starts -->
            <div class="panel-heading"><!-- panel-heading Starts -->
                <h3 class="panel-title"><!-- panel-title Starts -->
                    <i class="fa fa-money fa-fw"></i> Edit Relation
                </h3><!-- panel-title Ends -->
            </div><!-- panel-heading Ends -->
            <div class="panel-body"><!-- panel-body Starts -->
                <form class="form-horizontal" action="" method="post"><!-- form-horizontal Starts -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label"> Relation Title </label>
                        <div class="col-md-6">
                            <input type="text" name="rel_title" class="form-control" value="<?php echo $r_title; ?>">
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label"> Select Product </label>
                        <div class="col-md-6">
                            <select name="product_id" class="form-control">
                                <option value="<?php echo $p_id; ?>"> <?php echo $p_title; ?> </option>
                                <?php
                                // Llamar al procedimiento almacenado para obtener los productos con estado 'product'
                                $stmt = $pdo->prepare("CALL GetProductsByStatus('product')");
                                $stmt->execute();
                                while ($row_p = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    $p_id = $row_p['product_id'];
                                    $p_title = $row_p['product_title'];
                                    echo "<option value='$p_id'> $p_title </option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label"> Select Bundle </label>
                        <div class="col-md-6">
                            <select name="bundle_id" class="form-control">
                                <option value="<?php echo $b_id; ?>"> <?php echo $b_title; ?> </option>
                                <?php
                                // Llamar al procedimiento almacenado para obtener los productos con estado 'bundle'
                                $stmt = $pdo->prepare("CALL GetProductsByStatus('bundle')");
                                $stmt->execute();
                                while ($row_p = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    $p_id = $row_p['product_id'];
                                    $p_title = $row_p['product_title'];
                                    echo "<option value='$p_id'> $p_title </option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label"> </label>
                        <div class="col-md-6">
                            <input type="submit" name="update" class="btn btn-primary form-control" value="Update Relation">
                        </div>
                    </div><!-- form-group Ends -->
                </form><!-- form-horizontal Ends -->
            </div><!-- panel-body Ends -->
        </div><!-- panel panel-default Ends -->
    </div><!-- col-lg-12 Ends -->
</div><!-- 2 row Ends -->

<?php

if (isset($_POST['update'])) {
    $rel_title = $_POST['rel_title'];
    $product_id = $_POST['product_id'];
    $bundle_id = $_POST['bundle_id'];

    // Llamar al procedimiento almacenado para actualizar la relación
    $stmt = $pdo->prepare("CALL UpdateBundleProductRelation(?,?,?,?)");
    $stmt->bindParam(1, $rel_title);
    $stmt->bindParam(2, $product_id);
    $stmt->bindParam(3, $bundle_id);
    $stmt->bindParam(4, $r_id);
    $stmt->execute();

    echo "<script>alert('Relation Has Been Updated')</script>";
    echo "<script> window.open('index.php?view_rel','_self') </script>";
}
?>