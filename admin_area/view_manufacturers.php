<?php
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
?>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard / View Orders
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-money fa-fw"></i> View Orders
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Customer</th>
                                    <th>Invoice</th>
                                    <th>Product</th>
                                    <th>Qty</th>
                                    <th>Size</th>
                                    <th>Order Date</th>
                                    <th>Total Amount</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "CALL GetAllOrders()";
                                $stmt = $pdo->prepare($query);
                                $stmt->execute();
                                $i = 0;
                                while ($row_orders = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    $order_id = $row_orders['order_id'];
                                    $c_id = $row_orders['customer_id'];
                                    $invoice_no = $row_orders['invoice_no'];
                                    $product_id = $row_orders['product_id'];
                                    $qty = $row_orders['qty'];
                                    $size = $row_orders['size'];
                                    $order_status = $row_orders['order_status'];

                                    // Obtener información del cliente
                                    $query_customer = "CALL GetCustomerById(:c_id)";
                                    $stmt_customer = $pdo->prepare($query_customer);
                                    $stmt_customer->bindParam(":c_id", $c_id);
                                    $stmt_customer->execute();
                                    $row_customer = $stmt_customer->fetch(PDO::FETCH_ASSOC);
                                    $customer_email = $row_customer['customer_email'];

                                    // Obtener información del producto
                                    $query_product = "CALL GetProductById(:product_id)";
                                    $stmt_product = $pdo->prepare($query_product);
                                    $stmt_product->bindParam(":product_id", $product_id);
                                    $stmt_product->execute();
                                    $row_product = $stmt_product->fetch(PDO::FETCH_ASSOC);
                                    $product_title = $row_product['product_title'];

                                    // Obtener fecha y monto adeudado
                                    $query_customer_order = "CALL GetCustomerOrderByOrderId(:order_id)";
                                    $stmt_customer_order = $pdo->prepare($query_customer_order);
                                    $stmt_customer_order->bindParam(":order_id", $order_id);
                                    $stmt_customer_order->execute();
                                    $row_customer_order = $stmt_customer_order->fetch(PDO::FETCH_ASSOC);
                                    $order_date = $row_customer_order['order_date'];
                                    $due_amount = $row_customer_order['due_amount'];

                                    $i++;
                                ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $customer_email; ?></td>
                                        <td bgcolor="orange"><?php echo $invoice_no; ?></td>
                                        <td><?php echo $product_title; ?></td>
                                        <td><?php echo $qty; ?></td>
                                        <td><?php echo $size; ?></td>
                                        <td><?php echo $order_date; ?></td>
                                        <td>$<?php echo $due_amount; ?></td>
                                        <td>
                                            <?php
                                            if ($order_status == 'pending') {
                                                echo '<div style="color:red;">Pending</div>';
                                            } else {
                                                echo 'Completed';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <a href="index.php?order_delete=<?php echo $order_id; ?>">
                                                <i class="fa fa-trash-o"></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>