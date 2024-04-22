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
      <span class="nero__bold">Terms</span> of use
    </div>
    <p class="nero__text">
    </p>
  </div>
</main>

<div id="content"><!-- content Starts -->
  <div class="container"><!-- container Starts -->
    <div class="col-md-3"><!-- col-md-3 Starts -->
      <div class="box"><!-- box Starts -->
        <ul class="nav nav-pills nav-stacked"><!-- nav nav-pills nav-stacked Starts -->
          <li class="active">
            <a data-toggle="pill" href="#<?php echo $term_link; ?>">
              <?php echo $term_title; ?>
            </a>
          </li>
        </ul><!-- nav nav-pills nav-stacked Ends -->
      </div><!-- box Ends -->
    </div><!-- col-md-3 Ends -->

    <div class="col-md-9"><!-- col-md-9 Starts -->
      <div class="box"><!-- box Starts -->
        <div class="tab-content"><!-- tab-content Starts -->
          <div id="<?php echo $term_link; ?>" class="tab-pane fade in active"><!-- tab-pane fade in active Starts -->
            <h1><?php echo $term_title; ?></h1>
            <p><?php echo $term_desc; ?></p>
          </div><!-- tab-pane fade in active Ends -->
        </div><!-- tab-content Ends -->
      </div><!-- box Ends -->
    </div><!-- col-md-9 Ends -->
  </div><!-- container Ends -->
</div><!-- content Ends -->

<?php include("includes/footer.php"); ?>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>

</html>