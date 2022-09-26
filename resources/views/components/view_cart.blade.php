<div class="view-cart">
    <h3>Your Cart</h3>
    @if (empty($_SESSION['cart']))
        <p>There are no items in your cart</p>
    @else
        <form action="{{ route("viewcart") }}" method="post">
            @csrf
            <input type="hidden" name="action" value="update_cart_act">
            <table>
                <tr id="cart_header">
                    <th>itemName</th>
                    <th>itemCost</th>
                    <th>itemQuantity</th>
                    <th>itemTotal</th>
                </tr>
                @foreach ($_SESSION['cart'] as $key => $item)
                    @php
                        $cost = number_format($item->itemCost, 2);
                        $total = number_format($item->itemTotal, 2);
                    @endphp
                    <tr>
                        <td>{{ $item->itemName }}</td>
                        <td>{{ $cost }}</td>
                        <td>
                            <input type="text" class="cart_qty" name="newItemQty[{{ $key }}]" value="{{ $item->itemQuantity }}">
                        </td>
                        <td>{{ $total }}</td>
                    </tr>
                @endforeach
                <tr>
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
        <div class="end-session">
            <a href="?action=end_session_act">End Session and Delete Cookie</a>
        </div>
    </div>
</div>