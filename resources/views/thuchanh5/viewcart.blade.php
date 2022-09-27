@extends('thuchanh5/layout_thuchanh5')

@section('middle-content')
    <div class="view-cart">
        <h3>Your Cart</h3>
        @php
            $sql = "select P.itemName, itemCost, itemQuantity, itemTotal, CU.customerName from products P INNER JOIN cart C ON P.itemName = C.itemName INNER JOIN customer CU ON C.customerId = CU.customerId";
            try {
                db_connect();
                $result = db_get_list($sql);
                db_disconnect();
            } catch (\Throwable $th) {
                $result = NULL;
            }
        @endphp
        @if (empty($result))
            <p>There are no items in your cart</p>
        @else
            <form action="{{ route("thuchanh5") }}" method="post">
                @csrf
                <input type="hidden" name="action" value="update_cart_act">
                <table>
                    <tr id="cart_header">
                        <th>itemName</th>
                        <th>itemCost</th>
                        <th>itemQuantity</th>
                        <th>itemTotal</th>
                        <th>customerName</th>
                    </tr>
                    @foreach ($result as $key => $item)
                        @php
                            $cost = number_format($item['itemCost'], 2);
                            $total = number_format($item['itemTotal'], 2);
                        @endphp
                        <tr>
                            <td>{{ $item['itemName'] }}</td>
                            <td>{{ $cost }}</td>
                            <td>
                                <input type="text" class="cart_qty" name="newItemQty[{{ $item['itemName'] }}]" value="{{ $item['itemQuantity'] }}">
                            </td>
                            <td>{{ $total }}</td>
                            <td>{{ $item['customerName'] }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><button type="submit">Update</button></td>
                    </tr>
                </table>
            </form>
        @endif

        <div class="menu">
            <div class="add-item">
                <a href="?action=show_add_act">Add Item</a>
            </div>
            <div class="delete-cart">
                <a href="?action=delete_cart_act">Empty Cart</a>
            </div>
        </div>
    </div>
@endsection