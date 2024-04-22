<?php

if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
    if (isset($_GET['edit_p_cat'])) {
        $edit_p_cat_id = $_GET['edit_p_cat'];

        // Obtener los datos de la categoría de productos a editar
        $edit_p_cat_query = "CALL GetProductCategory(?)";
        $stmt_edit = $pdo->prepare($edit_p_cat_query);
        $stmt_edit->bindParam(1, $edit_p_cat_id, PDO::PARAM_INT);
        $stmt_edit->execute();
        $row_edit = $stmt_edit->fetch(PDO::FETCH_ASSOC);

        $p_cat_id = $row_edit['p_cat_id'];
        $p_cat_title = $row_edit['p_cat_title'];
        $p_cat_top = $row_edit['p_cat_top'];
        $p_cat_image = $row_edit['p_cat_image'];
        $new_p_cat_image = $row_edit['p_cat_image'];
    }
?>

    <div class="row"><!-- 1 row Starts -->
        <div class="col-lg-12"><!-- col-lg-12 Starts -->
            <ol class="breadcrumb"><!-- breadcrumb Starts -->
                <li>
                    <i class="fa fa-dashboard"></i> Dashboard / Edit Product Category
                </li>
            </ol><!-- breadcrumb Ends -->
        </div><!-- col-lg-12 Ends -->
    </div><!-- 1 row Ends -->

    <div class="row"><!-- 2 row Starts -->
        <div class="col-lg-12"><!-- col-lg-12 Starts -->
            <div class="panel panel-default"><!-- panel panel-default Starts -->
                <div class="panel-heading"><!-- panel-heading Starts -->
                    <h3 class="panel-title"><!-- panel-title Starts -->
                        <i class="fa fa-money fa-fw"></i> Edit Product Category
                    </h3><!-- panel-title Ends -->
                </div><!-- panel-heading Ends -->
                <div class="panel-body"><!-- panel-body Starts -->
                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->
                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label">Product Category Title</label>
                            <div class="col-md-6">
                                <input type="text" name="p_cat_title" class="form-control" value="<?php echo $p_cat_title; ?>">
                            </div>
                        </div><!-- form-group Ends -->
                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label">Show as Top Product Category</label>
                            <div class="col-md-6">
                                <input type="radio" name="p_cat_top" value="yes" <?php if ($p_cat_top == 'no') {
                                                                                    } else {
                                                                                        echo "checked='checked'";
                                                                                    } ?>>
                                <label> Yes </label>
                                <input type="radio" name="p_cat_top" value="no" <?php if ($p_cat_top == 'no') {
                                                                                    echo "checked='checked'";
                                                                                } else {
                                                                                } ?>>
                                <label> No </label>
                            </div>
                        </div><!-- form-group Ends -->
                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"> Select Product Category Image</label>
                            <div class="col-md-6">
                                <input type="file" name="p_cat_image" class="form-control">
                                <br>
                                <img src="other_images/<?php echo $p_cat_image; ?>" width="70" height="70">
                            </div>
                        </div><!-- form-group Ends -->
                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-6">
                                <input type="submit" name="update" value="Update Now" class="btn btn-primary form-control">
                            </div>
                        </div><!-- form-group Ends -->
                    </form><!-- form-horizontal Ends -->
                </div><!-- panel-body Ends -->
            </div><!-- panel panel-default Ends -->
        </div><!-- col-lg-12 Ends -->
    </div><!-- 2 row Ends -->

<?php
    if (isset($_POST['update'])) {
        $p_cat_title = $_POST['p_cat_title'];
        $p_cat_top = $_POST['p_cat_top'];
        $p_cat_image = $_FILES['p_cat_image']['name'];
        $temp_name = $_FILES['p_cat_image']['tmp_name'];

        move_uploaded_file($temp_name, "other_images/$p_cat_image");

        if (empty($p_cat_image)) {
            $p_cat_image = $new_p_cat_image;
        }

        // Actualizar la categoría de productos en la base de datos
        $update_p_cat = "CALL UpdateProductCategory(?, ?, ?)";
        $stmt_update = $pdo->prepare($update_p_cat);
        $stmt_update->bindParam(1, $p_cat_title);
        $stmt_update->bindParam(2, $p_cat_top);
        $stmt_update->bindParam(3, $p_cat_image);
        $stmt_update->execute();

        echo "<script>alert('Product Category has been Updated')</script>";
        echo "<script>window.open('index.php?view_p_cats','_self')</script>";
    }
}
?>


<?php ?>