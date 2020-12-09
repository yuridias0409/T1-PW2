<?php

/* Produtos */
function requestAPI($parametro){
    $key = "pront=300161X&key=fd2dfa851e3074451baa8a0cb63d46ae";
    return json_decode(file_get_contents("https://ramos-api.herokuapp.com/".$parametro.$key), true);
}

function getAllProducts(){ //Retorna todos os produtos
    return requestAPI("produtos?");
}

function getProductByType($productType){  //Retorna os produtos filtrado por tipo (vga or ram)
    return requestAPI("produtos?tipo=".$productType."&");
}

function getProductById($productID){  //Retorna o produto filtrado por id
    return requestAPI("produtos?id=".$productID."&");
}

function getBrandsOfProducts($products){  //Retorna as marcas
    $brands = array();
    foreach ($products as $key => $product) {
        if(!in_array($product["marca"], $brands)){
            array_push($brands, $product["marca"]);
        }
    }
    return $brands;
}

function getProductsSortedByPrice($ts){ //Retorna o filtro de acordo com o pedido (ASC or DESC)
    return requestAPI("produtos?preco=".$ts."&");
}
?>