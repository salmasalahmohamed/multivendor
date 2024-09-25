@props(['products'=>''])
<section class="trending-product section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Trending Product</h2>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                        suffered alteration in some form.</p>
                </div>
            </div>
        </div>
        <div class="row">

            @foreach($products as $product)
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Product -->
                    <div class="single-product">
                        <div class="product-image">
                            <img src="{{$product->logo_url}}" alt="#">
                            <span class="sale-tag">-{{$product->percent()}}%</span>
                            <div class="button">
                                <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="category">{{$product->category->name}}%</span>
                            <h4 class="title">
                                <a href="{{url(\Illuminate\Support\Facades\App::getLocale().'/product/'.$product->slug)}}">{{$product->name}}</a>
                            </h4>
                            <ul class="review">
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><span>{{$product->rating}}Review(s)</span></li>
                            </ul>
                            <div class="price">
                                <span>{{helper::format($product->price,'EUR')}}</span>
                                @if($product->compare_price)
                                <span class="discount-price">{{$product->compare_price}}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product -->
                </div>
            @endforeach

        </div>
    </div>
</section>
