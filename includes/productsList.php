<?php for($i = 0; $i < $qtdProd; $i++):?>
<!-- Product Single -->
<div class="col-md-4 col-sm-6 col-xs-6 div-produto <?php echo $products[$i]["marca"]?>">
    <div class="product product-single">
        <a href="product-page.php?<?php echo 'productType='.$products[$i]["tipo"].'&productId='.$products[$i]["id"]?>">
            <div class="product-thumb">
                <div class="product-label">
                    <span>New</span>
                    <span class="sale">-20%</span>
                </div>
                <button class="main-btn quick-view"><i class="fa fa-search-plus"></i>
                    Quick
                    view</button>

                <img src="<?php echo $products[$i]["imagem"]?>" alt="">
            </div>
            <div class="product-body">
                <h3 class="product-price">$<?php echo $products[$i]["preco"]?>
                </h3>
                <div class="product-rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o empty"></i>
                </div>
                <h2 class="product-name"><a
                        href="product-page.php?<?php echo 'productType='.$products[$i]["tipo"].'&productId='.$products[$i]["id"]?>"><?php echo $products[$i]["nome"]?></a>
                </h2>
                <div class="product-btns">
                    <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                    <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                    <button class="primary-btn add-to-cart"
                        data-product="<?php echo $products[$i]["id"]?>"><i
                            class="fa fa-shopping-cart"></i> Add to
                        Cart</button>
                </div>
            </div>
        </a>
    </div>
</div>
<!-- /Product Single -->
<div class="clearfix visible-sm visible-xs"></div>
<?php endfor?>