<?php
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
?>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard / View Relations
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-money fa-fw"></i> View Relations
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Product</th>
                                    <th>Bundle</th>
                                    <th>Delete</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "CALL GetAllRelations()";
                                $stmt = $pdo->prepare($query);
                                $stmt->execute();
                                $i = 0;
                                while ($row_rel = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    $rel_id = $row_rel['rel_id'];
                                    $rel_title = $row_rel['rel_title'];
                                    $bundle_id = $row_rel['bundle_id'];
                                    $product_id = $row_rel['product_id'];

                                    $query_product = "CALL GetProductById(:product_id)";
                                    $stmt_product = $pdo->prepare($query_product);
                                    $stmt_product->bindParam(":product_id", $product_id);
                                    $stmt_product->execute();
                                    $row_product = $stmt_product->fetch(PDO::FETCH_ASSOC);
                                    $product_title = $row_product['product_title'];

                                    $query_bundle = "CALL GetProductById(:bundle_id)";
                                    $stmt_bundle = $pdo->prepare($query_bundle);
                                    $stmt_bundle->bindParam(":bundle_id", $bundle_id);
                                    $stmt_bundle->execute();
                                    $row_bundle = $stmt_bundle->fetch(PDO::FETCH_ASSOC);
                                    $bundle_title = $row_bundle['product_title'];

                                    $i++;
                                ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $rel_title; ?></td>
                                        <td><?php echo $product_title; ?></td>
                                        <td><?php echo $bundle_title; ?></td>
                                        <td>
                                            <a href="index.php?delete_rel=<?php echo $rel_id; ?>">
                                                <i class="fa fa-trash-o"></i> Delete
                                            </a>
                                        </td>
                                        <td>
                                            <a href="index.php?edit_rel=<?php echo $rel_id; ?>">
                                                <i class="fa fa-pencil"></i> Edit
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