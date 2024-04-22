<?php

if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
    if (isset($_GET['edit_cat'])) {
        $edit_id = $_GET['edit_cat'];

        // Llamar al procedimiento almacenado para obtener la información de la categoría
        $get_cat_info = "BEGIN :cat_title := get_category_title(:edit_id); :cat_top := get_category_top(:edit_id); :cat_image := get_category_image(:edit_id); END;";
        $procedure = oci_parse($conn, $get_cat_info);
        oci_bind_by_name($procedure, ":edit_id", $edit_id);
        oci_bind_by_name($procedure, ":cat_title", $cat_title, 255);
        oci_bind_by_name($procedure, ":cat_top", $cat_top, 255);
        oci_bind_by_name($procedure, ":cat_image", $cat_image, 255);
        oci_execute($procedure);
    }
?>

    <div class="row"><!-- 1 row Starts -->
        <div class="col-lg-12"><!-- col-lg-12 Starts -->
            <ol class="breadcrumb"><!-- breadcrumb Starts -->
                <li>
                    <i class="fa fa-dashboard"></i> Dashboard / Edit Category
                </li>
            </ol><!-- breadcrumb Ends -->
        </div><!-- col-lg-12 Ends -->
    </div><!-- 1 row Ends -->

    <div class="row"><!-- 2 row Starts -->
        <div class="col-lg-12"><!-- col-lg-12 Starts -->
            <div class="panel panel-default"><!-- panel panel-default Starts -->
                <div class="panel-heading"><!-- panel-heading Starts -->
                    <h3 class="panel-title"><!-- panel-title Starts -->
                        <i class="fa fa-money fa-fw"></i> Edit Category
                    </h3><!-- panel-title Ends -->
                </div><!-- panel-heading Ends -->
                <div class="panel-body"><!-- panel-body Starts -->
                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->
                        <!-- Aquí van los campos del formulario -->
                    </form><!-- form-horizontal Ends -->
                </div><!-- panel-body Ends -->
            </div><!-- panel panel-default Ends -->
        </div><!-- col-lg-12 Ends -->
    </div><!-- 2 row Ends -->

    <?php
    if (isset($_POST['update'])) {
        $cat_title = $_POST['cat_title'];
        $cat_top = $_POST['cat_top'];
        $cat_image = $_FILES['cat_image']['name'];
        $temp_name = $_FILES['cat_image']['tmp_name'];

        move_uploaded_file($temp_name, "other_images/$cat_image");

        if (empty($cat_image)) {
            $cat_image = $cat_image;
        }

        // Llamar al procedimiento almacenado para actualizar la categoría
        $update_cat = "BEGIN update_category(:c_id, :cat_title, :cat_top, :cat_image); END;";
        $procedure = oci_parse($conn, $update_cat);
        oci_bind_by_name($procedure, ":c_id", $c_id);
        oci_bind_by_name($procedure, ":cat_title", $cat_title);
        oci_bind_by_name($procedure, ":cat_top", $cat_top);
        oci_bind_by_name($procedure, ":cat_image", $cat_image);
        oci_execute($procedure);

        echo "<script>alert('One Category Has Been Updated')</script>";
        echo "<script>window.open('index.php?view_cats','_self')</script>";
    }

    ?>

<?php } ?>