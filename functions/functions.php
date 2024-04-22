<?php

include("includes/db.php"); // Incluir archivo de conexión a Oracle
/// IP address code starts /////
function getRealUserIp()
{
  switch (true) {
    case (!empty($_SERVER['HTTP_X_REAL_IP'])):
      return $_SERVER['HTTP_X_REAL_IP'];
    case (!empty($_SERVER['HTTP_CLIENT_IP'])):
      return $_SERVER['HTTP_CLIENT_IP'];
    case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])):
      return $_SERVER['HTTP_X_FORWARDED_FOR'];
    default:
      return $_SERVER['REMOTE_ADDR'];
  }
}
/// IP address code Ends /////


// Función para obtener la cantidad de elementos en el carrito
function getCartItemCount($ip_add)
{
  global $db_conn;
  $query = "BEGIN getCartItemCount(:ip_add, :count); END;";
  $stmt = oci_parse($db_conn, $query);
  oci_bind_by_name($stmt, ":ip_add", $ip_add);
  oci_bind_by_name($stmt, ":count", $count);
  oci_execute($stmt);
  return $count;
}


// Función para obtener los elementos del carrito
function getCartItems($ip_add)
{
  global $db_conn;
  $query = "BEGIN getCartItems(:ip_add, :cart_items); END;";
  $stmt = oci_parse($db_conn, $query);
  oci_bind_by_name($stmt, ":ip_add", $ip_add);
  oci_bind_by_name($stmt, ":cart_items", $cart_items, -1, OCI_B_CURSOR);
  oci_execute($stmt);
  oci_fetch_all($cart_items, $result, null, null, OCI_FETCHSTATEMENT_BY_ROW);
  return $result;
}

// Función para obtener los detalles del producto
// Función para obtener los detalles del producto
function getProductDetails($product_id)
{
  global $db_conn;

  // Prepara el procedimiento almacenado
  $get_product = oci_parse($db_conn, "BEGIN get_product_details(:p_pro_id, :p_product_data); END;");

  // Crea un cursor para almacenar los resultados
  $product_cursor = oci_new_cursor($db_conn);

  // Enlaza los parámetros
  oci_bind_by_name($get_product, ':p_pro_id', $product_id);
  oci_bind_by_name($get_product, ':p_product_data', $product_cursor, -1, OCI_B_CURSOR);
  oci_define_by_name($product_cursor, 'PRODUCT_ID', $pro_id);
  oci_define_by_name($product_cursor, 'P_CAT_ID', $pro_cat_id);
  oci_define_by_name($product_cursor, 'CAT_ID', $cat_id);
  oci_define_by_name($product_cursor, 'MANUFACTURER_ID', $manufacturer_id);
  oci_define_by_name($product_cursor, 'PRODUCT_TITLE', $pro_title);
  oci_define_by_name($product_cursor, 'PRODUCT_URL', $pro_url);
  oci_define_by_name($product_cursor, 'PRODUCT_IMG1', $pro_img1);
  oci_define_by_name($product_cursor, 'PRODUCT_IMG2', $pro_img2);
  oci_define_by_name($product_cursor, 'PRODUCT_IMG3', $pro_img3);
  oci_define_by_name($product_cursor, 'PRODUCT_PRICE', $pro_price);
  oci_define_by_name($product_cursor, 'PRODUCT_PSP_PRICE', $pro_psp_price);
  oci_define_by_name($product_cursor, 'PRODUCT_DESC', $pro_desc);

  // Construye el array de detalles del producto
  $product_details = array(
    'PRODUCT_ID' => $pro_id,
    'P_CAT_ID' => $pro_cat_id,
    'CAT_ID' => $cat_id,
    'MANUFACTURER_ID' => $manufacturer_id,
    'PRODUCT_TITLE' => $pro_title,
    'PRODUCT_URL' => $pro_url,
    'PRODUCT_IMG1' => $pro_img1,
    'PRODUCT_IMG2' => $pro_img2,
    'PRODUCT_IMG3' => $pro_img3,
    'PRODUCT_PRICE' => $pro_price,
    'PRODUCT_PSP_PRICE' => $pro_psp_price,
    'PRODUCT_DESC' => $pro_desc
  );

  // Ejecuta el procedimiento almacenado
  oci_execute($get_product);
  // Obtiene los resultados del cursor



  return $product_details;
}



function isCustomerLoggedIn()
{
  if (isset($_SESSION['customer_email'])) {
    return true;
  } else {
    return false;
  }
}


// Función para obtener los tipos de consulta
function getEnquiryTypes()
{
  global $db_conn;
  $query = "BEGIN getEnquiryTypes(:enquiry_types); END;";
  $stmt = oci_parse($db_conn, $query);
  oci_bind_by_name($stmt, ":enquiry_types", $enquiry_types, -1, OCI_B_CURSOR);
  oci_execute($stmt);
  oci_fetch_all($enquiry_types, $result, null, null, OCI_FETCHSTATEMENT_BY_ROW);
  return $result;
}

// Función para enviar el correo electrónico de contacto
function sendContactEmail($sender_name, $sender_email, $sender_subject, $sender_message, $enquiry_type, $contact_email)
{
  $new_message = "
      <h1>This Message Has Been Sent By $sender_name</h1>
      <p><b>Sender Email:</b><br>$sender_email</p>
      <p><b>Sender Subject:</b><br>$sender_subject</p>
      <p><b>Sender Enquiry Type:</b><br>$enquiry_type</p>
      <p><b>Sender Message:</b><br>$sender_message</p>
  ";
  $headers = "From: $sender_email \r\n";
  $headers .= "Content-type: text/html\r\n";
  mail($contact_email, $sender_subject, $new_message, $headers);
}

// Función para enviar un mensaje de confirmación al remitente
function sendConfirmationEmail($email, $subject, $msg, $from)
{
  mail($email, $subject, $msg, $from);
}




// Función para verificar la existencia de un correo electrónico en la base de datos
function checkEmailExists($email)
{
  global $db_conn;
  $query = "BEGIN :result := checkEmailExists(:email); END;";
  $stmt = oci_parse($db_conn, $query);
  oci_bind_by_name($stmt, ":email", $email);
  oci_bind_by_name($stmt, ":result", $result, 1);
  oci_execute($stmt);
  return $result;
}


function registerCustomer()
{
  global $db_conn;

  $c_name = $_POST['c_name'];
  $c_email = $_POST['c_email'];
  $c_pass = $_POST['c_pass'];
  $c_country = $_POST['c_country'];
  $c_city = $_POST['c_city'];
  $c_contact = $_POST['c_contact'];
  $c_address = $_POST['c_address'];
  $c_image = $_FILES['c_image']['name'];
  $c_image_tmp = $_FILES['c_image']['tmp_name'];
  $c_ip = getRealUserIp();

  move_uploaded_file($c_image_tmp, "customer/customer_images/$c_image");

  // Llamar al procedimiento almacenado para registrar el cliente
  $customer_confirm_code = null;
  $sql = "BEGIN register_customer(:c_name, :c_email, :c_pass, :c_country, :c_city, :c_contact, :c_address, :c_image, :c_ip, :customer_confirm_code); END;";
  $stmt = oci_parse($db_conn, $sql);
  oci_bind_by_name($stmt, ":c_name", $c_name);
  oci_bind_by_name($stmt, ":c_email", $c_email);
  oci_bind_by_name($stmt, ":c_pass", $c_pass);
  oci_bind_by_name($stmt, ":c_country", $c_country);
  oci_bind_by_name($stmt, ":c_city", $c_city);
  oci_bind_by_name($stmt, ":c_contact", $c_contact);
  oci_bind_by_name($stmt, ":c_address", $c_address);
  oci_bind_by_name($stmt, ":c_image", $c_image);
  oci_bind_by_name($stmt, ":c_ip", $c_ip);
  oci_bind_by_name($stmt, ":customer_confirm_code", $customer_confirm_code, 255);
  oci_execute($stmt);
  oci_free_statement($stmt);

  if ($customer_confirm_code) {
    $_SESSION['customer_email'] = $c_email;
    echo "<script>alert('You have been Registered Successfully')</script>";
    echo "<script>window.open('checkout.php','_self')</script>";
  } else {
    echo "<script>alert('This email is already registered, try another one')</script>";
  }
}

// Función para obtener el título de la categoría de productos
function getCategoryTitle($p_cat_id, $db_conn)
{
  global $db_conn;
  $get_p_cat = oci_parse($db_conn, "BEGIN get_category_title(:p_cat_id, :p_cat_title); END;");
  oci_bind_by_name($get_p_cat, ':p_cat_id', $p_cat_id);
  oci_bind_by_name($get_p_cat, ':p_cat_title', $p_cat_title, 255);
  oci_execute($get_p_cat);

  oci_free_statement($get_p_cat);

  return $p_cat_title;
}
// Función para agregar productos al carrito
function addToCart($p_id, $ip_add, $product_qty, $product_size, $db_conn)
{
  global $db_conn;
  $add_to_cart_query = "BEGIN add_to_cart(:p_id, :p_ip_add, :product_qty, :product_size); END;";
  $stmt = oci_parse($db_conn, $add_to_cart_query);
  oci_bind_by_name($stmt, ':p_id', $p_id);
  oci_bind_by_name($stmt, ':p_ip_add', $ip_add);
  oci_bind_by_name($stmt, ':product_qty', $product_qty);
  oci_bind_by_name($stmt, ':product_size', $product_size);
  oci_execute($stmt);
  oci_free_statement($stmt);
}

function getCustomerPassword($email, $db_conn)
{
  global $db_conn;
  $sql = "BEGIN
              :result := get_customer_password_fn(:c_email);
          END;";
  $stmt = oci_parse($db_conn, $sql);
  oci_bind_by_name($stmt, ':c_email', $email);
  oci_bind_by_name($stmt, ':result', $password, 255);
  oci_execute($stmt);

  return $password;
}


function getPro()
{
  global $db_conn;
  $get_products = "SELECT * FROM products"; // Consulta para obtener los productos

  $stmt = oci_parse($db_conn, $get_products); // Preparar la consulta
  oci_execute($stmt); // Ejecutar la consulta

  while ($row_products = oci_fetch_assoc($stmt)) {
    $pro_id = $row_products['PRODUCT_ID'];
    $pro_title = $row_products['PRODUCT_TITLE'];
    $pro_price = $row_products['PRODUCT_PRICE'];
    $pro_img1 = $row_products['PRODUCT_IMG1'];
    $pro_label = $row_products['PRODUCT_LABEL'];

    $pro_psp_price = $row_products['PRODUCT_PSP_PRICE'];
    $pro_url = $row_products['PRODUCT_URL'];

    if ($pro_label == "Sale" or $pro_label == "Gift") {
      $product_price = "<del>$ $pro_price </del>";
      $product_psp_price = "|$ $pro_psp_price";
    } else {
      $product_psp_price = "";
      $product_price = "$ $pro_price";
    }

    if ($pro_label == "") {
      $product_label = "";
    } else {
      $product_label = "
        <a class='label sale' href='#' style='color:black;'>
          <div class='thelabel'>$pro_label</div>
          <div class='label-background'></div>
        </a>
      ";
    }

    echo "
    <div class='col-md-4 col-sm-6 single'>
      <div class='product'>
        <a href='$pro_url'>
          <img src='product_images/$pro_img1' class='img-responsive'>
        </a>
        <div class='text'>
          <center>
            <p class='btn btn-warning'> </p>
          </center>
          <hr>
          <h3><a href='$pro_url'>$pro_title</a></h3>
          <p class='price'>$pro_price $pro_psp_price</p>
          <p class='buttons'>
            <a href='details.php?pro_id=$pro_id' class='btn btn-default'>View Details</a>
            <a href='$pro_url' class='btn btn-danger'>
              <i class='fa fa-shopping-cart'></i> Add To Cart
            </a>
          </p>
        </div>
        $product_label
      </div>
    </div>
    ";
  }
}

// Función para obtener el paginador
function getPaginator()
{
  // Verifica si 'page' está definido en $_GET
  $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
  $totalPages = 10; // Deberías obtener esto dinámicamente desde la base de datos

  // Construir el HTML del paginador
  $paginatorHTML = '<ul class="pagination">';
  for ($i = 1; $i <= $totalPages; $i++) {
    $paginatorHTML .= '<li class="page-item ' . ($currentPage == $i ? "active" : "") . '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
  }
  $paginatorHTML .= '</ul>';

  // Devolver el HTML del paginador
  echo $paginatorHTML;
}


function getServices()
{
  global $db_conn;

  // Inicializar el arreglo para almacenar los servicios
  $services = array();

  // Llamar al procedimiento almacenado PL/SQL para obtener los servicios
  $stmt = oci_parse($db_conn, 'BEGIN get_services(:p_cursor); END;');
  oci_bind_by_name($stmt, ':p_cursor', $cursor, -1, OCI_B_CURSOR);
  oci_execute($stmt);

  // Recorrer el cursor y almacenar los servicios en el arreglo
  while ($row = oci_fetch_assoc($cursor)) {
    $services[] = $row;
  }

  // Liberar los recursos
  oci_free_statement($stmt);

  // Devolver los servicios
  return $services;
}

// Función para obtener los elementos del carrito del cliente
function get_cart_items($db_conn, $ip_add)
{
  global $db_conn;
  $stmt = oci_parse($db_conn, "BEGIN GET_CART_ITEMS(:ip_add, :cart_items); END;");
  oci_bind_by_name($stmt, ":ip_add", $ip_add);
  oci_bind_by_name($stmt, ":cart_items", $cart_items, -1, OCI_B_CURSOR);
  oci_execute($stmt);
  oci_fetch_all($cart_items, $result, null, null, OCI_FETCHSTATEMENT_BY_ROW);
  oci_free_statement($stmt);
  return $result;
}



// Función para insertar un nuevo pedido del cliente
function insert_customer_order($db_conn, $customer_id, $sub_total, $invoice_no, $pro_qty, $pro_size, $status)
{
  global $db_conn;
  $stmt = oci_parse($db_conn, "BEGIN INSERT_CUSTOMER_ORDER(:customer_id, :sub_total, :invoice_no, :pro_qty, :pro_size, :status); END;");
  oci_bind_by_name($stmt, ":customer_id", $customer_id);
  oci_bind_by_name($stmt, ":sub_total", $sub_total);
  oci_bind_by_name($stmt, ":invoice_no", $invoice_no);
  oci_bind_by_name($stmt, ":pro_qty", $pro_qty);
  oci_bind_by_name($stmt, ":pro_size", $pro_size);
  oci_bind_by_name($stmt, ":status", $status);
  oci_execute($stmt);
  oci_free_statement($stmt);
}

// Función para insertar un nuevo pedido pendiente
function insert_pending_order($db_conn, $customer_id, $invoice_no, $pro_id, $pro_qty, $pro_size, $status)
{
  global $db_conn;
  $stmt = oci_parse($db_conn, "BEGIN INSERT_PENDING_ORDER(:customer_id, :invoice_no, :pro_id, :pro_qty, :pro_size, :status); END;");
  oci_bind_by_name($stmt, ":customer_id", $customer_id);
  oci_bind_by_name($stmt, ":invoice_no", $invoice_no);
  oci_bind_by_name($stmt, ":pro_id", $pro_id);
  oci_bind_by_name($stmt, ":pro_qty", $pro_qty);
  oci_bind_by_name($stmt, ":pro_size", $pro_size);
  oci_bind_by_name($stmt, ":status", $status);
  oci_execute($stmt);
  oci_free_statement($stmt);
}

// Función para eliminar elementos del carrito
function delete_cart_items($db_conn, $ip_add)
{
  global $db_conn;
  $stmt = oci_parse($db_conn, "BEGIN DELETE_CART_ITEMS(:ip_add); END;");
  oci_bind_by_name($stmt, ":ip_add", $ip_add);
  oci_execute($stmt);
  oci_free_statement($stmt);
}

// Función para obtener los datos del cliente
function get_customer_data($db_conn, $session_email)
{
  global $db_conn;
  $stmt = oci_parse($db_conn, "BEGIN GET_CUSTOMER_DATA(:session_email, :customer_data); END;");
  oci_bind_by_name($stmt, ":session_email", $session_email);
  oci_bind_by_name($stmt, ":customer_data", $customer_data, -1, OCI_B_CURSOR);
  oci_execute($stmt);
  oci_fetch($customer_data);
  oci_free_statement($stmt);
  return $customer_data;
}

// Función para obtener los elementos del carrito del cliente

// Función para obtener los detalles del producto
function get_product_details($db_conn, $pro_id)
{
  global $db_conn;
  $stmt = oci_parse($db_conn, "BEGIN GET_PRODUCT_DETAILS(:pro_id, :product_data); END;");
  oci_bind_by_name($stmt, ":pro_id", $pro_id);
  oci_bind_by_name($stmt, ":product_data", $product_data, -1, OCI_B_CURSOR);
  oci_execute($stmt);
  oci_fetch($product_data);
  oci_free_statement($stmt);
  return $product_data;
}


// Función para obtener el ID del cliente de la sesión
function get_customer_id_from_session()
{
  // Lógica para obtener el ID del cliente de la sesión
  if (isset($_SESSION['customer_email'])) {
    $session_email = $_SESSION['customer_email'];
    // Llamada al procedimiento almacenado para obtener el ID del cliente según su correo electrónico
    return get_customer_id_from_email($session_email);
  } else {
    // Si el correo electrónico del cliente no está en la sesión, se puede manejar de alguna manera apropiada
    return null;
  }
}
// Función para obtener el ID del cliente según su correo electrónico
function get_customer_id_from_email($email)
{
  // Realiza cualquier verificación necesaria del correo electrónico antes de llamar al procedimiento almacenado
  // Llama al procedimiento almacenado para obtener el ID del cliente según su correo electrónico
  $stmt = oci_parse($db_conn, "BEGIN :customer_id := get_customer_id_from_email(:email); END;");
  oci_bind_by_name($stmt, ":email", $email);
  oci_bind_by_name($stmt, ":customer_id", $customer_id);
  oci_execute($stmt);
  oci_free_statement($stmt);
  return $customer_id;
}



// Función para obtener los términos
function getTerms()
{
  global $db_conn;
  $stmt = oci_parse($db_conn, 'BEGIN get_terms(:term_title, :term_desc, :term_link); END;');
  oci_bind_by_name($stmt, ':term_title', $term_title, 255);
  oci_bind_by_name($stmt, ':term_desc', $term_desc, 255);
  oci_bind_by_name($stmt, ':term_link', $term_link, 255);
  oci_execute($stmt);
}

function get_manufacturer()
{
  global $db_conn;
  $manufacturers = array();
  $manufacturers_stmt = oci_parse($db_conn, 'BEGIN get_manufacturers(:manufacturer_id, :manufacturer_title, :manufacturer_image); END;');
  oci_bind_array_by_name($manufacturers_stmt, ':manufacturer_id', $manufacturer_ids, 100, -1, SQLT_INT);
  oci_bind_array_by_name($manufacturers_stmt, ':manufacturer_title', $manufacturer_titles, 100, -1, SQLT_CHR);
  oci_bind_array_by_name($manufacturers_stmt, ':manufacturer_image', $manufacturer_images, 100, -1, SQLT_CHR);
  oci_execute($manufacturers_stmt, OCI_DEFAULT);
  oci_fetch_all($manufacturers_stmt, $manufacturers, 0, -1, OCI_FETCHSTATEMENT_BY_ROW + OCI_ASSOC);
}

// Function to retrieve manufacturers
function getManufacturersSideBar(&$aMan, &$db_conn)
{
  $statement = oci_parse($conn, "BEGIN
                                  FOR man_rec IN (SELECT manufacturer_id, manufacturer_title, manufacturer_image FROM manufacturers WHERE manufacturer_top = 'yes') LOOP
                                      :manufacturer_id := man_rec.manufacturer_id;
                                      :manufacturer_title := man_rec.manufacturer_title;
                                      :manufacturer_image := man_rec.manufacturer_image;
                                      IF :manufacturer_image IS NOT NULL THEN
                                          NULL; -- Process the manufacturer image
                                      END IF;
                                      :manufacturer_id_index := 1;
                                  END LOOP;
                              END;");
  oci_bind_array_by_name($statement, ":manufacturer_id", $manufacturer_id, 1, -1, SQLT_INT);
  oci_bind_array_by_name($statement, ":manufacturer_title", $manufacturer_title, 256, -1, SQLT_CHR);
  oci_bind_array_by_name($statement, ":manufacturer_image", $manufacturer_image, 256, -1, SQLT_CHR);
  oci_bind_array_by_name($statement, ":manufacturer_id_index", $manufacturer_id_index, 1, -1, SQLT_INT);
  oci_execute($statement, OCI_DEFAULT);
  oci_free_statement($statement);

  // Populate the array with retrieved data
  foreach ($manufacturer_id as $key => $id) {
    $aMan[$id] = array(
      'title' => $manufacturer_title[$key],
      'image' => $manufacturer_image[$key]
    );
  }
}

// Function to retrieve product categories
function getProductCategoriesSideBar(&$aPCat, &$db_conn)
{
  $statement = oci_parse($conn, "BEGIN
                                  FOR p_cat_rec IN (SELECT p_cat_id, p_cat_title, p_cat_image FROM product_categories WHERE p_cat_top = 'yes') LOOP
                                      :p_cat_id := p_cat_rec.p_cat_id;
                                      :p_cat_title := p_cat_rec.p_cat_title;
                                      :p_cat_image := p_cat_rec.p_cat_image;
                                      IF :p_cat_image IS NOT NULL THEN
                                          NULL; -- Process the product category image
                                      END IF;
                                      :p_cat_id_index := 1;
                                  END LOOP;
                              END;");
  oci_bind_array_by_name($statement, ":p_cat_id", $p_cat_id, 1, -1, SQLT_INT);
  oci_bind_array_by_name($statement, ":p_cat_title", $p_cat_title, 256, -1, SQLT_CHR);
  oci_bind_array_by_name($statement, ":p_cat_image", $p_cat_image, 256, -1, SQLT_CHR);
  oci_bind_array_by_name($statement, ":p_cat_id_index", $p_cat_id_index, 1, -1, SQLT_INT);
  oci_execute($statement, OCI_DEFAULT);
  oci_free_statement($statement);

  // Populate the array with retrieved data
  foreach ($p_cat_id as $key => $id) {
    $aPCat[$id] = array(
      'title' => $p_cat_title[$key],
      'image' => $p_cat_image[$key]
    );
  }
}

// Function to retrieve categories
function getCategoriesSideBar(&$aCat, &$db_conn)
{
  $statement = oci_parse($conn, "BEGIN
                                  FOR cat_rec IN (SELECT cat_id, cat_title, cat_image FROM categories WHERE cat_top = 'yes') LOOP
                                      :cat_id := cat_rec.cat_id;
                                      :cat_title := cat_rec.cat_title;
                                      :cat_image := cat_rec.cat_image;
                                      IF :cat_image IS NOT NULL THEN
                                          NULL; -- Process the category image
                                      END IF;
                                      :cat_id_index := 1;
                                  END LOOP;
                              END;");
  oci_bind_array_by_name($statement, ":cat_id", $cat_id, 1, -1, SQLT_INT);
  oci_bind_array_by_name($statement, ":cat_title", $cat_title, 256, -1, SQLT_CHR);
  oci_bind_array_by_name($statement, ":cat_image", $cat_image, 256, -1, SQLT_CHR);
  oci_bind_array_by_name($statement, ":cat_id_index", $cat_id_index, 1, -1, SQLT_INT);
  oci_execute($statement, OCI_DEFAULT);
  oci_free_statement($statement);

  // Populate the array with retrieved data
  foreach ($cat_id as $key => $id) {
    $aCat[$id] = array(
      'title' => $cat_title[$key],
      'image' => $cat_image[$key]
    );
  }
}
