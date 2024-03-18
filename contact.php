<?php

session_start();

include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");

// Function to execute PL/SQL query and return results as associative array
function executePLSQLQuery($query)
{
  global $con;
  $statement = oci_parse($con, $query);
  oci_execute($statement);
  $result = array();
  while ($row = oci_fetch_array($statement, OCI_ASSOC + OCI_RETURN_NULLS)) {
    $result[] = $row;
  }
  oci_free_statement($statement);
  return $result;
}

?>

<main>
  <div class="nero">
    <div class="nero__heading">
      <span class="nero__bold">Contact</span> Us
    </div>
    <p class="nero__text">
      If you have any questions, please feel free to contact us, our customer service center is working for you 24/7.
    </p>
  </div>
</main>

<div class="col-md-12">
  <div class="box">
    <div class="box-header">
      <center>
        <p class="text-muted"></p>
      </center>
    </div>

    <form action="contact.php" method="post">
      <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" name="name" required>
      </div>

      <div class="form-group">
        <label>Email</label>
        <input type="text" class="form-control" name="email" required>
      </div>

      <div class="form-group">
        <label> Subject </label>
        <input type="text" class="form-control" name="subject" required>
      </div>

      <div class="form-group">
        <label> Message </label>
        <textarea class="form-control" name="message"> </textarea>
      </div>

      <div class="form-group">
        <label> Select Enquiry Type </label>
        <select name="enquiry_type" class="form-control">
          <option> Select Enquiry Type </option>
          <?php
          // Fetch enquiry types using PL/SQL
          $enquiryTypes = executePLSQLQuery("SELECT * FROM enquiry_types");
          foreach ($enquiryTypes as $enquiryType) {
            echo "<option value='" . $enquiryType['ENQUIRY_TYPE_ID'] . "'>" . $enquiryType['ENQUIRY_TYPE_TITLE'] . "</option>";
          }
          ?>
        </select>
      </div>

      <div class="text-center">
        <button type="submit" name="submit" class="btn btn-primary">
          <i class="fa fa-user-md"></i> Send Message
        </button>
      </div>
    </form>

    <?php
    if (isset($_POST['submit'])) {
      // Process form submission
      $sender_name = $_POST['name'];
      $sender_email = $_POST['email'];
      $sender_subject = $_POST['subject'];
      $sender_message = $_POST['message'];
      $enquiry_type = $_POST['enquiry_type'];

      // Construct PL/SQL procedure call to send email and insert enquiry
      $plsqlQuery = "BEGIN send_email_and_insert_enquiry(:sender_name, :sender_email, :sender_subject, :sender_message, :enquiry_type); END;";
      $statement = oci_parse($con, $plsqlQuery);
      oci_bind_by_name($statement, ":sender_name", $sender_name);
      oci_bind_by_name($statement, ":sender_email", $sender_email);
      oci_bind_by_name($statement, ":sender_subject", $sender_subject);
      oci_bind_by_name($statement, ":sender_message", $sender_message);
      oci_bind_by_name($statement, ":enquiry_type", $enquiry_type);
      oci_execute($statement);
      oci_free_statement($statement);

      // Display success message
      echo "<h2 align='center'>Your message has been sent successfully</h2>";
    }
    ?>
  </div>
</div>

<?php
include("includes/footer.php");
?>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>

</html>