var buttons_add_to_cart = document.getElementsByClassName('add-to-cart');

Array.prototype.forEach.call(buttons_add_to_cart, function(e) {
    e.addEventListener("click", function(){
        var idProduct = e.getAttribute("data-product");
        var idqty = undefined;

        if (idqty === undefined || idqty < 1){
            qty = 1;
        }   else{
            qty = $('#' + idqty).val();
        }

        console.log("id:" + idProduct);
        console.log("qty:" + qty);

        var request = $.ajax({
            url: "codigo/CarrinhoController.php",
            type: "POST",
            data: {pid: idProduct, pqty: qty},
            dataType: "JSON"
        });

        request.done(function (product) {
            addNewItemInCart(product, qty);
        });

        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);
            console.log(jqXHR)
            console.log(textStatus)
        });

    })
});

function addNewItemInCart(product, qty) {
    var np = `
            <div class="product product-widget">
                <div class="product-thumb">
                    <img src="${product["imagem"]}" alt="">
                </div>
                <div class="product-body">
                    <h3 class="product-price">$${product["preco"]} <span class="qty">${product["qty"]}x</span></h3>
                    <h2 class="product-name"><a href="#">${product["nome"]}</a></h2>
                </div>
                <button class="cancel-btn"><i class="fa fa-trash"></i></button>
            </div>
        `
    var exists = false;
    var cart_list = $(".shopping-cart-list")[0];
    var cart_list_count = $(".shopping-cart-list")[0].childElementCount;

    for (var index = 0; index < cart_list_count; index++) {
        img = cart_list.children[index].childNodes[1].children[0].currentSrc
        if (img == product["imagem"]) {
            exists = true;
            $(cart_list.children[index]).replaceWith(np);
            break;
        }
    }

    if (!exists) {
        $(".shopping-cart-list").append(np);
    }
    
    var qty_total = $("#qty_cart");
    qty_total.html(parseInt(qty_total.html()) + parseInt(qty));
    var preco_total = $('#carrinho-preco-total');
    var preco_atual = (preco_total.html());
    preco_atual = parseFloat(preco_atual.slice(1, preco_atual.length));
    preco_soma = parseFloat(product["preco"]) * parseInt(qty);
    var novo_preco = preco_atual + preco_soma;
    novo_preco = novo_preco.toFixed(2);
    preco_total.html("$" + novo_preco);

}