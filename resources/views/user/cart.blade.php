<x-front title="cart">

    <!-- End Topbar -->

<!-- End Header Area -->

<!-- Start Breadcrumbs -->
    <x-slot:crmbus>



        <div class="breadcrumbs">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="breadcrumbs-content">
                            <h1 class="page-title">home</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <ul class="breadcrumb-nav">
                            <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                            <li>Login</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </x-slot:crmbus>

<!-- Shopping Cart -->
<div class="shopping-cart section">
    <div class="container">
        <div class="cart-list-head">
            <!-- Cart List Title -->
            <div class="cart-list-title">
                <div class="row">
                    <div class="col-lg-1 col-md-1 col-12">

                    </div>
                    <div class="col-lg-4 col-md-3 col-12">
                        <p>Product Name</p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <p>Quantity</p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <p>Subtotal</p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <p>Discount</p>
                    </div>
                    <div class="col-lg-1 col-md-2 col-12">
                        <p>Remove</p>
                    </div>
                </div>
            </div>

            @foreach($cart_info as $cart)
            <div class="cart-single-list">
                <div class="row align-items-center">
                    <div class="col-lg-1 col-md-1 col-12">
                        <a href="product-details.html"><img src="{{$cart->product->logo}}" alt="#"></a>
                    </div>
                    <div class="col-lg-4 col-md-3 col-12">
                        <h5 class="product-name"><a href="product-details.html">
                            {{$cart->product->name}}</a></h5>
                        <p class="product-des">
                            <span><em>Type:</em> Mirrorless</span>
                            <span><em>Color:</em> Black</span>
                        </p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <div class="count-input">
                            <input name="select" class="form-control" type="number" value="{{$cart->quantity}}">

                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <p>{{helper::format($cart->product->price *$cart->quantity,'EUR')}}</p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <p>{{helper::format($cart->product->compare_price,'EUR')}}</p>
                    </div>
                    <div class="col-lg-1 col-md-2 col-12">
                        <a class="remove-item" href="javascript:void(0)"><i class="lni lni-close"></i></a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        <div class="row">
            <div class="col-12">
                <!-- Total Amount -->
                <div class="total-amount">
                    <div class="row">
                        <div class="col-lg-8 col-md-6 col-12">
                            <div class="left">
                                <div class="coupon">
                                    <form action="#" target="_blank">
                                        <input name="Coupon" placeholder="Enter Your Coupon">
                                        <div class="button">
                                            <button class="btn">Apply Coupon</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="right">
                                <ul>
                                    <li>Cart Subtotal<span>{{$cart_1->total()}}</span></li>
                                    <li>Shipping<span>Free</span></li>
                                    <li>You Save<span>$29.00</span></li>
                                    <li class="last">You Pay<span>$2531.00</span></li>
                                </ul>
                                <div class="button">
                                    <a href="{{route('cart.checkout')}}" class="btn">Checkout</a>
                                    <a href="product-grids.html" class="btn btn-alt">Continue shopping</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ End Total Amount -->
            </div>
        </div>
    </div>
</div>
<!--/ End Shopping Cart -->

<!-- Start Footer Area -->
</x-front>
