<?php

session_start();

include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");

$aMan = array();
$aPCat = array();
$aCat = array();
?>
<main>
  <!-- HERO -->
  <div class="nero">
    <div class="nero__heading">
      <span class="nero__bold">SHOP</span> Cart
    </div>
    <p class="nero__text">
    </p>
  </div>
</main>

<div id="content">
  <div class="container">

    <div class="col-md-9" id="cart">

      <div class="box">

        <form action="cart.php" method="post" enctype="multipart-form-data">

          <h1> Shopping Cart </h1>

          <?php

          // Get the number of items in the cart for the current user
          $ip = $_SERVER['HTTP_X_REAL_IP'] ?? $_SERVER['HTTP_CLIENT_IP'] ?? $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'];

          return $ip;
          $stmt = oci_parse($con, "BEGIN get_items_count(:ip_add, :count); END;");
          oci_bind_by_name($stmt, ":ip_add", $ip_add);
          oci_bind_by_name($stmt, ":count", $count, 32);
          oci_execute($stmt);

          ?>

          <p class="text-muted"> You currently have <?php echo $count; ?> item(s) in your cart. </p>

          <div class="table-responsive">

            <table class="table">

              <thead>
                <tr>
                  <th colspan="2">Product</th>
                  <th>Quantity</th>
                  <th>Unit Price</th>
                  <th>Size</th>
                  <th colspan="1">Delete</th>
                  <th colspan="2">Sub Total</th>
                </tr>
              </thead>

              <tbody>
                <?php
                // Fetch and display cart items
                $stmt = oci_parse($con, "BEGIN get_cart_items(:ip_add, :cart_cursor); END;");
                oci_bind_by_name($stmt, ":ip_add", $ip_add);
                $cart_cursor = oci_new_cursor($con);
                oci_bind_by_name($stmt, ":cart_cursor", $cart_cursor, -1, OCI_B_CURSOR);
                oci_execute($stmt);

                while (($row = oci_fetch_array($cart_cursor, OCI_ASSOC + OCI_RETURN_NULLS)) != false) {
                  $pro_id = $row['P_ID'];
                  $pro_size = $row['SIZE'];
                  $pro_qty = $row['QTY'];
                  $only_price = $row['P_PRICE'];
                  $product_title = $row['PRODUCT_TITLE'];
                  $product_img1 = $row['PRODUCT_IMG1'];
                  $sub_total = $only_price * $pro_qty;
                  $total += $sub_total;
                ?>
                  <tr>
                    <td><img src="admin_area/product_images/<?php echo $product_img1; ?>"></td>
                    <td><a href="#"><?php echo $product_title; ?></a></td>
                    <td><input type="text" name="quantity" value="<?php echo $pro_qty; ?>" data-product_id="<?php echo $pro_id; ?>" class="quantity form-control"></td>
                    <td>$<?php echo $only_price; ?>.00</td>
                    <td><?php echo $pro_size; ?></td>
                    <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"></td>
                    <td>$<?php echo $sub_total; ?>.00</td>
                  </tr>
                <?php } ?>
              </tbody>

              <tfoot>
                <tr>
                  <th colspan="5"> Total </th>
                  <th colspan="2"> $<?php echo $total; ?>.00 </th>
                </tr>
              </tfoot>

            </table>

            <div class="form-inline pull-right">
              <div class="form-group">
                <label>Coupon Code :</label>
                <input type="text" name="code" class="form-control">
              </div>
              <input class="btn btn-primary" type="submit" name="apply_coupon" value="Apply Coupon Code">
            </div>

          </div>

          <div class="box-footer">
            <div class="pull-left">
              <a href="index.php" class="btn btn-default">
                <i class="fa fa-chevron-left"></i> Continue Shopping
              </a>
            </div>
            <div class="pull-right">
              <button class="btn btn-default" type="submit" name="update" value="Update Cart">
                <i class="fa fa-refresh"></i> Update Cart
              </button>
              <a href="checkout.php" class="btn btn-primary">
                Proceed to checkout <i class="fa fa-chevron-right"></i>
              </a>
            </div>
          </div>

        </form>

      </div>

      <!-- Display recommended products here -->

    </div>

    <!-- Order Summary -->

  </div>
</div>

<?php

include("includes/footer.php");

?>