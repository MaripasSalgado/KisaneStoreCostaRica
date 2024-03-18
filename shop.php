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

    /// Hide And Show Code Starts ///
    $('.nav-toggle').click(function() {
      $(".panel-collapse,.collapse-data").slideToggle(700, function() {
        if ($(this).css('display') == 'none') {
          $(".hide-show").html('Show');
        } else {
          $(".hide-show").html('Hide');
        }
      });
    });
    /// Hide And Show Code Ends ///

    /// Search Filters code Starts ///
    $(function() {
      $.fn.extend({
        filterTable: function() {
          return this.each(function() {
            $(this).on('keyup', function() {
              var $this = $(this),
                search = $this.val().toLowerCase(),
                target = $this.attr('data-filters'),
                handle = $(target),
                rows = handle.find('li a');
              if (search == '') {
                rows.show();
              } else {
                rows.each(function() {
                  var $this = $(this);
                  $this.text().toLowerCase().indexOf(search) === -1 ? $this.hide() : $this.show();
                });
              }
            });
          });
        }
      });
      $('[data-action="filter"][id="dev-table-filter"]').filterTable();
    });
    /// Search Filters code Ends ///

  });
</script>

<script>
  $(document).ready(function() {
    // getProducts Function Code Starts
    function getProducts() {
      <?php
      // Llamar al procedimiento almacenado
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
    }

    // Manufacturers Code Starts
    var sPath = '';
    var aInputs = $('li').find('.get_manufacturer');
    var aKeys = Array();
    var aValues = Array();
    iKey = 0;
    $.each(aInputs, function(key, oInput) {
      if (oInput.checked) {
        aKeys[iKey] = oInput.value;
      };
      iKey++;
    });
    if (aKeys.length > 0) {
      var sPath = '';
      for (var i = 0; i < aKeys.length; i++) {
        sPath = sPath + 'man[]=' + aKeys[i] + '&';
      }
    }
    // Manufacturers Code ENDS

    // Products Categories Code Starts
    var aInputs = Array();
    var aInputs = $('li').find('.get_p_cat');
    var aKeys = Array();
    var aValues = Array();
    iKey = 0;
    $.each(aInputs, function(key, oInput) {
      if (oInput.checked) {
        aKeys[iKey] = oInput.value;
      };
      iKey++;
    });
    if (aKeys.length > 0) {
      for (var i = 0; i < aKeys.length; i++) {
        sPath = sPath + 'p_cat[]=' + aKeys[i] + '&';
      }
    }
    // Products Categories Code ENDS

    // Categories Code Starts
    var aInputs = Array();
    var aInputs = $('li').find('.get_cat');
    var aKeys = Array();
    var aValues = Array();
    iKey = 0;
    $.each(aInputs, function(key, oInput) {
      if (oInput.checked) {
        aKeys[iKey] = oInput.value;
      };
      iKey++;
    });
    if (aKeys.length > 0) {
      for (var i = 0; i < aKeys.length; i++) {
        sPath = sPath + 'cat[]=' + aKeys[i] + '&';
      }
    }
    // Categories Code ENDS

    // Loader Code Starts
    $('#wait').html('<img src="images/load.gif">');
    // Loader Code ENDS

    // ajax Code Starts
    $.ajax({
      url: "load.php",
      method: "POST",
      data: sPath + 'sAction=getProducts',
      success: function(data) {
        $('#Products').html('');
        $('#Products').html(data);
        $("#wait").empty();
      }
    });

    $.ajax({
      url: "load.php",
      method: "POST",
      data: sPath + 'sAction=getPaginator',
      success: function(data) {
        $('.pagination').html('');
        $('.pagination').html(data);
      }
    });
    // ajax Code Ends
  });
</script>

</body>

</html>