<?php
if (!isset($_SESSION['admin_email'])) {
  echo "<script>window.open('login.php','_self')</script>";
} else {
  if (isset($_GET['edit_product'])) {
    $edit_id = $_GET['edit_product'];

    // Obtener los datos del producto a editar
    $get_p = "CALL GetProduct(?)";
    $stmt_edit = $pdo->prepare($get_p);
    $stmt_edit->bindParam(1, $edit_id, PDO::PARAM_INT);
    $stmt_edit->execute();
    $row_edit = $stmt_edit->fetch(PDO::FETCH_ASSOC);

    $p_id = $row_edit['product_id'];
    $p_title = $row_edit['product_title'];
    $p_cat = $row_edit['p_cat_id'];
    $cat = $row_edit['cat_id'];
    $m_id = $row_edit['manufacturer_id'];
    $p_image1 = $row_edit['product_img1'];
    $p_image2 = $row_edit['product_img2'];
    $p_image3 = $row_edit['product_img3'];
    $new_p_image1 = $row_edit['product_img1'];
    $new_p_image2 = $row_edit['product_img2'];
    $new_p_image3 = $row_edit['product_img3'];
    $p_price = $row_edit['product_price'];
    $p_desc = $row_edit['product_desc'];
    $p_keywords = $row_edit['product_keywords'];
    $psp_price = $row_edit['product_psp_price'];
    $p_label = $row_edit['product_label'];
    $p_url = $row_edit['product_url'];
    $p_features = $row_edit['product_features'];
    $p_video = $row_edit['product_video'];
  }

  // Obtener los datos del fabricante
  $get_manufacturer = "CALL GetManufacturer(?)";
  $stmt_manufacturer = $pdo->prepare($get_manufacturer);
  $stmt_manufacturer->bindParam(1, $m_id, PDO::PARAM_INT);
  $stmt_manufacturer->execute();
  $row_manufacturer = $stmt_manufacturer->fetch(PDO::FETCH_ASSOC);
  $manufacturer_id = $row_manufacturer['manufacturer_id'];
  $manufacturer_title = $row_manufacturer['manufacturer_title'];

  // Obtener los datos de la categoría de productos
  $get_p_cat = "CALL GetProductCategory(?)";
  $stmt_p_cat = $pdo->prepare($get_p_cat);
  $stmt_p_cat->bindParam(1, $p_cat, PDO::PARAM_INT);
  $stmt_p_cat->execute();
  $row_p_cat = $stmt_p_cat->fetch(PDO::FETCH_ASSOC);
  $p_cat_title = $row_p_cat['p_cat_title'];

  // Obtener los datos de la categoría
  $get_cat = "CALL GetCategory(?)";
  $stmt_cat = $pdo->prepare($get_cat);
  $stmt_cat->bindParam(1, $cat, PDO::PARAM_INT);
  $stmt_cat->execute();
  $row_cat = $stmt_cat->fetch(PDO::FETCH_ASSOC);
  $cat_title = $row_cat['cat_title'];
?>

  <!DOCTYPE html>
  <html>

  <head>
    <title>Edit Products</title>
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
            <i class="fa fa-dashboard"></i> Dashboard / Edit Products
          </li>
        </ol><!-- breadcrumb Ends -->
      </div><!-- col-lg-12 Ends -->
    </div><!-- row Ends -->

    <div class="row"><!-- 2 row Starts -->
      <div class="col-lg-12"><!-- col-lg-12 Starts -->
        <div class="panel panel-default"><!-- panel panel-default Starts -->
          <div class="panel-heading"><!-- panel-heading Starts -->
            <h3 class="panel-title">
              <i class="fa fa-money fa-fw"></i> Edit Products
            </h3>
          </div><!-- panel-heading Ends -->
          <div class="panel-body"><!-- panel-body Starts -->
            <form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->
              <!-- Resto del formulario -->
            </form><!-- form-horizontal Ends -->
          </div><!-- panel-body Ends -->
        </div><!-- panel panel-default Ends -->
      </div><!-- col-lg-12 Ends -->
    </div><!-- 2 row Ends -->
  </body>

  </html>
  <?php
  if (isset($_POST['update'])) {
    $product_title = $_POST['product_title'];
    $product_cat = $_POST['product_cat'];
    $cat = $_POST['cat'];
    $manufacturer_id = $_POST['manufacturer'];
    $product_price = $_POST['product_price'];
    $product_desc = $_POST['product_desc'];
    $product_keywords = $_POST['product_keywords'];
    $psp_price = $_POST['psp_price'];
    $product_label = $_POST['product_label'];
    $product_url = $_POST['product_url'];
    $product_features = $_POST['product_features'];
    $product_video = $_POST['product_video'];
    $status = "product";

    $product_img1 = $_FILES['product_img1']['name'];
    $product_img2 = $_FILES['product_img2']['name'];
    $product_img3 = $_FILES['product_img3']['name'];

    $temp_name1 = $_FILES['product_img1']['tmp_name'];
    $temp_name2 = $_FILES['product_img2']['tmp_name'];
    $temp_name3 = $_FILES['product_img3']['tmp_name'];

    // Verificar si las imágenes están vacías y usar las existentes si es así
    if (empty($product_img1)) {
      $product_img1 = $new_p_image1;
    }

    if (empty($product_img2)) {
      $product_img2 = $new_p_image2;
    }

    if (empty($product_img3)) {
      $product_img3 = $new_p_image3;
    }

    // Mover las imágenes a la carpeta de destino
    move_uploaded_file($temp_name1, "product_images/$product_img1");
    move_uploaded_file($temp_name2, "product_images/$product_img2");
    move_uploaded_file($temp_name3, "product_images/$product_img3");

    // Actualizar el producto en la base de datos
    $update_product = "CALL UpdateProduct(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt_update = $pdo->prepare($update_product);
    $stmt_update->bindParam(1, $product_cat, PDO::PARAM_INT);
    $stmt_update->bindParam(2, $cat, PDO::PARAM_INT);
    $stmt_update->bindParam(3, $manufacturer_id, PDO::PARAM_INT);
    $stmt_update->bindParam(4, $product_title, PDO::PARAM_STR);
    $stmt_update->bindParam(5, $product_url, PDO::PARAM_STR);
    $stmt_update->bindParam(6, $product_img1, PDO::PARAM_STR);
    $stmt_update->bindParam(7, $product_img2, PDO::PARAM_STR);
    $stmt_update->bindParam(8, $product_img3, PDO::PARAM_STR);
    $stmt_update->bindParam(9, $product_price, PDO::PARAM_STR);
    $stmt_update->bindParam(10, $psp_price, PDO::PARAM_STR);
    $stmt_update->bindParam(11, $product_desc, PDO::PARAM_STR);
    $stmt_update->bindParam(12, $product_features, PDO::PARAM_STR);
    $stmt_update->bindParam(13, $product_video, PDO::PARAM_STR);
    $stmt_update->bindParam(14, $product_keywords, PDO::PARAM_STR);
    $stmt_update->bindParam(15, $product_label, PDO::PARAM_STR);
    $stmt_update->bindParam(16, $status, PDO::PARAM_STR);
    $stmt_update->bindParam(17, $p_id, PDO::PARAM_INT);
    $stmt_update->bindParam(18, $product_img1, PDO::PARAM_STR);
    $stmt_update->bindParam(19, $product_img2, PDO::PARAM_STR);
    $stmt_update->bindParam(20, $product_img3, PDO::PARAM_STR);
    $stmt_update->execute();

    // Mostrar un mensaje de éxito y redirigir al usuario
    echo "<script>alert('Product has been updated successfully')</script>";
    echo "<script>window.open('index.php?view_products','_self')</script>";
  }
  ?>

<?php } ?>