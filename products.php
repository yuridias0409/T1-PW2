<?php
    include "codigo/ProductController.php";
    include "codigo/debug.php";
    session_start();

    $products;
    if(isset($_GET['sort'])){
        $products = getProductsSortedByPrice($_GET['sort']);
    }   else{
        $products = getAllProducts();
    }

    $qtdProd = count($products);
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <?php include "includes/head.php"?>
        <title>E-SHOP HTML Template</title>
    </head>

    <body>
        <!-- HEADER -->
        <?php include "includes/header.php"?>
        <!-- /HEADER -->

        <!-- NAVIGATION -->
        <?php include "includes/navigation.php"?>
        <!-- /NAVIGATION -->

        <!-- BREADCRUMB -->
        <?php include "includes/breadcrumb.php"?>
        <!-- /BREADCRUMB -->

        <!-- section -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- ASIDE -->
                    <div id="aside" class="col-md-3">
                        <!-- aside widget -->
                        <?php include 'includes/asideBeforeFilterByBrand.php'?>
                        <!-- /aside widget -->

                        <!-- aside widget -->
                        <div class="aside">
                            <h3 class="aside-title">Filter by Brand</h3>
                            <ul class="list-links">
                                <?php foreach (getBrandsOfProducts($products) as $key => $value):?>
                                <li><a onclick="filterByBrand('.<?php echo $value ?>')"
                                        class="li-marca"><?php echo $value ?></a></li>
                                <?php endforeach?>
                            </ul>
                        </div>
                        <!-- /aside widget -->

                        <!-- aside widget -->
                        <?php include 'includes/asideAfterFilterByBrand.php'?>
                        <!-- /aside widget -->
                    </div>
                    <!-- /ASIDE -->

                    <!-- MAIN -->
                    <div id="main" class="col-md-9">
                        <!-- store top filter -->
                        <?php include 'includes/storeTopFilter.php'?>
                        <!-- /store top filter -->

                        <!-- STORE -->
                        <div id="store">
                            <!-- row -->
                            <div class="row">
                                <!-- Products -->
                                <?php include 'includes/productsList.php' ?>
                                <!-- /Products -->
                            </div>
                            <!-- /row -->
                        </div>
                        <!-- /STORE -->

                        <!-- store bottom filter -->
                        <?php include 'includes/storeBottomFilter.php'?>
                        <!-- /store bottom filter -->
                    </div>
                    <!-- /MAIN -->
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /section -->

        <!-- FOOTER -->
        <?php include "includes/footer.php"?>
        <!-- /FOOTER -->

        <!-- jQuery Plugins -->
        <?php include "includes/footerToScript.php"?>

        <script>
        function filterByBrand(marca) {
            $('.div-produto').hide();
            $(marca).show();
        }
        $(".sort-products-by").change(function() {
            switch (this.value) {
                case "ASC":
                    window.location.href = "products.php?sort=ASC";
                    break;
                case "DESC":
                    window.location.href = "products.php?sort=DESC";
                    break;
                default:
                    window.location.href = "products.php";
                    break;
            }
        });
        </script>

    </body>

</html>