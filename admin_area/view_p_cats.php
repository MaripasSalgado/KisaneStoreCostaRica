<?php
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
?>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard / View Products Categories
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-money fa-fw"></i> View Products Categories
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Delete</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "CALL GetAllProductCategories()";
                                $stmt = $pdo->prepare($query);
                                $stmt->execute();
                                $i = 0;
                                while ($row_p_cats = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    $p_cat_id = $row_p_cats['p_cat_id'];
                                    $p_cat_title = $row_p_cats['p_cat_title'];
                                    $i++;
                                ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $p_cat_title; ?></td>
                                        <td>
                                            <a href="index.php?delete_p_cat=<?php echo $p_cat_id; ?>">
                                                <i class="fa fa-trash-o"></i> Delete
                                            </a>
                                        </td>
                                        <td>
                                            <a href="index.php?edit_p_cat=<?php echo $p_cat_id; ?>">
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