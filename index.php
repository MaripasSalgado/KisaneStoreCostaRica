<?php

session_start();

include("includes/db.php");
include("includes/header.php");
include("includes/main.php");

?>


<!-- Cover -->
<main>
  <div class="hero">
    <a href="/FinalProyect/Ecommerce-Zara/shop.php" class="btn1">View all products
    </a>
  </div>
  <!-- Main -->
  <div class="wrapper">
    <h1>Featured Collection<h1>

  </div>



  <div id="content" class="container"><!-- container Starts -->

    <div class="row"><!-- row Starts -->

      <?php

      $sql = "BEGIN
          get_products_cursor(:cursor);
        END;";
      $stmt = oci_parse($conn, $sql);

      // Bind del cursor de salida
      $cursor = oci_new_cursor($conn);
      oci_bind_by_name($stmt, ':cursor', $cursor, -1, OCI_B_CURSOR);

      // Ejecutar el procedimiento almacenado
      oci_execute($stmt);

      // Recorrer el cursor y mostrar los datos
      while ($row = oci_fetch_array($cursor, OCI_ASSOC + OCI_RETURN_NULLS)) {
        echo "<div class='col-md-4 col-sm-6 single'>";
        echo "  <div class='product'>";
        echo "    <a href='details.php?pro_id=" . $row['PRODUCT_ID'] . "'>";
        echo "      <img src='admin_area/product_images/" . $row['PRODUCT_IMG1'] . "' class='img-responsive'>";
        echo "    </a>";
        echo "    <div class='text'>";
        echo "      <h3><a href='details.php?pro_id=" . $row['PRODUCT_ID'] . "'>" . $row['PRODUCT_TITLE'] . "</a></h3>";
        echo "      <p class='price'>$ " . $row['PRODUCT_PRICE'] . "</p>";
        echo "      <p class='buttons'>";
        echo "        <a href='details.php?pro_id=" . $row['PRODUCT_ID'] . "' class='btn btn-default'>View details</a>";
        echo "        <a href='details.php?pro_id=" . $row['PRODUCT_ID'] . "' class='btn btn-primary'>";
        echo "          <i class='fa fa-shopping-cart'></i> Add to cart";
        echo "        </a>";
        echo "      </p>";
        echo "    </div>";
        echo "  </div>";
        echo "</div>";
      }

      // Liberar recursos
      oci_free_statement($stmt);
      oci_free_statement($cursor);

      ?>

    </div><!-- row Ends -->

  </div><!-- container Ends -->
  <!-- FOOTER -->
  <footer class="page-footer">

    <div class="footer-nav">
      <div class="container clearfix">

        <!-- refs added -->
        <div class="footer-nav__col footer-nav__col--account">
          <div class="footer-nav__heading">Your account</div>
          <ul class="footer-nav__list">
            <li class="footer-nav__item">
              <a href="cart.php" class="footer-nav__link">View cart</a>
            </li>
            <li class="footer-nav__item">
              <a href="/FinalProyect/Ecommerce-Zara/customer/my_account.php?my_orders" class="footer-nav__link">Track Order</a>
            </li>
            <li class="footer-nav__item">
              <a href="/FinalProyect/Ecommerce-Zara/customer/my_account.php?edit_account" class="footer-nav__link">Update information</a>
            </li>
          </ul>
        </div>


        <div class="footer-nav__col footer-nav__col--contacts">
          <div class="footer-nav__heading">Contact details</div>
          <address class="address">
            Head Office: Zara.<br>
            San Jose Costa Rica
          </address>
          <div class="phone">
            Telephone:
            <a class="phone__number" href="tel:0123456789">0123-456-789</a>
          </div>
          <div class="email">
            Email:
            <a href="mailto:support@zara.com" class="email__addr">support@zara.com</a>
          </div>
        </div>

      </div>
    </div>

    <div class="page-footer__subline">
      <div class="container clearfix">

        <div class="copyright">
          &copy; <?php echo date("Y"); ?> Zara-Ecommerce&trade;
        </div>

      </div>
    </div>
  </footer>
  </body>

  </html>