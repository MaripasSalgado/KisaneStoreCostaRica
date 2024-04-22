<?php

if (!isset($_SESSION['admin_email'])) {
  echo "<script>window.open('login.php','_self')</script>";
} else {
?>

  <!DOCTYPE html>

  <html>

  <head>

    <title> Insert Bundle </title>


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

            <i class="fa fa-dashboard"> </i> Dashboard / Insert Bundle

          </li>

        </ol><!-- breadcrumb Ends -->

      </div><!-- col-lg-12 Ends -->

    </div><!-- row Ends -->


    <div class="row"><!-- 2 row Starts -->

      <div class="col-lg-12"><!-- col-lg-12 Starts -->

        <div class="panel panel-default"><!-- panel panel-default Starts -->

          <div class="panel-heading"><!-- panel-heading Starts -->

            <h3 class="panel-title">

              <i class="fa fa-money fa-fw"></i> Insert Bundle

            </h3>

          </div><!-- panel-heading Ends -->

          <div class="panel-body"><!-- panel-body Starts -->

            <form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

              <div class="form-group"><!-- form-group Starts -->

                <label class="col-md-3 control-label"> Bundle Title </label>

                <div class="col-md-6">

                  <input type="text" name="product_title" class="form-control" required>

                </div>

              </div><!-- form-group Ends -->


              <div class="form-group"><!-- form-group Starts -->

                <label class="col-md-3 control-label"> Bundle Url </label>

                <div class="col-md-6">

                  <input type="text" name="product_url" class="form-control" required>

                  <br>

                  <p style="font-size:15px; font-weight:bold;">

                    Bundle Url Example : navy-blue-t-shirt

                  </p>

                </div>

              </div><!-- form-group Ends -->


              <div class="form-group"><!-- form-group Starts -->

                <label class="col-md-3 control-label"> Select A Manufacturer </label>

                <div class="col-md-6">

                  <select class="form-control" name="manufacturer"><!-- select manufacturer Starts -->

                    <option> Select A Manufacturer </option>

                    <?php
                    // Llamar al procedimiento almacenado para obtener la lista de fabricantes
                    $stmt = $pdo->prepare("CALL GetManufacturers()");
                    $stmt->execute();
                    while ($row_manufacturer = $stmt->fetch(PDO::FETCH_ASSOC)) {
                      $manufacturer_id = $row_manufacturer['manufacturer_id'];
                      $manufacturer_title = $row_manufacturer['manufacturer_title'];

                      echo "<option value='$manufacturer_id'>
$manufacturer_title
</option>";
                    }
                    ?>

                  </select><!-- select manufacturer Ends -->

                </div>

              </div><!-- form-group Ends -->


              <div class="form-group"><!-- form-group Starts -->

                <label class="col-md-3 control-label"> Product Category </label>

                <div class="col-md-6">

                  <select name="product_cat" class="form-control">

                    <option> Select a Product Category </option>

                    <?php
                    // Llamar al procedimiento almacenado para obtener la lista de categorías de productos
                    $stmt = $pdo->prepare("CALL GetProductCategories()");
                    $stmt->execute();
                    while ($row_p_cats = $stmt->fetch(PDO::FETCH_ASSOC)) {
                      $p_cat_id = $row_p_cats['p_cat_id'];
                      $p_cat_title = $row_p_cats['p_cat_title'];

                      echo "<option value='$p_cat_id'>$p_cat_title</option>";
                    }
                    ?>

                  </select>

                </div>

              </div><!-- form-group Ends -->

              <div class="form-group"><!-- form-group Starts -->

                <label class="col-md-3 control-label"> Category </label>

                <div class="col-md-6">


                  <select name="cat" class="form-control">

                    <option> Select a Category </option>

                    <?php
                    // Llamar al procedimiento almacenado para obtener la lista de categorías
                    $stmt = $pdo->prepare("CALL GetCategories()");
                    $stmt->execute();
                    while ($row_cat = $stmt->fetch(PDO::FETCH_ASSOC)) {
                      $cat_id = $row_cat['cat_id'];
                      $cat_title = $row_cat['cat_title'];

                      echo "<option value='$cat_id'>$cat_title</option>";
                    }
                    ?>

                  </select>

                </div>

              </div><!-- form-group Ends -->

              <div class="form-group"><!-- form-group Starts -->

                <label class="col-md-3 control-label"> Bundle Image 1 </label>

                <div class="col-md-6">

                  <input type="file" name="product_img1" class="form-control" required>

                </div>

              </div><!-- form-group Ends -->

              <div class="form-group"><!-- form-group Starts -->

                <label class="col-md-3 control-label"> Bundle Image 2 </label>

                <div class="col-md-6">

                  <input type="file" name="product_img2" class="form-control" required>

                </div>

              </div><!-- form-group Ends -->

              <div class="form-group"><!-- form-group Starts -->

                <label class="col-md-3 control-label"> Bundle Image 3 </label>

                <div class="col-md-6">

                  <input type="file" name="product_img3" class="form-control" required>

                </div>

              </div><!-- form-group Ends -->

              <div class="form-group"><!-- form-group Starts -->

                <label class="col-md-3 control-label"> Bundle Price </label>

                <div class="col-md-6">

                  <input type="text" name="product_price" class="form-control" required>

                </div>

              </div><!-- form-group Ends -->

              <div class="form-group"><!-- form-group Starts -->

                <label class="col-md-3 control-label"> Bundle Sale Price </label>

                <div class="col-md-6">

                  <input type="text" name="psp_price" class="form-control" required>

                </div>

              </div><!-- form-group Ends -->

              <div class="form-group"><!-- form-group Starts -->

                <label class="col-md-3 control-label"> Bundle Keywords </label>

                <div class="col-md-6">

                  <input type="text" name="product_keywords" class="form-control" required>

                </div>

              </div><!-- form-group Ends -->

              <div class="form-group"><!-- form-group Starts -->

                <label class="col-md-3 control-label"> Bundle Tabs </label>

                <div class="col-md-6">

                  <ul class="nav nav-tabs"><!-- nav nav-tabs Starts -->

                    <li class="active">

                      <a data-toggle="tab" href="#description"> Bundle Description </a>

                    </li>

                    <li>

                      <a data-toggle="tab" href="#features"> Bundle Features </a>

                    </li>

                    <li>

                      <a data-toggle="tab" href="#video"> Sounds And Videos </a>

                    </li>

                  </ul><!-- nav nav-tabs Ends -->

                  <div class="tab-content"><!-- tab-content Starts -->

                    <div id="description" class="tab-pane fade in active"><!-- description tab-pane fade in active Starts -->

                      <br>

                      <textarea name="product_desc" class="form-control" rows="15" id="product_desc">


</textarea>

                    </div><!-- description tab-pane fade in active Ends -->


                    <div id="features" class="tab-pane fade in"><!-- features tab-pane fade in Starts -->

                      <br>

                      <textarea name="product_features" class="form-control" rows="15" id="product_features">


</textarea>

                    </div><!-- features tab-pane fade in Ends -->


                    <div id="video" class="tab-pane fade in"><!-- video tab-pane fade in Starts -->

                      <br>

                      <textarea name="product_video" class="form-control" rows="15">


</textarea>

                    </div><!-- video tab-pane fade in Ends -->


                  </div><!-- tab-content Ends -->

                </div>

              </div><!-- form-group Ends -->

              <div class="form-group"><!-- form-group Starts -->

                <label class="col-md-3 control-label"> Bundle Label </label>

                <div class="col-md-6">

                  <input type="text" name="product_label" class="form-control" required>

                </div>

              </div><!-- form-group Ends -->

              <div class="form-group"><!-- form-group Starts -->

                <label class="col-md-3 control-label"></label>

                <div class="col-md-6">

                  <input type="submit" name="submit" value="Insert Bundle" class="btn btn-primary form-control">

                </div>

              </div><!-- form-group Ends -->

            </form><!-- form-horizontal Ends -->

          </div><!-- panel-body Ends -->

        </div><!-- panel panel-default Ends -->

      </div><!-- col-lg-12 Ends -->

    </div><!-- 2 row Ends -->

  </body>

  </html>

  <?php

  if (isset($_POST['submit'])) {

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

    $status = "bundle";

    $product_img1 = $_FILES['product_img1']['name'];
    $product_img2 = $_FILES['product_img2']['name'];
    $product_img3 = $_FILES['product_img3']['name'];

    $temp_name1 = $_FILES['product_img1']['tmp_name'];
    $temp_name2 = $_FILES['product_img2']['tmp_name'];
    $temp_name3 = $_FILES['product_img3']['tmp_name'];

    move_uploaded_file($temp_name1, "product_images/$product_img1");
    move_uploaded_file($temp_name2, "product_images/$product_img2");
    move_uploaded_file($temp_name3, "product_images/$product_img3");

    // Llamar al procedimiento almacenado para insertar un nuevo bundle
    $stmt = $pdo->prepare("CALL InsertBundle(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bindParam(1, $product_cat);
    $stmt->bindParam(2, $cat);
    $stmt->bindParam(3, $manufacturer_id);
    $stmt->bindParam(4, $product_title);
    $stmt->bindParam(5, $product_url);
    $stmt->bindParam(6, $product_img1);
    $stmt->bindParam(7, $product_img2);
    $stmt->bindParam(8, $product_img3);
    $stmt->bindParam(9, $product_price);
    $stmt->bindParam(10, $psp_price);
    $stmt->bindParam(11, $product_desc);
    $stmt->bindParam(12, $product_features);
    $stmt->bindParam(13, $product_video);
    $stmt->bindParam(14, $product_keywords);
    $stmt->bindParam(15, $product_label);
    $stmt->bindParam(16, $status);
    $stmt->bindParam(17, $product_img3);
    $stmt->execute();

    echo "<script>alert('Bundle has been inserted successfully')</script>";

    echo "<script>window.open('index.php?view_bundles','_self')</script>";
  }

  ?>

<?php } ?>