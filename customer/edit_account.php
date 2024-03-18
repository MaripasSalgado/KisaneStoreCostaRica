<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer Account</title>
</head>

<body>
    <h1>Edit Your Account</h1>
    <form action="update_customer.php" method="post" enctype="multipart/form-data">
        <!-- Agrega un campo oculto para enviar el customer_id -->
        <input type="hidden" name="customer_id" value="<?php echo $customer_id; ?>">
        <label>Customer Name:</label>
        <input type="text" name="c_name" required><br><br>
        <label>Customer Email:</label>
        <input type="email" name="c_email" required><br><br>
        <label>Customer Country:</label>
        <input type="text" name="c_country" required><br><br>
        <label>Customer City:</label>
        <input type="text" name="c_city" required><br><br>
        <label>Customer Contact:</label>
        <input type="text" name="c_contact" required><br><br>
        <label>Customer Address:</label>
        <input type="text" name="c_address" required><br><br>
        <label>Customer Image:</label>
        <input type="file" name="c_image" required><br><br>
        <input type="submit" name="update" value="Update">
    </form>
</body>

</html>