<?php
$aMan  = array();
$aPCat = array();
$aCat  = array();

/// Manufacturers Code Starts ///

if (isset($_REQUEST['man']) && is_array($_REQUEST['man'])) {
    foreach ($_REQUEST['man'] as $sKey => $sVal) {
        if ((int)$sVal != 0) {
            $aMan[(int)$sVal] = (int)$sVal;
        }
    }
}

/// Products Categories Code Starts ///

if (isset($_REQUEST['p_cat']) && is_array($_REQUEST['p_cat'])) {
    foreach ($_REQUEST['p_cat'] as $sKey => $sVal) {
        if ((int)$sVal != 0) {
            $aPCat[(int)$sVal] = (int)$sVal;
        }
    }
}

/// Categories Code Starts ///

if (isset($_REQUEST['cat']) && is_array($_REQUEST['cat'])) {
    foreach ($_REQUEST['cat'] as $sKey => $sVal) {
        if ((int)$sVal != 0) {
            $aCat[(int)$sVal] = (int)$sVal;
        }
    }
}

?>

<div class="panel panel-default sidebar-menu"><!-- panel panel-default sidebar-menu Starts -->

    <div class="panel-heading"><!-- panel-heading Starts -->

        <h3 class="panel-title"><!-- panel-title Starts -->

            Manufacturers

            <div class="pull-right"><!-- pull-right Starts -->

                <a href="#" style="color:black;">

                    <span class="nav-toggle hide-show">

                        Hide

                    </span>

                </a>

            </div><!-- pull-right Ends -->

        </h3><!-- panel-title Ends -->

    </div><!-- panel-heading Ends -->

    <div class="panel-collapse collapse-data"><!-- panel-collapse collapse-data starts -->

        <div class="panel-body"><!-- panel-body Starts -->

            <div class="input-group"><!-- input-group Starts -->

                <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-manufacturer" placeholder="Filter Manufacturers">


                <a class="input-group-addon"> <i class="fa fa-search"></i> </a>

            </div><!-- input-group Ends -->

        </div><!-- panel-body Ends -->

        <div class="panel-body scroll-menu"><!-- panel-body scroll-menu Starts -->

            <ul class="nav nav-pills nav-stacked category-menu" id="dev-manufacturer"><!-- nav nav-pills nav-stacked category-menu Starts -->

                <?php

                // Obtener fabricantes
                $get_manufacturers_query = "BEGIN :cursor := get_manufacturers(); END;";
                $manufacturers = array();
                $stmt = oci_parse($con, $get_manufacturers_query);
                oci_bind_by_name($stmt, ":cursor", $manufacturers, -1, OCI_B_CURSOR);
                oci_execute($stmt);

                while (($row = oci_fetch_array($manufacturers, OCI_ASSOC + OCI_RETURN_NULLS)) != false) {
                    $manufacturer_id = $row['MANUFACTURER_ID'];
                    $manufacturer_title = $row['MANUFACTURER_TITLE'];
                    $manufacturer_image = $row['MANUFACTURER_IMAGE'];

                    if ($manufacturer_image == "") {
                        $manufacturer_image_tag = "";
                    } else {
                        $manufacturer_image_tag = "<img src='admin_area/other_images/$manufacturer_image' width='20px' >&nbsp;";
                    }

                    echo "
    <li style='background:#dddddd;' class='checkbox checkbox-primary'>
        <a>
            <label>
                <input ";
                    if (isset($aMan[$manufacturer_id])) {
                        echo "checked='checked'";
                    }
                    echo " type='checkbox' value='$manufacturer_id' name='manufacturer' class='get_manufacturer'>
                <span>
                    $manufacturer_image_tag
                    $manufacturer_title
                </span>
            </label>
        </a>
    </li>
    ";
                }

                ?>

            </ul><!-- nav nav-pills nav-stacked category-menu Ends -->

        </div><!-- panel-body scroll-menu Ends -->

    </div><!-- panel-collapse collapse-data Ends -->


</div><!-- panel panel-default sidebar-menu Ends -->
<div class="panel panel-default sidebar-menu"><!--- panel panel-default sidebar-menu Starts -->

    <div class="panel-heading"><!-- panel-heading Starts -->

        <h3 class="panel-title"><!-- panel-title Starts -->

            Products Categories

            <div class="pull-right"><!-- pull-right Starts -->

                <a href="#" style="color:black;">

                    <span class="nav-toggle hide-show">

                        Hide

                    </span>

                </a>

            </div><!-- pull-right Ends -->

        </h3><!-- panel-title Ends -->

    </div><!-- panel-heading Ends -->

    <div class="panel-collapse collapse-data"><!-- panel-collapse collapse-data Starts -->

        <div class="panel-body"><!-- panel-body Starts -->

            <div class="input-group"><!-- input-group Starts -->

                <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-p-cats" placeholder="Filter Product Categories">

                <a class="input-group-addon"> <i class="fa fa-search"></i> </a>

            </div><!-- input-group Ends -->

        </div><!-- panel-body Ends -->

        <div class="panel-body scroll-menu"><!-- panel-body scroll-menu Starts -->

            <ul class="nav nav-pills nav-stacked category-menu" id="dev-p-cats"><!-- nav nav-pills nav-stacked category-menu Starts -->

                <?php

                // Obtener categorías de productos
                $get_product_categories_query = "BEGIN :cursor := get_product_categories(); END;";
                $product_categories = array();
                $stmt = oci_parse($con, $get_product_categories_query);
                oci_bind_by_name($stmt, ":cursor", $product_categories, -1, OCI_B_CURSOR);
                oci_execute($stmt);

                while (($row = oci_fetch_array($product_categories, OCI_ASSOC + OCI_RETURN_NULLS)) != false) {
                    $p_cat_id = $row['P_CAT_ID'];
                    $p_cat_title = $row['P_CAT_TITLE'];
                    $p_cat_image = $row['P_CAT_IMAGE'];

                    if ($p_cat_image == "") {
                        $p_cat_image_tag = "";
                    } else {
                        $p_cat_image_tag = "<img src='admin_area/other_images/$p_cat_image' width='20'> &nbsp;";
                    }

                    echo "
    <li class='checkbox checkbox-primary' style='background:#dddddd;' >
        <a>
            <label>
                <input ";
                    if (isset($aPCat[$p_cat_id])) {
                        echo "checked='checked'";
                    }
                    echo " type='checkbox' value='$p_cat_id' name='p_cat' class='get_p_cat' id='p_cat' >
                <span>
                    $p_cat_image_tag
                    $p_cat_title
                </span>
            </label>
        </a>
    </li>
    ";
                }

                ?>

            </ul><!-- nav nav-pills nav-stacked category-menu Ends -->

        </div><!-- panel-body scroll-menu Ends -->

    </div><!-- panel-collapse collapse-data Ends -->

</div><!--- panel panel-default sidebar-menu Ends -->


<div class="panel panel-default sidebar-menu"><!--- panel panel-default sidebar-menu Starts -->

    <div class="panel-heading"><!-- panel-heading Starts -->

        <h3 class="panel-title"><!-- panel-title Starts -->

            Categories

            <div class="pull-right"><!-- pull-right Starts -->

                <a href="#" style="color:black;">

                    <span class="nav-toggle hide-show">

                        Hide

                    </span>

                </a>

            </div><!-- pull-right Ends -->


        </h3><!-- panel-title Ends -->

    </div><!-- panel-heading Ends -->

    <div class="panel-collapse collapse-data"><!-- panel-collapse collapse-data Starts -->

        <div class="panel-body"><!-- panel-body Starts -->

            <div class="input-group"><!-- input-group Starts -->

                <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-cats" placeholder="Filter Categories">

                <a class="input-group-addon"> <i class="fa fa-search"> </i> </a>

            </div><!-- input-group Ends -->

        </div><!-- panel-body Ends -->

        <div class="panel-body scroll-menu"><!-- panel-body scroll-menu Starts -->

            <ul class="nav nav-pills nav-stacked category-menu" id="dev-cats"><!-- nav nav-pills nav-stacked category-menu Starts -->

                <?php

                // Obtener categorías
                $get_categories_query = "BEGIN :cursor := get_categories(); END;";
                $categories = array();
                $stmt = oci_parse($con, $get_categories_query);
                oci_bind_by_name($stmt, ":cursor", $categories, -1, OCI_B_CURSOR);
                oci_execute($stmt);

                while (($row = oci_fetch_array($categories, OCI_ASSOC + OCI_RETURN_NULLS)) != false) {
                    $cat_id = $row['CAT_ID'];
                    $cat_title = $row['CAT_TITLE'];
                    $cat_image = $row['CAT_IMAGE'];

                    if ($cat_image == "") {
                        $cat_image_tag = "";
                    } else {
                        $cat_image_tag = "<img src='admin_area/other_images/$cat_image' width='20'>&nbsp;";
                    }

                    echo "
    <li class='checkbox checkbox-primary' style='background:#dddddd;'>
        <a>
            <label>
                <input ";
                    if (isset($aCat[$cat_id])) {
                        echo "checked='checked'";
                    }
                    echo " type='checkbox' value='$cat_id' name='cat' class='get_cat' id='cat'> 
                <span>
                    $cat_image_tag
                    $cat_title
                </span>
            </label>
        </a>
    </li>
    ";
                }

                ?>

            </ul><!-- nav nav-pills nav-stacked category-menu Ends -->

        </div><!-- panel-body scroll-menu Ends -->

    </div><!-- panel-collapse collapse-data Ends -->

</div><!--- panel panel-default sidebar-menu Ends -->