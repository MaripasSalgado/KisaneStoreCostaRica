<?php

session_start();

// Incluir archivo de conexión a la base de datos
include("includes/db.php");

// Establecer la conexión con la base de datos Oracle
global $con;

if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

// Obtener el número de página
$page_number = isset($_GET['page']) ? intval($_GET['page']) : 1;
$per_page = 6;

// Obtener los parámetros de filtrado
$manufacturer_id = isset($_GET['manufacturer']) ? intval($_GET['manufacturer']) : null;
$category_id = isset($_GET['category']) ? intval($_GET['category']) : null;

// Llamar al procedimiento almacenado para obtener el total de productos
$sql_count = "BEGIN
                Get_Total_Products(:p_manufacturer_id, :p_category_id, :p_total);
              END;";
$statement_count = oci_parse($conn, $sql_count);
oci_bind_by_name($statement_count, ":p_manufacturer_id", $manufacturer_id);
oci_bind_by_name($statement_count, ":p_category_id", $category_id);
oci_bind_by_name($statement_count, ":p_total", $total_records, 32);
oci_execute($statement_count);

// Calcular el total de páginas
$total_pages = ceil($total_records / $per_page);

// Llamar al procedimiento almacenado para obtener los productos de la página actual
$sql_products = "BEGIN
                    Get_Products(:p_page_number, :p_per_page, :p_manufacturer_id, :p_category_id, :p_cursor);
                 END;";
$statement_products = oci_parse($conn, $sql_products);
oci_bind_by_name($statement_products, ":p_page_number", $page_number);
oci_bind_by_name($statement_products, ":p_per_page", $per_page);
oci_bind_by_name($statement_products, ":p_manufacturer_id", $manufacturer_id);
oci_bind_by_name($statement_products, ":p_category_id", $category_id);
oci_bind_by_name($statement_products, ":p_cursor", $cursor, -1, OCI_B_CURSOR);
oci_execute($statement_products);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <link rel="stylesheet" href="css/style.css"> <!-- Replace with your CSS file path -->
</head>

<body>

    <div class="container">
        <h2>Products</h2>
        <div class="products">
            <?php
            while (($row = oci_fetch_assoc($cursor)) !== false) {
                // Mostrar los detalles del producto
            ?>
                <div class="product">
                    <img src="<?php echo $row['PRODUCT_IMAGE']; ?>" alt="Product Image">
                    <h3><?php echo $row['PRODUCT_NAME']; ?></h3>
                    <p><?php echo $row['PRODUCT_DESCRIPTION']; ?></p>
                    <p>Price: $<?php echo $row['PRODUCT_PRICE']; ?></p>
                </div>
            <?php
            }
            ?>
        </div>

        <!-- Pagination Links -->
        <div class="pagination">
            <?php if ($page_number > 1) : ?>
                <a href="?page=<?php echo $page_number - 1; ?>">Previous</a>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
            <?php endfor; ?>

            <?php if ($page_number < $total_pages) : ?>
                <a href="?page=<?php echo $page_number + 1; ?>">Next</a>
            <?php endif; ?>
        </div>
    </div>

</body>

</html>

<?php
// Cerrar la conexión con la base de datos Oracle
oci_close($conn);
?>