@extends('layouts.layout')

@section('content')

    @include('layouts.partials.breadcrumb')

    <!-- ****** Cart Area Start ****** -->
    <div class="cart_area section_padding_100 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cart-table clearfix">
                        <table class="table table-responsive">
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="cart_product_img d-flex align-items-center">
                                    <a href="cart.blade.php#"><img src="img/product-img/product-9.jpg" alt="Product"></a>
                                    <h6>Yellow Cocktail Dress</h6>
                                </td>
                                <td class="price"><span>$49.88</span></td>
                                <td class="qty">
                                    <div class="quantity">
                                    <span class="qty-minus"
                                          onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i
                                            class="fa fa-minus" aria-hidden="true"></i></span>
                                        <input type="number" class="qty-text" id="qty" step="1" min="1" max="99"
                                               name="quantity" value="1">
                                        <span class="qty-plus"
                                              onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i
                                                class="fa fa-plus" aria-hidden="true"></i></span>
                                    </div>
                                </td>
                                <td class="total_price"><span>$49.88</span></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="cart-footer d-flex mt-30">
                        <div class="back-to-shop w-50">
                            <a href="https://technext.github.io/karl/shop-grid-left-sidebar.html">Continue shooping</a>
                        </div>
                        <div class="update-checkout w-50 text-right">
                            <a href="cart.blade.php#">clear cart</a>
                            <a href="cart.blade.php#">Update cart</a>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">

                {{-- coupon --}}
{{--                @include('cart.coupon')--}}

                {{-- shipping --}}
                @include('cart.shipping')

                {{-- cart total --}}
                @include('cart.cart-total')

            </div>
        </div>
    </div>
    <!-- ****** Cart Area End ****** -->

@endsection
