<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <div class="table-responsive cart_info" data-url="{{route('cart.delete')}}">
            <table class="table table-condensed update-cart-url-1" data-url="{{route("cart.update")}}">
                <thead>
                <tr class="cart_menu">
                    <td class="image">Item</td>
                    <td class="description"></td>
                    <td class="price">Price</td>
                    <td class="quantity">Quantity</td>
                    <td class="total">Total</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                @if(isset($carts))
                    @php
                        $total = 0;
                    @endphp
                    @forelse($carts->items as $product)
                        @php
                            $total += $product['quantity']*$product['product']->price
                        @endphp
                        <tr>
                            <td class="cart_product">
                                <a href=""><img style="height: 100px" src="{{$product['product']->image}}"
                                                alt=""></a>
                            </td>
                            <td class="cart_description">
                                <h4>
                                    <a href="{{route('showDetail',$product['product']->id)}}">{{$product['product']->title}}</a>
                                </h4>
                                <p>Web ID: {{$product['product']->id}}</p>
                            </td>
                            <td class="cart_price">
                                <p>${{$product['product']->price  }}</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
{{--                                    <a class="cart_quantity_up"--}}
{{--                                       onclick="upQuantity({{ $product['product']->id }})"> + </a>--}}
                                    <input class="cart_quantity_input update-quantity"
                                           id="quantity-{{ $product['product']->id }}"
                                           data-id="{{ $product['product']->id }}"
                                           type="text" name="quantity"
                                           value="{{$product['quantity']}}"
                                           autocomplete="off" size="2">
{{--                                    <a class="cart_quantity_down"--}}
{{--                                       onclick="downQuantity({{ $product['product']->id }})"> - </a>--}}
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price" id="cart-subTotal">
                                    ${{$product['quantity']*$product['product']->price}}</p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" data-id="{{ $product['product']->id }}" href=""><i
                                        class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>Bạn chưa chọn sản phầm nào</td>
                        </tr>
                    @endforelse
                @else
                    <tr>
                        <td>Bạn chưa chọn sản phầm nào</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->
<section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>What would you like to do next?</h3>
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate
                your delivery cost.</p>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="chose_area">
                    <ul class="user_option">
                        <li>
                            <input type="checkbox">
                            <label>Use Coupon Code</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Use Gift Voucher</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Estimate Shipping & Taxes</label>
                        </li>
                    </ul>
                    <ul class="user_info">
                        <li class="single_field">
                            <label>Country:</label>
                            <select>
                                <option>United States</option>
                                <option>Bangladesh</option>
                                <option>UK</option>
                                <option>India</option>
                                <option>Pakistan</option>
                                <option>Ucrane</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>

                        </li>
                        <li class="single_field">
                            <label>Region / State:</label>
                            <select>
                                <option>Select</option>
                                <option>Dhaka</option>
                                <option>London</option>
                                <option>Dillih</option>
                                <option>Lahore</option>
                                <option>Alaska</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>

                        </li>
                        <li class="single_field zip-field">
                            <label>Zip Code:</label>
                            <input type="text">
                        </li>
                    </ul>
                    <a class="btn btn-default update" href="">Get Quotes</a>
                    <a class="btn btn-default check_out" href="">Continue</a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                            <li>Cart Sub Total <span>${{$total}}</span></li>
                        <li>Eco Tax <span>$0</span></li>
                        <li>Shipping Cost <span>Free</span></li>
                        <li>Total <span>${{$total}}</span></li>
                    </ul>
                    <a class="btn btn-default update" href="">Update</a>
                    <a class="btn btn-default check_out" href="">Check Out</a>
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->
