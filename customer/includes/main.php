<?php

session_start();

include("includes/db.php");
include("./includes/header.php");
include("includes/main.php");

?>
<!-- MAIN -->
<main>
  <!-- HERO -->
  <div class="nero">
    <div class="nero__heading">
      <span class="nero__bold">shop</span> AT AVE
    </div>
    <p class="nero__text">
    </p>
  </div>
</main>


<div id="content"><!-- content Starts -->
  <div class="container"><!-- container Starts -->

    <div class="col-md-12"><!--- col-md-12 Starts -->



    </div><!--- col-md-12 Ends -->

    <div class="col-md-3"><!-- col-md-3 Starts -->

      <?php include("includes/sidebar.php"); ?>

    </div><!-- col-md-3 Ends -->

    <div class="col-md-9"><!-- col-md-9 Starts --->
      <!--Get products -->
      <div id="Products">
        <?php
        // Llamar al procedimiento almacenado para obtener los productos
        $sql = "BEGIN
                  get_products();
                END;";
        $stmt = oci_parse($conn, $sql);
        oci_execute($stmt);

        // Mostrar los productos
        while (($row = oci_fetch_array($stmt, OCI_ASSOC + OCI_RETURN_NULLS)) !== false) {
          echo "<p>Product ID: " . $row['PRODUCT_ID'] . ", Product Title: " . $row['PRODUCT_TITLE'] . ", Product Price: " . $row['PRODUCT_PRICE'] . "</p>";
        }
        ?>
      </div><!-- End Products -->

    </div><!-- row Ends -->

    <center><!-- center Starts -->

      <ul class="pagination"><!-- pagination Starts -->
        <!-- Aquí se incluirá la paginación si lo deseas -->
      </ul><!-- pagination Ends -->

    </center><!-- center Ends -->

  </div><!-- col-md-9 Ends --->

</div><!--- wait Ends -->

</div><!-- container Ends -->
</div><!-- content Ends -->

<?php include("includes/footer.php"); ?>

<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>

<script>
  $(document).ready(function() {
    // Tu código JavaScript aquí si es necesario
  });
</script>

<?php
// Llamar al procedimiento almacenado para obtener el conteo de elementos del carrito
$sql = "BEGIN
          get_items_count;
        END;";
$stmt = oci_parse($conn, $sql);
oci_execute($stmt);
?>
</body>

</html>