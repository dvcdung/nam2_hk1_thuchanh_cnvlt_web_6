<?php

//Add an item to the cart

use App\Models\products;
use Illuminate\Support\Facades\Config;

function add_item($key, $itemQuantity) {
    
    $products = Config::get('products');

    if($itemQuantity < 1) {
        return;
    }

    if(isset($_SESSION['cart'][$key])) {
        $itemQuantity += $_SESSION['cart'][$key]->itemQuantity;
    }

    $itemCost = $products[$key]->itemCost;
    $itemTotal = $itemCost * $itemQuantity;
    $item = new products($products[$key]->itemName, $itemCost, $itemQuantity, $itemTotal);


    $_SESSION['cart'][$key] = $item;
}


//Update item
function update_item($key, $itemQuantity) {
    $itemQuantity = (int) $itemQuantity;
    if(isset($_SESSION['cart'][$key])) {
        if($itemQuantity <= 0) {
            unset($_SESSION['cart'][$key]);
        }else {
            $_SESSION['cart'][$key]->itemQuantity = $itemQuantity;
            $_SESSION['cart'][$key]->itemTotal = $_SESSION['cart'][$key]->itemCost* $itemQuantity;       
        }
    }
}