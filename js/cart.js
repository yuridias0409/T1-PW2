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
            addProductInCart(product, qty);
        });

        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);
            console.log(jqXHR)
            console.log(textStatus)
        });

    })
});

function addProductInCart(product, qty) {
    var productExists = false;
    var cartList = $(".shopping-cart-list")[0];
    var cartListCount = $(".shopping-cart-list")[0].childElementCount;

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

    for (var index = 0; index < cartListCount; index++) {
        img = cartList.children[index].childNodes[1].children[0].currentSrc
        if (img == product["imagem"]) {
            productExists = true;
            $(cartList.children[index]).replaceWith(np);
            break;
        }
    }
    

    if (!productExists) {
        $(".shopping-cart-list").append(np);
    }
    
    var qtdTotal = $("#qty_cart");
    qtdTotal.html(parseInt(qtdTotal.html()) + parseInt(qty));
    var precoTotal = $('#carrinho-preco-total');
    var precoAtual = (precoTotal.html());
    precoAtual = parseFloat(precoAtual.slice(1, precoAtual.length));
    precoSoma = parseFloat(product["preco"]) * parseInt(qty);
    var novoPreco = precoAtual + precoSoma;
    novoPreco = novoPreco.toFixed(2);
    precoTotal.html("$" + novoPreco);

}