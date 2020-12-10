<?php if(!isset($_SESSION['carrinho'])): ?>
<h2>Você não possui itens no carrinho </h2>
<?php else: ?>
<table class="shopping-cart-table table">
    <thead>
        <tr>
            <th>Product</th>
            <th></th>
            <th class="text-center">Price</th>
            <th class="text-center">Quantity</th>
            <th class="text-center">Total</th>
            <th class="text-right"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($_SESSION['carrinho'] as $key => $produto):?>
        <tr>
            <td class="thumb"><img src="<?php echo $produto['imagem'] ?>" alt=""></td>
            <td class="details">
                <a href="#"><?php echo $produto['nome'] ?></a>
                <ul>
                    <li><span>Size: XL</span></li>
                    <li><span>Color: Camelot</span></li>
                </ul>
            </td>
            <td class="price text-center"><strong>$<?php echo $produto['preco'] ?></strong>
            </td>
            <td class="qty text-center"><input class="input" type="number"
                    value="<?php echo $produto['qty'] ?>">
            </td>
            <td class="total text-center"><strong
                    class="primary-color">$<?php echo ($produto['preco']*$produto['qty']) ?></strong>
            </td>
            <td class="text-right"><button class="main-btn icon-btn"><i
                        class="fa fa-close"></i></button></td>
        </tr>
        <?php endforeach ?>
    </tbody>
    <tfoot>
        <tr>
            <th class="empty" colspan="3"></th>
            <th>SUBTOTAL</th>
            <th colspan="2" class="sub-total">
                $<?php echo isset($_SESSION["cartPriceTotal"])?$_SESSION["cartPriceTotal"]: 0; ?>
            </th>
        </tr>
        <tr>
            <th class="empty" colspan="3"></th>
            <th>SHIPING</th>
            <td colspan="2">Free Shipping</td>
        </tr>
        <tr>
            <th class="empty" colspan="3"></th>
            <th>TOTAL</th>
            <th colspan="2" class="total">
                $<?php echo isset($_SESSION["cartPriceTotal"])?$_SESSION["cartPriceTotal"]: 0; ?>
            </th>
        </tr>
    </tfoot>
</table>
<?php endif ?>