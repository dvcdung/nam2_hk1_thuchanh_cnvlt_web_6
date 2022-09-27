@php
//Check action
    $action = filter_input(INPUT_POST, 'action');
    if($action === NULL) {
        $action = filter_input(INPUT_GET, 'action');
        if($action === NULL) {
            $action = "show_cart_act";
        }
    }

    switch($action) {
        case "show_cart_act":
        @endphp
           @include('thuchanh5/viewcart');
        @php
            break;
        
        case "show_add_act":
        @endphp
            @include('thuchanh5/giohang');
        @php
            break;
        
        case "add_cart_act":
            $itemName = filter_input(INPUT_POST, 'productName');
            $itemQuantity = (int) filter_input(INPUT_POST, 'itemQuantity');

            try {
                db_connect();
                $sql = "select itemCost from products where itemName = '$itemName'";
                $itemCost = number_format(db_get_value($sql), 2);
                try {
                    $sql = "select itemQuantity from cart where itemName = '$itemName' and customerId = 1";
                    $qty = db_get_value($sql);
                } catch (\Throwable $th) {
                    $qty = NULL;
                }

                if($qty) {
                    $itemQuantity += $qty;
                    db_execute("update cart set itemQuantity=$itemQuantity, itemTotal=".$itemQuantity*$itemCost." where itemName='$itemName' and customerId=1");
                }else {
                    $sql = "insert into cart (itemName, customerId, itemQuantity, itemTotal) values (:itemName, :customerId, :itemQuantity, :itemTotal)";
                    $array = [
                        'itemName' => $itemName,
                        'customerId' => 1,
                        'itemQuantity' => $itemQuantity,
                        'itemTotal' => $itemQuantity*$itemCost
                    ];
                    db_execute($sql, $array);
                }
                db_disconnect();
            } catch (\Throwable $th) {
            }
        @endphp
            @include('thuchanh5/viewcart')
        @php
            break;

        case "update_cart_act":
            try {
                db_connect();
                $newItemQty = filter_input(INPUT_POST, 'newItemQty', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
                foreach($newItemQty as $itemName => $itemQuantity) {               
                    $itemCost = number_format(db_get_value( "select itemCost from products where itemName = '$itemName'"), 2);
                    if((int) $itemQuantity <= 0) {
                        db_execute("delete from cart where itemName = '$itemName' and customerId = 1");
                    }else {
                        db_execute("update cart set itemQuantity=$itemQuantity, itemTotal=".$itemQuantity*$itemCost." where itemName='$itemName' and customerId=1");
                    }
                }
                db_disconnect();
            } catch (\Throwable $th) {
            }
        @endphp
            @include('thuchanh5/viewcart')
        @php
            break;

        case "delete_cart_act":
            try {
                db_connect();
                db_execute("delete from cart", array());
                db_disconnect();
            } catch (\Throwable $th) {
            }
        @endphp
            @include('thuchanh5/viewcart');
        @php
            break;
        default:
            echo "Không tồn tại action này";
    }

@endphp