<li class="header-cart dropdown default-dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
        <div class="header-btns-icon">
            <i class="fa fa-shopping-cart"></i>
            <span class="qty" id="qty_cart"><?php echo isset($_SESSION['carrinho'])? $_SESSION["cartPriceQuantity"]: 0 ?></span>
        </div>
        <strong class="text-uppercase">My Cart:</strong>
        <br>
        <span id="carrinho-preco-total">$<?php echo isset($_SESSION['carrinho'])? $_SESSION['cartPriceTotal']: 0 ?></span>
    </a>
    <div class="custom-menu">
        <div id="shopping-cart">
            <div class="shopping-cart-list">
                <?php if(isset($_SESSION['carrinho'])): ?>
                <?php foreach ($_SESSION['carrinho'] as $key => $item):?>
                <div class="product product-widget">
                    <div class="product-thumb">
                        <img src="<?php echo $item['imagem'] ?>" alt="">
                    </div>
                    <div class="product-body">
                        <h3 class="product-price">$<?php echo $item['preco'] ?> 
                        <span class="qty">x<?php echo $item['qty'] ?></span></h3>
                        <h2 class="product-name"><a href="#"><?php echo $item['nome'] ?></a>
                        </h2>
                    </div>
                    <button class="cancel-btn"><i class="fa fa-trash"></i></button>
                </div>
                <?php endforeach ?>
                <?php endif ?>
            </div>
            <div class="shopping-cart-btns">
                <button class="main-btn">View Cart</button>
                <a href="checkout.php"><button class="primary-btn">Checkout <i class="fa fa-arrow-circle-right"></i></button></a>
            </div>
        </div>
    </div>
</li>