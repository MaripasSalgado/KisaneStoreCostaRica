<?php

session_start();

include("includes/db.php");
include("includes/header.php");
include("includes/main.php");

?>


<?php

$product_id = @$_GET['pro_id'];

$get_product = "BEGIN
                    SELECT * FROM products WHERE product_url=:p_product_id;
                END;";

$statement = oci_parse($conn, $get_product);
oci_bind_by_name($statement, ":p_product_id", $product_id);
oci_execute($statement);

$row_product = oci_fetch_array($statement);

if (!$row_product) {
  echo "<script> window.open('index.php','_self') </script>";
} else {
  $p_cat_id = $row_product['P_CAT_ID'];
  $pro_id = $row_product['PRODUCT_ID'];
  $pro_title = $row_product['PRODUCT_TITLE'];
  $pro_price = $row_product['PRODUCT_PRICE'];
  $pro_desc = $row_product['PRODUCT_DESC'];
  $pro_img1 = $row_product['PRODUCT_IMG1'];
  $pro_img2 = $row_product['PRODUCT_IMG2'];
  $pro_img3 = $row_product['PRODUCT_IMG3'];
  $pro_label = $row_product['PRODUCT_LABEL'];
  $pro_psp_price = $row_product['PRODUCT_PSP_PRICE'];
  $pro_features = $row_product['PRODUCT_FEATURES'];
  $pro_video = $row_product['PRODUCT_VIDEO'];
  $status = $row_product['STATUS'];
  $pro_url = $row_product['PRODUCT_URL'];

  if ($pro_label == "") {
    $product_label = "";
  } else {
    $product_label = "
            <a class='label sale' href='#' style='color:black;'>
                <div class='thelabel'>$pro_label</div>
                <div class='label-background'> </div>
            </a>";
  }

  $get_p_cat = "BEGIN
                    SELECT * FROM product_categories WHERE p_cat_id=:p_cat_id;
                END;";

  $statement = oci_parse($conn, $get_p_cat);
  oci_bind_by_name($statement, ":p_cat_id", $p_cat_id);
  oci_execute($statement);

  $row_p_cat = oci_fetch_array($statement);
  $p_cat_title = $row_p_cat['P_CAT_TITLE'];
?>

  <main>
    <!-- HERO -->
    <div class="nero">
      <div class="nero__heading">
        <span class="nero__bold">Product </span>View
      </div>
      <p class="nero__text"></p>
    </div>
  </main>

  <div id="content">
    <!-- content Starts -->
    <div class="container">
      <!-- container Starts -->
      <div class="col-md-12">
        <!-- col-md-12 Starts -->
        <div class="row" id="productMain">
          <!-- row Starts -->
          <div class="col-sm-6">
            <!-- col-sm-6 Starts -->
            <div id="mainImage">
              <!-- mainImage Starts -->
              <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <!-- carousel-indicators Starts -->
                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel" data-slide-to="1"></li>
                  <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  <!-- carousel-inner Starts -->
                  <div class="item active">
                    <center>
                      <img src="admin_area/product_images/<?php echo $pro_img1; ?>" class="img-responsive">
                    </center>
                  </div>
                  <div class="item">
                    <center>
                      <img src="admin_area/product_images/<?php echo $pro_img2; ?>" class="img-responsive">
                    </center>
                  </div>
                  <div class="item">
                    <center>
                      <img src="admin_area/product_images/<?php echo $pro_img3; ?>" class="img-responsive">
                    </center>
                  </div>
                </div>
                <a href="#myCarousel" class="left carousel-control" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left"> </span>
                  <span class="sr-only"> Previous </span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right"> </span>
                  <span class="sr-only"> Next </span>
                </a>
              </div>
            </div>
            <?php echo $product_label; ?>
          </div>
          <div class="col-sm-6">
            <!-- col-sm-6 Starts -->
            <div class="box">
              <!-- box Starts -->
              <h1 class="text-center"> <?php echo $pro_title; ?> </h1>
              <?php
              if (isset($_POST['add_cart'])) {
                $ip = $_SERVER['HTTP_X_REAL_IP'] ?? $_SERVER['HTTP_CLIENT_IP'] ?? $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'];

                return $ip;
                $p_id = $pro_id;
                $product_qty = $_POST['product_qty'];
                $product_size = $_POST['product_size'];

                $check_product = "BEGIN
                                                    SELECT * FROM cart WHERE ip_add=:p_ip_add AND p_id=:p_p_id;
                                                  END;";

                $statement = oci_parse($conn, $check_product);
                oci_bind_by_name($statement, ":p_ip_add", $ip_add);
                oci_bind_by_name($statement, ":p_p_id", $p_id);
                oci_execute($statement);

                $num_rows = oci_fetch_all($statement, $res);

                if ($num_rows > 0) {
                  echo "<script>alert('This Product is already added in cart')</script>";
                  echo "<script>window.open('$pro_url','_self')</script>";
                } else {
                  $get_price = "BEGIN
                                                    SELECT * FROM products WHERE product_id=:p_p_id;
                                                  END;";

                  $statement = oci_parse($conn, $get_price);
                  oci_bind_by_name($statement, ":p_p_id", $p_id);
                  oci_execute($statement);
                  $row_price = oci_fetch_array($statement);

                  $pro_price = $row_price['PRODUCT_PRICE'];
                  $pro_psp_price = $row_price['PRODUCT_PSP_PRICE'];
                  $pro_label = $row_price['PRODUCT_LABEL'];

                  if ($pro_label == "Sale" || $pro_label == "Gift") {
                    $product_price = $pro_psp_price;
                  } else {
                    $product_price = $pro_price;
                  }

                  $query = "BEGIN
                                                INSERT INTO cart (p_id,ip_add,qty,p_price,size) 
                                                VALUES (:p_p_id, :p_ip_add, :p_qty, :p_price, :p_size);
                                              END;";

                  $statement = oci_parse($conn, $query);
                  oci_bind_by_name($statement, ":p_p_id", $p_id);
                  oci_bind_by_name($statement, ":p_ip_add", $ip_add);
                  oci_bind_by_name($statement, ":p_qty", $product_qty);
                  oci_bind_by_name($statement, ":p_price", $product_price);
                  oci_bind_by_name($statement, ":p_size", $product_size);
                  oci_execute($statement);

                  echo "<script>window.open('$pro_url','_self')</script>";
                }
              }
              ?>
              <form action="" method="post" class="form-horizontal">
                <?php
                if ($status == "product") {
                ?>
                  <div class="form-group">
                    <label class="col-md-5 control-label">Product Quantity </label>
                    <div class="col-md-7">
                      <select name="product_qty" class="form-control">
                        <option>Select quantity</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-5 control-label">Product Size</label>
                    <div class="col-md-7">
                      <select name="product_size" class="form-control">
                        <option>Select a Size</option>
                        <option>Small</option>
                        <option>Medium</option>
                        <option>Large</option>
                      </select>
                    </div>
                  </div>
                <?php } else { ?>
                  <div class="form-group">
                    <label class="col-md-5 control-label">Bundle Quantity </label>
                    <div class="col-md-7">
                      <select name="product_qty" class="form-control">
                        <option>Select quantity</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-5 control-label">Bundle Size</label>
                    <div class="col-md-7">
                      <select name="product_size" class="form-control">
                        <option>Select a Size</option>
                        <option>Small</option>
                        <option>Medium</option>
                        <option>Large</option>
                      </select>
                    </div>
                  </div>
                <?php } ?>
                <?php
                if ($status == "product") {
                  if ($pro_label == "Sale" || $pro_label == "Gift") {
                    echo "<p class='price'>Product Price : <del> $$pro_price </del><br>Product sale Price : $$pro_psp_price</p>";
                  } else {
                    echo "<p class='price'>Product Price : $$pro_price</p>";
                  }
                } else {
                  if ($pro_label == "Sale" || $pro_label == "Gift") {
                    echo "<p class='price'>Bundle Price : <del> $$pro_price </del><br>Bundle sale Price : $$pro_psp_price</p>";
                  } else {
                    echo "<p class='price'>Bundle Price : $$pro_price</p>";
                  }
                }
                ?>
                <p class="text-center buttons">
                  <button class="btn btn-danger" type="submit" name="add_cart">
                    <i class="fa fa-shopping-cart"></i> Add to Cart
                  </button>
                  <button class="btn btn-warning" type="submit" name="add_wishlist">
                    <i class="fa fa-heart"></i> Add to Wishlist
                  </button>
                  <?php
                  if (isset($_POST['add_wishlist'])) {
                    if (!isset($_SESSION['customer_email'])) {
                      echo "<script>alert('You Must Login To Add Product In Wishlist')</script>";
                      echo "<script>window.open('checkout.php','_self')</script>";
                    } else {
                      $customer_session = $_SESSION['customer_email'];
                      $get_customer = "BEGIN
                                                                SELECT * FROM customers WHERE customer_email=:p_customer_session;
                                                            END;";

                      $statement = oci_parse($conn, $get_customer);
                      oci_bind_by_name($statement, ":p_customer_session", $customer_session);
                      oci_execute($statement);

                      $row_customer = oci_fetch_array($statement);

                      $customer_id = $row_customer['CUSTOMER_ID'];

                      $select_wishlist = "BEGIN
                                                                SELECT * FROM wishlist WHERE customer_id=:p_customer_id AND product_id=:p_pro_id;
                                                            END;";

                      $statement = oci_parse($conn, $select_wishlist);
                      oci_bind_by_name($statement, ":p_customer_id", $customer_id);
                      oci_bind_by_name($statement, ":p_pro_id", $pro_id);
                      oci_execute($statement);

                      $check_wishlist = oci_fetch_all($statement, $res);

                      if ($check_wishlist == 1) {
                        echo "<script>alert('This Product Has Been already Added In Wishlist')</script>";
                        echo "<script>window.open('$pro_url','_self')</script>";
                      } else {
                        $insert_wishlist = "BEGIN
                                                                        INSERT INTO wishlist (customer_id,product_id) VALUES (:p_customer_id, :p_pro_id);
                                                                    END;";

                        $statement = oci_parse($conn, $insert_wishlist);
                        oci_bind_by_name($statement, ":p_customer_id", $customer_id);
                        oci_bind_by_name($statement, ":p_pro_id", $pro_id);
                        oci_execute($statement);

                        echo "<script> alert('Product Has Inserted Into Wishlist') </script>";
                        echo "<script>window.open('$pro_url','_self')</script>";
                      }
                    }
                  }
                  ?>
                </p>
              </form>
            </div>
            <div class="row" id="thumbs">
              <div class="col-xs-4">
                <a href="#" class="thumb">
                  <img src="admin_area/product_images/<?php echo $pro_img1; ?>" class="img-responsive">
                </a>
              </div>
              <div class="col-xs-4">
                <a href="#" class="thumb">
                  <img src="admin_area/product_images/<?php echo $pro_img2; ?>" class="img-responsive">
                </a>
              </div>
              <div class="col-xs-4">
                <a href="#" class="thumb">
                  <img src="admin_area/product_images/<?php echo $pro_img3; ?>" class="img-responsive">
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="box" id="details">
          <a class="btn btn-info tab" style="margin-bottom:10px;" href="#description" data-toggle="tab">Product Description</a>
          <a class="btn btn-info tab" style="margin-bottom:10px;" href="#features" data-toggle="tab">Features</a>
          <a class="btn btn-info tab" style="margin-bottom:10px;" href="#video" data-toggle="tab">Sounds and Videos</a>
          <hr style="margin-top:0px;">
          <div class="tab-content">
            <div id="description" class="tab-pane fade in active" style="margin-top:7px;">
              <?php echo $pro_desc; ?>
            </div>
            <div id="features" class="tab-pane fade in" style="margin-top:7px;">
              <?php echo $pro_features; ?>
            </div>
            <div id="video" class="tab-pane fade in" style="margin-top:7px;">
              <?php echo $pro_video; ?>
            </div>
          </div>
        </div>
        <div id="row same-height-row">
          <?php
          if ($status == "product") {
          ?>
            <div class="col-md-3 col-sm-6">
              <div class="box same-height headline">
                <h3 class="text-center"> You may also like these Products: We provide you top 3 product items. </h3>
              </div>
            </div>
            <?php
            $get_products = "BEGIN
                                            SELECT * FROM products ORDER BY DBMS_RANDOM.RANDOM() WHERE ROWNUM <= 3;
                                         END;";

            $statement = oci_parse($conn, $get_products);
            oci_execute($statement);

            while ($row_products = oci_fetch_array($statement)) {
              $pro_id = $row_products['PRODUCT_ID'];
              $pro_title = $row_products['PRODUCT_TITLE'];
              $pro_price = $row_products['PRODUCT_PRICE'];
              $pro_img1 = $row_products['PRODUCT_IMG1'];
              $pro_label = $row_products['PRODUCT_LABEL'];
              $manufacturer_id = $row_products['MANUFACTURER_ID'];
              $get_manufacturer = "BEGIN
                                                    SELECT * FROM manufacturers WHERE manufacturer_id=:p_manufacturer_id;
                                                END;";

              $statement = oci_parse($conn, $get_manufacturer);
              oci_bind_by_name($statement, ":p_manufacturer_id", $manufacturer_id);
              oci_execute($statement);

              $row_manufacturer = oci_fetch_array($statement);
              $manufacturer_name = $row_manufacturer['MANUFACTURER_TITLE'];
              $pro_psp_price = $row_products['PRODUCT_PSP_PRICE'];
              $pro_url = $row_products['PRODUCT_URL'];

              if ($pro_label == "Sale" || $pro_label == "Gift") {
                $product_price = "<del> $$pro_price </del>";
                $product_psp_price = "| $$pro_psp_price";
              } else {
                $product_psp_price = "";
                $product_price = "$$pro_price";
              }

              if ($pro_label == "") {
                $product_label = "";
              } else {
                $product_label = "
                                    <a class='label sale' href='#' style='color:black;'>
                                        <div class='thelabel'>$pro_label</div>
                                        <div class='label-background'> </div>
                                    </a>";
              }
            ?>
              <div class="col-md-3 col-sm-6 center-responsive">
                <div class="product same-height">
                  <a href="<?php echo $pro_url; ?>">
                    <img src="admin_area/product_images/<?php echo $pro_img1; ?>" class="img-responsive">
                  </a>
                  <div class="text">
                    <h3><a href="<?php echo $pro_url; ?>"><?php echo $pro_title; ?></a></h3>
                    <p class="price"><?php echo $product_price . " " . $product_psp_price; ?></p>
                    <p class="buttons">
                      <a href="<?php echo $pro_url; ?>" class="btn btn-default">View details</a>
                      <a href="<?php echo $pro_url; ?>" class="btn btn-primary">
                        <i class="fa fa-shopping-cart"></i> Add to cart
                      </a>
                    </p>
                  </div>
                  <?php echo $product_label; ?>
                </div>
              </div>
            <?php }
          } else { ?>
            <div class="col-md-3 col-sm-6">
              <div class="box same-height headline">
                <h3 class="text-center"> You may also like these Bundles: We provide you top 3 bundles. </h3>
              </div>
            </div>
            <?php
            $get_products = "BEGIN
                                            SELECT * FROM products ORDER BY DBMS_RANDOM.RANDOM() WHERE ROWNUM <= 3;
                                         END;";

            $statement = oci_parse($conn, $get_products);
            oci_execute($statement);

            while ($row_products = oci_fetch_array($statement)) {
              $pro_id = $row_products['PRODUCT_ID'];
              $pro_title = $row_products['PRODUCT_TITLE'];
              $pro_price = $row_products['PRODUCT_PRICE'];
              $pro_img1 = $row_products['PRODUCT_IMG1'];
              $pro_label = $row_products['PRODUCT_LABEL'];
              $manufacturer_id = $row_products['MANUFACTURER_ID'];
              $get_manufacturer = "BEGIN
                                                    SELECT * FROM manufacturers WHERE manufacturer_id=:p_manufacturer_id;
                                                END;";

              $statement = oci_parse($conn, $get_manufacturer);
              oci_bind_by_name($statement, ":p_manufacturer_id", $manufacturer_id);
              oci_execute($statement);

              $row_manufacturer = oci_fetch_array($statement);
              $manufacturer_name = $row_manufacturer['MANUFACTURER_TITLE'];
              $pro_psp_price = $row_products['PRODUCT_PSP_PRICE'];
              $pro_url = $row_products['PRODUCT_URL'];

              if ($pro_label == "Sale" || $pro_label == "Gift") {
                $product_price = "<del> $$pro_price </del>";
                $product_psp_price = "| $$pro_psp_price";
              } else {
                $product_psp_price = "";
                $product_price = "$$pro_price";
              }

              if ($pro_label == "") {
                $product_label = "";
              } else {
                $product_label = "
                                    <a class='label sale' href='#' style='color:black;'>
                                        <div class='thelabel'>$pro_label</div>
                                        <div class='label-background'> </div>
                                    </a>";
              }
            ?>
              <div class="col-md-3 col-sm-6 center-responsive">
                <div class="product same-height">
                  <a href="<?php echo $pro_url; ?>">
                    <img src="admin_area/product_images/<?php echo $pro_img1; ?>" class="img-responsive">
                  </a>
                  <div class="text">
                    <h3><a href="<?php echo $pro_url; ?>"><?php echo $pro_title; ?></a></h3>
                    <p class="price"><?php echo $product_price . " " . $product_psp_price; ?></p>
                    <p class="buttons">
                      <a href="<?php echo $pro_url; ?>" class="btn btn-default">View details</a>
                      <a href="<?php echo $pro_url; ?>" class="btn btn-primary">
                        <i class="fa fa-shopping-cart"></i> Add to cart
                      </a>
                    </p>
                  </div>
                  <?php echo $product_label; ?>
                </div>
              </div>
          <?php }
          } ?>
        </div>
      </div>
    </div>
  </div>
  <?php include("includes/footer.php"); ?>

  <?php

  include("includes/footer.php");

  ?>

  <script src="js/jquery.min.js"> </script>

  <script src="js/bootstrap.min.js"></script>

  </body>

  </html>

<?php } ?>