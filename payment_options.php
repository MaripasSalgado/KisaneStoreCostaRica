<div class="box"><!-- box Starts -->

  <?php

  include("includes/db.php");
  include("includes/header.php");

  $session_email = $_SESSION['customer_email'];

  // Establecer la conexión con la base de datos Oracle
  $conn = oci_connect('username', 'password', 'localhost/XE');
  if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
  }

  // Obtener el ID del cliente utilizando un procedimiento almacenado
  $customer_id = 0;
  $get_customer_id_proc = oci_parse($conn, 'BEGIN :customer_id := get_customer_id(:customer_email); END;');
  oci_bind_by_name($get_customer_id_proc, ':customer_email', $session_email);
  oci_bind_by_name($get_customer_id_proc, ':customer_id', $customer_id, 10);
  oci_execute($get_customer_id_proc);

  ?>

  <h1 class="text-center">Payment Options For You</h1>

  <p class="lead text-center">

    <a href="order.php?c_id=<?php echo $customer_id; ?>">Pay Off line</a>

  </p>

  <center><!-- center Starts -->

    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
      <input type="hidden" name="cmd" value="_s-xclick">
      <input type="hidden" name="hosted_button_id" value="9PWJZYVQH8KGU">

      <?php

      $i = 0;
      $ip = $_SERVER['HTTP_X_REAL_IP'] ?? $_SERVER['HTTP_CLIENT_IP'] ?? $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'];

      // Obtener los productos del carrito utilizando un procedimiento almacenado
      $get_cart_proc = oci_parse($conn, 'BEGIN get_cart_items(:ip, :cursor); END;');
      oci_bind_by_name($get_cart_proc, ':ip', $ip);
      $cursor = oci_new_cursor($conn);
      oci_bind_by_name($get_cart_proc, ':cursor', $cursor, -1, OCI_B_CURSOR);
      oci_execute($get_cart_proc);

      while ($row_cart = oci_fetch_array($cursor, OCI_ASSOC + OCI_RETURN_NULLS)) {

        $pro_id = $row_cart['P_ID'];
        $pro_qty = $row_cart['QTY'];
        $pro_price = $row_cart['P_PRICE'];

        // Obtener los detalles del producto utilizando un procedimiento almacenado
        $get_product_proc = oci_parse($conn, 'BEGIN get_product_details(:pro_id, :product_title, :product_price); END;');
        oci_bind_by_name($get_product_proc, ':pro_id', $pro_id);
        oci_bind_by_name($get_product_proc, ':product_title', $product_title, 255);
        oci_bind_by_name($get_product_proc, ':product_price', $product_price, 10);
        oci_execute($get_product_proc);

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