<?php

if (!isset($_SESSION['admin_email'])) {

  echo "<script>window.open('login.php','_self')</script>";
} else {

?>

  <?php

  //PL/SQL
  ?>


  <!DOCTYPE html>

  <html>

  <head>

    <title> Edit Products </title>


    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>
      tinymce.init({
        selector: '#product_desc,#product_features'
      });
    </script>

  </head>

  <body>

    <div class="row"><!-- row Starts -->

      <div class="col-lg-12"><!-- col-lg-12 Starts -->

        <ol class="breadcrumb"><!-- breadcrumb Starts -->

          <li class="active">

            <i class="fa fa-dashboard"> </i> Dashboard / Edit Products

          </li>

        </ol><!-- breadcrumb Ends -->

      </div><!-- col-lg-12 Ends -->

    </div><!-- row Ends -->


    <div class="row"><!-- 2 row Starts -->

      <div class="col-lg-12"><!-- col-lg-12 Starts -->

        <div class="panel panel-default"><!-- panel panel-default Starts -->

          <div class="panel-heading"><!-- panel-heading Starts -->

            <h3 class="panel-title">

              <i class="fa fa-money fa-fw"></i> Edit Products

            </h3>

          </div><!-- panel-heading Ends -->

          <div class="panel-body"><!-- panel-body Starts -->

            <form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

              <div class="form-group"><!-- form-group Starts -->

                <label class="col-md-3 control-label"> Product Title </label>

                <div class="col-md-6">

                  <input type="text" name="product_title" class="form-control" required value="<?php echo $p_title; ?>">

                </div>

              </div><!-- form-group Ends -->


              <div class="form-group"><!-- form-group Starts -->

                <label class="col-md-3 control-label"> Product Url </label>

                <div class="col-md-6">

                  <input type="text" name="product_url" class="form-control" required value="<?php echo $p_url; ?>">

                  <br>

                  <p style="font-size:15px; font-weight:bold;">

                    Product Url Example : navy-blue-t-shirt

                  </p>

                </div>

              </div><!-- form-group Ends -->

              <div class="form-group"><!-- form-group Starts -->

                <label class="col-md-3 control-label"> Select A Manufacturer </label>

                <div class="col-md-6">

                  <select name="manufacturer" class="form-control">

                    <option value="<?php echo $manufacturer_id; ?>">
                      <?php echo $manufacturer_title; ?>
                    </option>

                    <?php
                    //PL/SQL


                    ?>

                  </select>

                </div>

              </div><!-- form-group Ends -->

              <div class="form-group"><!-- form-group Starts -->

                <label class="col-md-3 control-label"> Product Category </label>

                <div class="col-md-6">

                  <select name="product_cat" class="form-control">

                    <option value="<?php echo $p_cat; ?>"> <?php echo $p_cat_title; ?> </option>


                    <?php
                    //PL/SQL


                    ?>


                  </select>

                </div>

              </div><!-- form-group Ends -->

              <div class="form-group"><!-- form-group Starts -->

                <label class="col-md-3 control-label"> Category </label>

                <div class="col-md-6">


                  <select name="cat" class="form-control">

                    <option value="<?php echo $cat; ?>"> <?php echo $cat_title; ?> </option>

                    <?php
                    //PL/SQL
                    ?>


                  </select>

                </div>

              </div><!-- form-group Ends -->

              <div class="form-group"><!-- form-group Starts -->

                <label class="col-md-3 control-label"> Product Image 1 </label>

                <div class="col-md-6">

                  <input type="file" name="product_img1" class="form-control">
                  <br><img src="product_images/<?php echo $p_image1; ?>" width="70" height="70">

                </div>

              </div><!-- form-group Ends -->

              <div class="form-group"><!-- form-group Starts -->

                <label class="col-md-3 control-label"> Product Image 2 </label>

                <div class="col-md-6">

                  <input type="file" name="product_img2" class="form-control">
                  <br><img src="product_images/<?php echo $p_image2; ?>" width="70" height="70">

                </div>

              </div><!-- form-group Ends -->

              <div class="form-group"><!-- form-group Starts -->

                <label class="col-md-3 control-label"> Product Image 3 </label>

                <div class="col-md-6">

                  <input type="file" name="product_img3" class="form-control">
                  <br><img src="product_images/<?php echo $p_image3; ?>" width="70" height="70">

                </div>

              </div><!-- form-group Ends -->

              <div class="form-group"><!-- form-group Starts -->

                <label class="col-md-3 control-label"> Product Price </label>

                <div class="col-md-6">

                  <input type="text" name="product_price" class="form-control" required value="<?php echo $p_price; ?>">

                </div>

              </div><!-- form-group Ends -->

              <div class="form-group"><!-- form-group Starts -->

                <label class="col-md-3 control-label"> Product Sale Price </label>

                <div class="col-md-6">

                  <input type="text" name="psp_price" class="form-control" required value="<?php echo $psp_price; ?>">

                </div>

              </div><!-- form-group Ends -->

              <div class="form-group"><!-- form-group Starts -->

                <label class="col-md-3 control-label"> Product Keywords </label>

                <div class="col-md-6">

                  <input type="text" name="product_keywords" class="form-control" required value="<?php echo $p_keywords; ?>">

                </div>

              </div><!-- form-group Ends -->

              <div class="form-group"><!-- form-group Starts -->

                <label class="col-md-3 control-label"> Product Tabs </label>

                <div class="col-md-6">

                  <ul class="nav nav-tabs"><!-- nav nav-tabs Starts -->

                    <li class="active">

                      <a data-toggle="tab" href="#description"> Product Description </a>

                    </li>

                    <li>

                      <a data-toggle="tab" href="#features"> Product Features </a>

                    </li>

                    <li>

                      <a data-toggle="tab" href="#video"> Sounds And Videos </a>

                    </li>

                  </ul><!-- nav nav-tabs Ends -->

                  <div class="tab-content"><!-- tab-content Starts -->

                    <div id="description" class="tab-pane fade in active"><!-- description tab-pane fade in active Starts -->

                      <br>

                      <textarea name="product_desc" class="form-control" rows="15" id="product_desc">

<?php echo $p_desc; ?>

</textarea>

                    </div><!-- description tab-pane fade in active Ends -->


                    <div id="features" class="tab-pane fade in"><!-- features tab-pane fade in Starts -->

                      <br>

                      <textarea name="product_features" class="form-control" rows="15" id="product_features">

<?php echo $p_features; ?>

</textarea>

                    </div><!-- features tab-pane fade in Ends -->


                    <div id="video" class="tab-pane fade in"><!-- video tab-pane fade in Starts -->

                      <br>

                      <textarea name="product_video" class="form-control" rows="15">

<?php echo $p_video; ?>

</textarea>

                    </div><!-- video tab-pane fade in Ends -->


                  </div><!-- tab-content Ends -->

                </div>

              </div><!-- form-group Ends -->

              <div class="form-group"><!-- form-group Starts -->

                <label class="col-md-3 control-label"> Product Label </label>

                <div class="col-md-6">

                  <input type="text" name="product_label" class="form-control" required value="<?php echo $p_label; ?>">

                </div>

              </div><!-- form-group Ends -->

              <div class="form-group"><!-- form-group Starts -->

                <label class="col-md-3 control-label"></label>

                <div class="col-md-6">

                  <input type="submit" name="update" value="Update Product" class="btn btn-primary form-control">

                </div>

              </div><!-- form-group Ends -->

            </form><!-- form-horizontal Ends -->

          </div><!-- panel-body Ends -->

        </div><!-- panel panel-default Ends -->

      </div><!-- col-lg-12 Ends -->

    </div><!-- 2 row Ends -->




  </body>

  </html>

  <?php
  //PL/SQL

  ?>

<?php } ?>