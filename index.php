<?php

session_start();

include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
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

      getPro();

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