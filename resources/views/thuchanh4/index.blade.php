@php

use App\Models\products;
use Illuminate\Support\Facades\Config;

    $lifetime = 60*60*24*365*3; //3 years
    
    session_set_cookie_params($lifetime, '/');
    session_start();

    empty($_SESSION['cart']) ? $_SESSION['cart'] = array() : false;

    $products = array();
    $products[] = new products("Dell N3558", 149.50, 0, 0);
    $products[] = new products("Hp CS3012", 199.50, 0, 0);
    $products[] = new products("Asus X409", 299.50, 0, 0);

    //Luu mang product vao products
    Config::set('products', $products);

    //Kiem tra hanh dong
    $action = filter_input(INPUT_POST, 'action');
    if($action === NULL) {
        $action = filter_input(INPUT_GET, 'action');
        if($action === NULL) {
            $action = 'show_add_act';
        }
    }

    //Tao menu
    switch ($action) {
        case 'show_add_act':
@endphp
            @include('thuchanh4/giohang')
@php            
            break;
        case 'add_act':
            $key = filter_input(INPUT_POST, 'productKey');
            $itemQuantity = filter_input(INPUT_POST, 'itemQuantity', FILTER_VALIDATE_FLOAT);
            add_item($key, $itemQuantity);
@endphp
            @include('thuchanh4/viewcart');
@php
            break;
        case 'view_cart_act':
@endphp
            @include('thuchanh4/viewcart');
@php
            break;
        case 'update_cart_act':
            $newItemQty = filter_input(INPUT_POST, 'newItemQty', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
            foreach ($newItemQty as $key => $itemQuantity) {
                if($_SESSION['cart'][$key]->itemQuantity !== $itemQuantity) {
                    update_item($key, $itemQuantity);
                }
            }
@endphp
            @include('thuchanh4/viewcart');
@php
            break;
        case 'delete_cart_act':
            unset($_SESSION['cart']);
@endphp
            @include('thuchanh4/viewcart');
@php
            break;
        case 'end_session_act':
            $_SESSION['cart'] = array();
            session_destroy();
@endphp
            @include('thuchanh4/viewcart');
@php
            break;
    }
@endphp