<?php

session_start();

if (!isset($_SESSION['customer_email'])) {
  echo "<script>window.open('../checkout.php','_self')</script>";
} else {
  include("includes/db.php");
  include("../includes/header.php");
  include("functions/functions.php");
  include("includes/main.php");

  $c_email = $_SESSION['customer_email'];

  // Conexión a la base de datos Oracle
  // Datos de conexión
  $user = 'HR';
  $pass = '123456';
  $host = 'localhost';
  $port = '1521';
  $sid = 'orcl';

  // Construye la cadena de conexión
  $tns = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = $host)(PORT = $port)))(CONNECT_DATA=(SID=$sid)))";
  $db_conn = oci_connect($user, $pass, $tns);

  // Verifica si la conexión fue exitosa
  if (!$db_conn) {
    $error = oci_error();
    echo "Error de conexión: " . $error['message'];
  } else {
    echo "Conexión exitosa a la base de datos Oracle.";
  }
  $stmt = oci_parse($con, 'BEGIN get_customer_details(:p_email, :p_customer_id, :p_customer_name, :p_customer_country, :p_customer_city, :p_customer_contact, :p_customer_address, :p_customer_image); END;');
  oci_bind_by_name($stmt, ':p_email', $c_email);
  oci_bind_by_name($stmt, ':p_customer_id', $customer_id, 255);
  oci_bind_by_name($stmt, ':p_customer_name', $customer_name, 255);
  oci_bind_by_name($stmt, ':p_customer_country', $customer_country, 255);
  oci_bind_by_name($stmt, ':p_customer_city', $customer_city, 255);
  oci_bind_by_name($stmt, ':p_customer_contact', $customer_contact, 255);
  oci_bind_by_name($stmt, ':p_customer_address', $customer_address, 255);
  oci_bind_by_name($stmt, ':p_customer_image', $customer_image, 255);
  oci_execute($stmt);

  oci_close($con);
?>

  <main>
    <div class="nero">
      <div class="nero__heading">
        <span class="nero__bold">My </span>Account
      </div>
      <p class="nero__text"></p>
    </div>
  </main>

  <div id="content">
    <div class="container">

      <div class="col-md-12">
        <?php
        $c_email = $_SESSION['customer_email'];

        $get_customer = "BEGIN :result := get_customer(:p_email); END;";
        $stmt = oci_parse($con, $get_customer);
        oci_bind_by_name($stmt, ':p_email', $c_email);
        oci_bind_by_name($stmt, ':result', $customer_info, 4000);
        oci_execute($stmt);
        $row_customer = oci_fetch_array($stmt, OCI_ASSOC);
        $customer_confirm_code = $row_customer['CUSTOMER_CONFIRM_CODE'];
        $c_name = $row_customer['CUSTOMER_NAME'];
        ?>
      </div>

      <div class="col-md-3">
        <?php include("includes/sidebar.php"); ?>
      </div>

      <div class="col-md-9">
        <div class="box">
          <?php
          if (isset($_GET[$customer_confirm_code])) {
            $update_customer = "BEGIN update_customer_confirm_code(:p_customer_confirm_code); END;";
            $stmt = oci_parse($con, $update_customer);
            oci_bind_by_name($stmt, ':p_customer_confirm_code', $customer_confirm_code);
            oci_execute($stmt);

            echo "<script>window.open('my_account.php?my_orders','_self')</script>";
          }

          if (isset($_GET['my_orders'])) {
            include("my_orders.php");
          }

          if (isset($_GET['pay_offline'])) {
            include("pay_offline.php");
          }

          if (isset($_GET['edit_account'])) {
            include("edit_account.php");
          }

          if (isset($_GET['change_pass'])) {
            include("change_pass.php");
          }

          if (isset($_GET['delete_account'])) {
            include("delete_account.php");
          }

          if (isset($_GET['my_wishlist'])) {
            include("my_wishlist.php");
          }

          if (isset($_GET['delete_wishlist'])) {
            include("delete_wishlist.php");
          }
          ?>
        </div>
      </div>

    </div>
  </div>

  <?php include("../includes/footer.php"); ?>

  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  </body>

  </html>
<?php } ?>