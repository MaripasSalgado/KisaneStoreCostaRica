<?php

if (!isset($_SESSION['admin_email'])) {
  echo "<script>window.open('login.php','_self')</script>";
} else {
  // Obteniendo información del paquete
  if (isset($_GET['edit_bundle'])) {
    $edit_id = $_GET['edit_bundle'];

    // Llamar al procedimiento almacenado para obtener la información del paquete
    $get_bundle_info = "BEGIN :product_title := get_bundle_title(:edit_id); :product_cat := get_bundle_category(:edit_id); :cat := get_bundle_cat(:edit_id); :manufacturer_id := get_bundle_manufacturer(:edit_id); :p_price := get_bundle_price(:edit_id); :product_desc := get_bundle_desc(:edit_id); :product_keywords := get_bundle_keywords(:edit_id); :psp_price := get_bundle_psp_price(:edit_id); :product_label := get_bundle_label(:edit_id); :product_url := get_bundle_url(:edit_id); :product_features := get_bundle_features(:edit_id); :product_video := get_bundle_video(:edit_id); :p_image1 := get_bundle_image1(:edit_id); :p_image2 := get_bundle_image2(:edit_id); :p_image3 := get_bundle_image3(:edit_id); END;";
    $procedure = oci_parse($conn, $get_bundle_info);
    oci_bind_by_name($procedure, ":edit_id", $edit_id);
    oci_bind_by_name($procedure, ":product_title", $product_title, 255);
    oci_bind_by_name($procedure, ":product_cat", $product_cat, 255);
    oci_bind_by_name($procedure, ":cat", $cat, 255);
    oci_bind_by_name($procedure, ":manufacturer_id", $manufacturer_id, 255);
    oci_bind_by_name($procedure, ":p_price", $p_price, 255);
    oci_bind_by_name($procedure, ":product_desc", $product_desc, 4000);
    oci_bind_by_name($procedure, ":product_keywords", $product_keywords, 255);
    oci_bind_by_name($procedure, ":psp_price", $psp_price, 255);
    oci_bind_by_name($procedure, ":product_label", $product_label, 255);
    oci_bind_by_name($procedure, ":product_url", $product_url, 255);
    oci_bind_by_name($procedure, ":product_features", $product_features, 4000);
    oci_bind_by_name($procedure, ":product_video", $product_video, 4000);
    oci_bind_by_name($procedure, ":p_image1", $p_image1, 255);
    oci_bind_by_name($procedure, ":p_image2", $p_image2, 255);
    oci_bind_by_name($procedure, ":p_image3", $p_image3, 255);
    oci_execute($procedure);
  }

  // Obtener fabricantes
  $get_manufacturers = "BEGIN :manufacturer_id := get_bundle_manufacturer_id(:edit_id); :manufacturer_title := get_bundle_manufacturer_title(:manufacturer_id); END;";
  $procedure = oci_parse($conn, $get_manufacturers);
  oci_bind_by_name($procedure, ":edit_id", $edit_id);
  oci_bind_by_name($procedure, ":manufacturer_id", $manufacturer_id, 255);
  oci_bind_by_name($procedure, ":manufacturer_title", $manufacturer_title, 255);
  oci_execute($procedure);

  // Obtener categorías de productos
  $get_product_cats = "BEGIN :p_cat_title := get_bundle_product_category_title(:product_cat); END;";
  $procedure = oci_parse($conn, $get_product_cats);
  oci_bind_by_name($procedure, ":product_cat", $product_cat);
  oci_bind_by_name($procedure, ":p_cat_title", $p_cat_title, 255);
  oci_execute($procedure);

  // Obtener categorías
  $get_cats = "BEGIN :cat_title := get_bundle_category_title(:cat); END;";
  $procedure = oci_parse($conn, $get_cats);
  oci_bind_by_name($procedure, ":cat", $cat);
  oci_bind_by_name($procedure, ":cat_title", $cat_title, 255);
  oci_execute($procedure);
?>

  <!DOCTYPE html>
  <html>

  <head>
    <title>Edit Bundle</title>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>
      tinymce.init({
        selector: '#product_desc,#product_features'
      });
    </script>
  </head>

  <body>
    <div class="row"><!-- row Starts -->
      <div class="col-lg-12"><!-- col-lg-12 Starts -->
        <ol class="breadcrumb"><!-- breadcrumb Starts -->
          <li class="active">
            <i class="fa fa-dashboard"></i> Dashboard / Edit Bundle
          </li>
        </ol><!-- breadcrumb Ends -->
      </div><!-- col-lg-12 Ends -->
    </div><!-- row Ends -->

    <div class="row"><!-- 2 row Starts -->
      <div class="col-lg-12"><!-- col-lg-12 Starts -->
        <div class="panel panel-default"><!-- panel panel-default Starts -->
          <div class="panel-heading"><!-- panel-heading Starts -->
            <h3 class="panel-title">
              <i class="fa fa-money fa-fw"></i> Edit Bundle
            </h3>
          </div><!-- panel-heading Ends -->
          <div class="panel-body"><!-- panel-body Starts -->
            <form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->
              <!-- Aquí van los campos del formulario -->
            </form><!-- form-horizontal Ends -->
          </div><!-- panel-body Ends -->
        </div><!-- panel panel-default Ends -->
      </div><!-- col-lg-12 Ends -->
    </div><!-- 2 row Ends -->
  </body>

  </html>

<?php } ?>