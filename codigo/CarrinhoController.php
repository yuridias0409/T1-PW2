<?php
/* Includes */
include "ProductController.php";
include "debug.php";

/* Inicia a sessão */
session_start();

/* Carrinho */
function productExistsInCart($id){
    $cart = $_SESSION['carrinho']; //Pega os produtos dentro do carrinho
    foreach ($cart as $index => $product) { //Percorre o carrinho
        if($product["id"] == $id){
            return $index; //Se o produto existir dentro do carrinho, retorna o index dele
        }
    }
    return false;
}

function getPriceTotalCart($carrinho){
    $sum = 0;
    foreach ($carrinho as $key => $item) {
      $sum += ($item['preco'] * $item['qty']);
    }
    return $sum;
}
  
function getQuantityOfProducts($carrinho){
    $sum = 0;
    foreach ($carrinho as $key => $item) {
      $sum += $item['qty'];
    }
    return $sum;
}

if(isset($_POST["pid"])){
    if(!isset($_SESSION['carrinho'])){ //Caso o carrinho não exista na sessão
        $_SESSION['carrinho'] = array(); //Define ele como um array
    }

    $productID = $_POST["pid"]; //ID do Produto
    $productQuantity = $_POST["pqty"]; //Quantidade do Produto
    $indexProductAdded = productExistsInCart($productID); //Verifica se o produto ja foi adicionado ao carrinho

    if($indexProductAdded != false){ //Se o produto já foi adicionado ao carrinho
        $_SESSION["carrinho"][$indexProductAdded]["qty"] += $productQuantity; //Se já foi adicionado adiona a quantidada a quantidade ja existente ao carrinho
        $itemCarrinho = $_SESSION["carrinho"][$indexProductAdded];
    } else{
        $itemCarrinho = getProductById($productID); //Pega os dados do produto adicionado
        $itemCarrinho["qty"] = $productQuantity; //Seta o valor da quantidade
        array_push($_SESSION['carrinho'], $itemCarrinho); //Salva o produto adicionado a sessão relacionada ao carrinho
    }

    $_SESSION['cartPriceTotal'] = getPriceTotalCart($_SESSION['carrinho']);
    $_SESSION['cartPriceQuantity'] = getQuantityOfProducts($_SESSION['carrinho']);
    echo json_encode($itemCarrinho);
}
    

?>