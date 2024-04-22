<?php

session_start();

include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");

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

<div id="content"><!-- content Starts -->
  <div class="container"><!-- container Starts -->
    <div class="col-md-9" id="cart"><!-- col-md-9 Starts -->
      <div class="box"><!-- box Starts -->
        <form action="cart.php" method="post" enctype="multipart/form-data"><!-- form Starts -->
          <h1> Shopping Cart </h1>
          <?php
          $ip_add = getRealUserIp();
          $stmt = oci_parse($conexion, "BEGIN get_cart_info(:ip_add, :cart_cursor); END;");
          oci_bind_by_name($stmt, ":ip_add", $ip_add);
          oci_bind_by_name($stmt, ":cart_cursor", $cart_cursor, -1, OCI_B_CURSOR);
          oci_execute($stmt);
          ?>
          <p class="text-muted"> You currently have <?php echo oci_num_rows($cart_cursor); ?> item(s) in your cart. </p>
          <div class="table-responsive"><!-- table-responsive Starts -->
            <table class="table"><!-- table Starts -->
              <thead><!-- thead Starts -->
                <tr>
                  <th colspan="2">Product</th>
                  <th>Quantity</th>
                  <th>Unit Price</th>
                  <th>Size</th>
                  <th colspan="1">Delete</th>
                  <th colspan="2">Sub Total</th>
                </tr>
              </thead><!-- thead Ends -->
              <tbody><!-- tbody Starts -->
                <?php
                $total = 0;
                while ($row_cart = oci_fetch_array($cart_cursor, OCI_ASSOC + OCI_RETURN_NULLS)) {
                  $pro_id = $row_cart['P_ID'];
                  $pro_size = $row_cart['SIZE'];
                  $pro_qty = $row_cart['QTY'];
                  $only_price = $row_cart['PRODUCT_PRICE'];
                  $product_title = $row_cart['PRODUCT_TITLE'];
                  $product_img1 = $row_cart['PRODUCT_IMG1'];
                  $sub_total = $only_price * $pro_qty;
                  $total += $sub_total;
                ?>
                  <tr>
                    <td><img src="admin_area/product_images/<?php echo $product_img1; ?>" /></td>
                    <td><a href="#"><?php echo $product_title; ?></a></td>
                    <td><input type="text" name="quantity" value="<?php echo $pro_qty; ?>" data-product_id="<?php echo $pro_id; ?>" class="quantity form-control"></td>
                    <td>$<?php echo $only_price; ?>.00</td>
                    <td><?php echo $pro_size; ?></td>
                    <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"></td>
                    <td>$<?php echo $sub_total; ?>.00</td>
                  </tr>
                <?php } ?>
              </tbody><!-- tbody Ends -->
              <tfoot><!-- tfoot Starts -->
                <tr>
                  <th colspan="5">Total</th>
                  <th colspan="2">$<?php echo $total; ?>.00</th>
                </tr>
              </tfoot><!-- tfoot Ends -->
            </table><!-- table Ends -->
          </div><!-- table-responsive Ends -->
        </form><!-- form Ends -->
      </div><!-- box Ends -->
      <div class="box-footer"><!-- box-footer Starts -->
        <div class="pull-left"><!-- pull-left Starts -->
          <a href="index.php" class="btn btn-default">
            <i class="fa fa-chevron-left"></i> Continue Shopping
          </a>
        </div><!-- pull-left Ends -->
        <div class="pull-right"><!-- pull-right Starts -->
          <button class="btn btn-default" type="submit" name="update" value="Update Cart">
            <i class="fa fa-refresh"></i> Update Cart
          </button>
          <a href="checkout.php" class="btn btn-primary">
            Proceed to checkout <i class="fa fa-chevron-right"></i>
          </a>
        </div><!-- pull-right Ends -->
      </div><!-- box-footer Ends -->
    </div><!-- col-md-9 Ends -->
  </div><!-- container Ends -->
</div><!-- content Ends -->

<?php
include("includes/footer.php");
?>
<script src="js/jquery.min.js"> </script>
<script src="js/bootstrap.min.js"></script>
<script>
  $(document).ready(function(data) {
    $(document).on('keyup', '.quantity', function() {
      var id = $(this).data("product_id");
      var quantity = $(this).val();
      if (quantity != '') {
        $.ajax({
          url: "change.php",
          method: "POST",
          data: {
            id: id,
            quantity: quantity
          },
          success: function(data) {
            $("body").load('cart_body.php');
          }
        });
      }
    });
  });
</script>
</body>