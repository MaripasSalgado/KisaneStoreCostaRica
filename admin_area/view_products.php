<?php
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
?>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard / View Products
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-money fa-fw"></i> View Products
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Sold</th>
                                    <th>Keywords</th>
                                    <th>Date</th>
                                    <th>Delete</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "CALL GetProductsWithStatus()";
                                $stmt = $pdo->prepare($query);
                                $stmt->execute();
                                $i = 0;
                                while ($row_pro = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    $pro_id = $row_pro['product_id'];
                                    $pro_title = $row_pro['product_title'];
                                    $pro_image = $row_pro['product_img1'];
                                    $pro_price = $row_pro['product_price'];
                                    $pro_keywords = $row_pro['product_keywords'];
                                    $pro_date = $row_pro['date'];
                                    $i++;
                                ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $pro_title; ?></td>
                                        <td><img src="product_images/<?php echo $pro_image; ?>" width="60" height="60"></td>
                                        <td>$ <?php echo $pro_price; ?></td>
                                        <td>
                                            <?php
                                            $query_sold = "CALL GetProductSoldCount(:pro_id)";
                                            $stmt_sold = $pdo->prepare($query_sold);
                                            $stmt_sold->bindParam(":pro_id", $pro_id, PDO::PARAM_INT);
                                            $stmt_sold->execute();
                                            $count = $stmt_sold->fetchColumn();
                                            echo $count;
                                            ?>
                                        </td>
                                        <td><?php echo $pro_keywords; ?></td>
                                        <td><?php echo $pro_date; ?></td>
                                        <td>
                                            <a href="index.php?delete_product=<?php echo $pro_id; ?>">
                                                <i class="fa fa-trash-o"></i> Delete
                                            </a>
                                        </td>
                                        <td>
                                            <a href="index.php?edit_product=<?php echo $pro_id; ?>">
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