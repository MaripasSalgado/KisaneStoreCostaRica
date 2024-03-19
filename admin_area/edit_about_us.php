<?php


if (!isset($_SESSION['admin_email'])) {

  echo "<script>window.open('login.php','_self')</script>";
} else {


?>


  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

  <script>
    tinymce.init({
      selector: '#about_desc'
    });
  </script>

  <?php

  //PL/SQL

  ?>

  <div class="row"><!-- 1 row Starts -->

    <div class="col-lg-12"><!-- col-lg-12 Starts -->

      <ol class="breadcrumb"><!-- breadcrumb Starts -->

        <li class="active">

          <i class="fa fa-dashboard"></i> Dashboard / Edit About Us Page

        </li>

      </ol><!-- breadcrumb Ends -->

    </div><!-- col-lg-12 Ends -->

  </div><!-- 1 row Ends -->

  <div class="row"><!-- 2 row Starts -->

    <div class="col-lg-12"><!-- col-lg-12 Starts -->

      <div class="panel panel-default"><!-- panel panel-default Starts -->

        <div class="panel-heading"><!-- panel-heading Starts -->

          <h3 class="panel-title">

            <i class="fa fa-money fa-fw"></i> Edit About Us Page

          </h3>

        </div><!-- panel-heading Ends -->

        <div class="panel-body"><!-- panel-body Starts -->

          <form method="post" class="form-horizontal"><!-- form-horizontal Starts -->

            <div class="form-group"><!-- form-group Starts -->

              <label class="col-md-3 control-label"> About Us Heading : </label>

              <div class="col-md-8">

                <input type="text" name="about_heading" class="form-control" value="<?php echo $about_heading; ?>">

              </div>

            </div><!-- form-group Ends -->


            <div class="form-group"><!-- form-group Starts -->

              <label class="col-md-3 control-label"> About Us Short Description : </label>

              <div class="col-md-8">

                <textarea name="about_short_desc" class="form-control" rows="5">

<?php //PL/SQL  
?>

</textarea>

              </div>

            </div><!-- form-group Ends -->

            <div class="form-group"><!-- form-group Starts -->

              <label class="col-md-3 control-label"> About Us Description : </label>

              <div class="col-md-8">

                <textarea name="about_desc" id="about_desc" class="form-control" rows="10">

<?php //PL/SQL 
?>

</textarea>

              </div>

            </div><!-- form-group Ends -->

            <div class="form-group"><!-- form-group Starts -->

              <label class="col-md-3 control-label"> </label>

              <div class="col-md-8">

                <input type="submit" name="submit" value="Update About Us Page" class="btn btn-primary form-control">

              </div>

            </div><!-- form-group Ends -->


          </form><!-- form-horizontal Ends -->

        </div><!-- panel-body Ends -->

      </div><!-- panel panel-default Ends -->

    </div><!-- col-lg-12 Ends -->

  </div><!-- 2 row Ends -->

  <?php

  //PL/SQL

  ?>


<?php } ?>