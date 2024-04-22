<?php


include("includes/db.php");
$aMan  = array();

$aPCat = array();

$aCat  = array();

/// Arreglos para almacenar los datos recuperados de la base de datos
$aMan  = array();
$aPCat = array();
$aCat  = array();

// Llamadas a las funciones para recuperar los datos
getManufacturersSideBar($aMan, $db);
getProductCategoriesSideBar($aPCat, $db);
getCategoriesSideBar($aCat, $db);

oci_close($db);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manufacturers and Categories</title>
</head>

<body>

    <!-- Panel de fabricantes -->
    <div class="panel panel-default sidebar-menu">
        <div class="panel-heading">
            <h3 class="panel-title">Manufacturers</h3>
        </div>
        <div class="panel-collapse collapse-data">
            <div class="panel-body">
                <div class="input-group">
                    <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-manufacturer" placeholder="Filter Manufacturers">
                    <a class="input-group-addon"><i class="fa fa-search"></i></a>
                </div>
            </div>
            <div class="panel-body scroll-menu">
                <ul class="nav nav-pills nav-stacked category-menu" id="dev-manufacturer">
                    <?php foreach ($aMan as $id => $manufacturer) : ?>
                        <li style='background:#dddddd;' class='checkbox checkbox-primary'>
                            <a>
                                <label>
                                    <input <?= isset($aMan[$id]) ? "checked='checked'" : "" ?> type='checkbox' value='<?= $id ?>' name='manufacturer' class='get_manufacturer'>
                                    <span>
                                        <?php if (!empty($manufacturer['image'])) : ?>
                                            <img src='admin_area/other_images/<?= $manufacturer['image'] ?>' width='20px'>&nbsp;
                                        <?php endif; ?>
                                        <?= $manufacturer['title'] ?>
                                    </span>
                                </label>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    <!-- Panel de categorías de productos -->
    <div class="panel panel-default sidebar-menu">
        <div class="panel-heading">
            <h3 class="panel-title">Product Categories</h3>
        </div>
        <div class="panel-collapse collapse-data">
            <div class="panel-body">
                <div class="input-group">
                    <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-p-cats" placeholder="Filter Product Categories">
                    <a class="input-group-addon"><i class="fa fa-search"></i></a>
                </div>
            </div>
            <div class="panel-body scroll-menu">
                <ul class="nav nav-pills nav-stacked category-menu" id="dev-p-cats">
                    <?php foreach ($aPCat as $id => $product_category) : ?>
                        <li style='background:#dddddd;' class='checkbox checkbox-primary'>
                            <a>
                                <label>
                                    <input <?= isset($aPCat[$id]) ? "checked='checked'" : "" ?> type='checkbox' value='<?= $id ?>' name='p_cat' class='get_p_cat' id='p_cat'>
                                    <span>
                                        <?php if (!empty($product_category['image'])) : ?>
                                            <img src='admin_area/other_images/<?= $product_category['image'] ?>' width='20px'>&nbsp;
                                        <?php endif; ?>
                                        <?= $product_category['title'] ?>
                                    </span>
                                </label>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>

    <!-- Panel de categorías -->
    <div class="panel panel-default sidebar-menu">
        <div class="panel-heading">
            <h3 class="panel-title">Categories</h3>
        </div>
        <div class="panel-collapse collapse-data">
            <div class="panel-body">
                <div class="input-group">
                    <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-cats" placeholder="Filter Categories">
                    <a class="input-group-addon"><i class="fa fa-search"></i></a>
                </div>
            </div>
            <div class="panel-body scroll-menu">
                <ul class="nav nav-pills nav-stacked category-menu" id="dev-cats">
                    <?php foreach ($aCat as $id => $category) : ?>
                        <li style='background:#dddddd;' class='checkbox checkbox-primary'>
                            <a>
                                <label>
                                    <input <?= isset($aCat[$id]) ? "checked='checked'" : "" ?> type='checkbox' value='<?= $id ?>' name='cat' class='get_cat' id='cat'>
                                    <span>
                                        <?php if (!empty($category['image'])) : ?>
                                            <img src='admin_area/other_images/<?= $category['image'] ?>' width='20px'>&nbsp;
                                        <?php endif; ?>
                                        <?= $category['title'] ?>
                                    </span>
                                </label>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>

</body>

</html>