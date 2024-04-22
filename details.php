<?php
session_start();

include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");

$product_id = @$_GET['product_id'];

$product_details = getProductDetails($product_id);


if (empty($pro_label)) {
  $product_label = "";
} else {
  $product_label = "<a class='label sale' href='#' style='color:black;'><div class='thelabel'>$pro_label</div><div class='label-background'> </div></a>";
}
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

<div id="content"><!-- content Starts -->
  <div class="container"><!-- container Starts -->
    <div class="col-md-12"><!-- col-md-12 Starts -->
      <div class="row" id="productMain"><!-- row Starts -->
        <div class="col-sm-6"><!-- col-sm-6 Starts -->
          <div id="mainImage"><!-- mainImage Starts -->
            </ol><!-- carousel-indicators Ends -->
            <div class="carousel-inner"><!-- carousel-inner Starts -->
              <div class="item active">
                <center><img src="admin_area/product_images/<?php $pro_img1; ?>" class="img-responsive"></center>
              </div>
            </div><!-- carousel-inner Ends -->
            <a href="#myCarousel" class="left carousel-control" data-slide="prev"><!-- left carousel-control Starts -->
              <span class="glyphicon glyphicon-chevron-left"></span>
              <span class="sr-only"> Previous </span>
            </a><!-- left carousel-control Ends -->
            <a class="right carousel-control" href="#myCarousel" data-slide="next"><!-- right carousel-control Starts -->
              <span class="glyphicon glyphicon-chevron-right"></span>
              <span class="sr-only"> Next </span>
            </a><!-- right carousel-control Ends -->
          </div>
        </div><!-- mainImage Ends -->

      </div><!-- col-sm-6 Ends -->
      <div class="col-sm-6"><!-- col-sm-6 Starts -->
        <div class="box"><!-- box Starts -->
          <h1 class="text-center"></h1>
          <?php
          if (isset($_POST['add_cart'])) {
            $ip_add = getRealUserIp();
            $p_id = $pro_id;
            $product_qty = $_POST['product_qty'];
            $product_size = $_POST['product_size'];
            addToCart($p_id, $ip_add, $product_qty, $product_size, $con);
            echo "<script>window.open('$pro_url','_self')</script>";
          }
          ?>
          <form action="" method="post" class="form-horizontal"><!-- form-horizontal Starts -->
            <div class="form-group"><!-- form-group Starts -->
              <label class="col-md-5 control-label">Product Quantity </label>
              <div class="col-md-7"><!-- col-md-7 Starts -->
                <select name="product_qty" class="form-control">
                  <option>Select quantity</option>
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
              </div><!-- col-md-7 Ends -->
            </div><!-- form-group Ends -->
            <div class="form-group"><!-- form-group Starts -->
              <label class="col-md-5 control-label">Product Size</label>
              <div class="col-md-7"><!-- col-md-7 Starts -->
                <select name="product_size" class="form-control">
                  <option>Select a Size</option>
                  <option>Small</option>
                  <option>Medium</option>
                  <option>Large</option>
                </select>
              </div><!-- col-md-7 Ends -->
            </div><!-- form-group Ends -->
            <p class="price">$ </p>
            <p class="text-center buttons"><button class="btn btn-primary" type="submit" name="add_cart"><i class="fa fa-shopping-cart"></i> Add to cart</button></p>
          </form><!-- form-horizontal Ends -->
        </div><!-- box Ends -->
      </div><!-- col-sm-6 Ends -->
    </div><!-- row Ends -->
    <div class="box" id="details"><!-- box Starts -->
      <h4>Product Details</h4>
      <p></p>
      <h4>Size</h4>
      <ul>
        <li>Small</li>
        <li>Medium</li>
        <li>Large</li>
      </ul>
      <hr>
    </div><!-- box Ends -->
  </div><!-- col-md-12 Ends -->
</div><!-- container Ends -->
</div><!-- content Ends -->

<?php include("includes/footer.php"); ?>
<script src="js/jquery.min.js"> </script>
<script src="js/bootstrap.min.js"></script>
</body>

</html>