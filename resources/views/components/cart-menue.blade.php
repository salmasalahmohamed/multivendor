<div class="cart-items">
    <a href="javascript:void(0)" class="main-btn">
        <i class="lni lni-cart"></i>
        <span class="total-items">2</span>
    </a>
    <!-- Shopping Item -->
    <div class="shopping-item">
        <div class="dropdown-cart-header">
            <span>{{$items->count()}}</span>
            <a href="cart.html">View Cart</a>
        </div>
        <ul class="shopping-list">
            @if(isset($items))
           @foreach($items as $item)
            <li>
                <a href="javascript:void(0)" class="remove" title="Remove this item"><i
                        class="lni lni-close"></i></a>
                <div class="cart-img-head">
                    <a class="cart-img" href="{{route('product',[$item->product->slug])}}"><img
                            src="{{$item->product->logo_url}}" alt="#"></a>
                </div>
                <div class="content">
                    <h4><a href="product-details.html">{{$item->product->name}}</a></h4>
                    <p class="quantity">1x - <span class="amount">{{\App\Helpers\helper::format($item->product->price,'EUR')}}</span></p>
                </div>
            </li>
            @endforeach
            @endif
        </ul>
        <div class="bottom">
            <div class="total">
                <span>Total</span>
                <span class="total-amount">{{$total}}</span>
            </div>
            <div class="button">
                <a href="checkout.html" class="btn animate">Checkout</a>
            </div>
        </div>
    </div>
    <!--/ End Shopping Item -->
</div>
>
