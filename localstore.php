<?php

session_start();

include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");

?>
<!-- MAIN -->
<main>
  <!-- HERO -->
  <div class="nero">
    <div class="nero__heading">
      <span class="nero__bold">Local </span>Stores
    </div>
    <p class="nero__text">
    </p>
  </div>
</main>

<div id="content"> <!-- content Starts -->
  <div class="container-fluid"> <!-- container Starts -->
    <div class="col-md-12"> <!-- col-md-12 Starts -->
      <div class="services row"> <!-- services row Starts -->

        <?php
        // Llamar a la función para obtener los servicios
        $services = getServices();

        // Recorrer los servicios y mostrarlos
        foreach ($services as $service) {
        ?>

          <div class="col-md-4 col-sm-6 box"> <!-- col-md-4 col-sm-6 box Starts -->

            <img src="admin_area/services_images/<?php echo $service['service_image']; ?>" class="img-responsive">

            <h2 align="center"> <?php echo $service['service_title']; ?> </h2>

            <p><?php echo $service['service_desc']; ?></p>

            <center>
              <a href="<?php echo $service['service_url']; ?>" class="btn btn-primary">
                <?php echo $service['service_button']; ?>
              </a>
            </center>

          </div> <!-- col-md-4 col-sm-6 box Ends -->

        <?php } ?>

      </div> <!-- services row Ends -->
    </div> <!-- col-md-12 Ends -->
  </div> <!-- container Ends -->
</div> <!-- content Ends -->

<?php
// Incluir archivo de pie de página
include("includes/footer.php");
?>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>

</html>



<?php

include("includes/footer.php");

?>

<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>

</body>

</html>