<div class="add-item">    
    <h3>Add Item</h3>
    <form action="{{route('viewcart')}}" method="post">
        @csrf
        <input type="hidden" name="action" value="add_act">
        <table>
            <tr>
                <td>Name</td>
                <td>
                    @php 
                        $products = Config::get('products');
                    @endphp
                    <select name="productKey" id="productKey"> 
                        @foreach ($products as $key => $product)
                            @php 
                                $cost = number_format($product->itemCost);
                                $name = $product->itemName;
                                $item = $name. " ($". $cost .")";
                            @endphp
                            <option value="{{ $key }}">{{ $item }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>Quantity</td>
                <td>
                    <select name="itemQuantity" id="itemQuantity">
                        @for($i = 1; $i <= 30; $i ++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit">Add Item</button>
                </td>
            </tr>
        </table>
    </form>
    <div class="menu">
        <div class="view-cart">
            <a href="?action=view_cart_act">View Cart</a>
        </div>
    </div>
</div>