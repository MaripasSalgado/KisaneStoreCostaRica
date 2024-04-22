<?php

include("includes/db.php");
include("./includes/header.php");
include("functions/functions.php");
include("includes/main.php");


// Lógica para obtener el ID del cliente de la sesión
$customer_id = get_customer_id_from_session();

?>
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

    </div><!-- col-md-3 Ends -->

    <div class="col-md-9"><!-- col-md-9 Starts --->


      <?php getPro(); ?>

    </div><!-- row Ends -->

    <center><!-- center Starts -->

      <ul class="pagination"><!-- pagination Starts -->

        <?php getPaginator(); ?>

      </ul><!-- pagination Ends -->

    </center><!-- center Ends -->



  </div><!-- col-md-9 Ends --->



</div><!--- wait Ends -->

</div><!-- container Ends -->
</div><!-- content Ends -->



<?php

include("includes/footer.php");

?>

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

    // Lógica para activar la función getProducts al hacer clic en los filtros
    $('.get_manufacturer, .get_p_cat, .get_cat').click(function() {
      getPro();
    });

  });
</script>