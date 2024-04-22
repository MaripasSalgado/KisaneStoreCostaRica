<div class="box"><!-- box Starts -->

  <?php

  $session_email = $_SESSION['customer_email'];

  // Llamada al procedimiento para obtener los datos del cliente
  $customer_data = get_customer_data($con, $session_email);

  $customer_id = $customer_data['CUSTOMER_ID'];

  ?>

  <h1 class="text-center">Payment Options For You</h1>

  <p class="lead text-center">

    <a href="order.php?c_id=<?php echo $customer_id; ?>">Pay Off line</a>

  </p>

  <center><!-- center Starts -->

    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
      <input type="hidden" name="cmd" value="_s-xclick">
      <input type="hidden" name="hosted_button_id" value="9PWJZYVQH8KGU">
      <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
      <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
    </form>

    <?php

    $i = 0;
    $ip_add = getRealUserIp();

    // Llamada al procedimiento para obtener los elementos del carrito del cliente
    $cart_items = get_cart_items($con, $ip_add);

    foreach ($cart_items as $row_cart) {
      $pro_id = $row_cart['P_ID'];
      $pro_qty = $row_cart['QTY'];
      $pro_price = $row_cart['P_PRICE'];

      // Llamada al procedimiento para obtener los detalles del producto
      $product_data = get_product_details($con, $pro_id);

      $product_title = $product_data['PRODUCT_TITLE'];

      $i++;
    ?>

      <input type="hidden" name="item_name_<?php echo $i; ?>" value="<?php echo $product_title; ?>">
      <input type="hidden" name="item_number_<?php echo $i; ?>" value="<?php echo $i; ?>">
      <input type="hidden" name="amount_<?php echo $i; ?>" value="<?php echo $pro_price; ?>">
      <input type="hidden" name="quantity_<?php echo $i; ?>" value="<?php echo $pro_qty; ?>">

    <?php } ?>

    <input type="image" name="submit" width="500" height="270" src="images/paypal.png">

    </form><!-- form Ends -->

  </center><!-- center Ends -->

</div><!-- box Ends -->