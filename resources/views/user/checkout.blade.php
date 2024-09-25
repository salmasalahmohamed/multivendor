
<x-front title="dashborad">


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


<section class="checkout-wrapper section">
    <div class="container">
        <div class="row justify-content-center">
            <form action="{{route('checkout.store')}}" method="post">
@csrf
            <div class="col-lg-8">
                <div class="checkout-steps-form-style-1">
                    <ul id="accordionExample">
                        <li>
                            <h6 class="title" data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                aria-expanded="true" aria-controls="collapseThree">Shipping addresses </h6>
                            <section class="checkout-steps-form-content collapse show" id="collapseThree"
                                     aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="single-form form-default">
                                            <label>User Name</label>
                                            <div class="row">
                                                <div class="col-md-6 form-input form">
                                                    <input type="text" placeholder="First Name" value="" name="addr[shipping][first_name]">
                                                </div>

                                                <div class="col-md-6 form-input form">
                                                    <input type="text" placeholder="Last Name" value="shipping" name="addr[shipping][last_name]">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-form form-default">
                                            <label>Email Address</label>
                                            <div class="form-input form">
                                                <input type="text" placeholder="Email Address"  value="" name="addr[shipping][email]">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-form form-default">
                                            <label>Phone Number</label>
                                            <div class="form-input form">
                                                <input type="text" placeholder="Phone Number" name="addr[shipping][phone_number]">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="single-form form-default">
                                            <label>Mailing Address</label>
                                            <div class="form-input form">
                                                <input type="text" placeholder="Mailing Address" name="addr[shipping][street_address]">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-form form-default">
                                            <label>City</label>
                                            <div class="form-input form">
                                                <input type="text" placeholder="City" name="addr[shipping][city]">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-form form-default">
                                            <label>Post Code</label>
                                            <div class="form-input form">
                                                <input type="text" placeholder="Post Code" name="addr[shipping][postal_code]">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-form form-default">
                                            <label>Country</label>
                                            <div class="form-input form">
                                                <input type="text" placeholder="Country" name="addr[shipping][country]">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-form form-default">
                                            <label>Region/State</label>
                                            <div class="select-items">
                                                <select  name="addr[shipping][state]"class="form-control">
                                                    <option value="0">select</option>
                                                    <option value="1">select option 01</option>
                                                    <option value="2">select option 02</option>
                                                    <option value="3">select option 03</option>
                                                    <option value="4">select option 04</option>
                                                    <option value="5">select option 05</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="single-checkbox checkbox-style-3">
                                            <input type="checkbox" id="checkbox-3">
                                            <label for="checkbox-3"><span></span></label>
                                            <p>My delivery and mailing addresses are the same.</p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="single-form button">
                                            <button class="btn" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseFour" aria-expanded="false"
                                                    aria-controls="collapseFour">next
                                                step</button>
                                        </div>
                                    </div>
                                </div>

                            </section>
                        </li>
                        <li>
                            <h6 class="title collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                aria-expanded="false" aria-controls="collapseFour">your personal data</h6>
                            <section class="checkout-steps-form-content collapse" id="collapseFour"
                                     aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="single-form form-default">
                                            <label>User Name</label>
                                            <div class="row">
                                                <div class="col-md-6 form-input form">
                                                    <input type="text" placeholder="First Name" value="" name="addr[pilling][first_name]">
                                                </div>

                                                <div class="col-md-6 form-input form">
                                                    <input type="text" placeholder="Last Name" value="" name="addr[pilling][last_name]">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-form form-default">
                                            <label>Email Address</label>
                                            <div class="form-input form">
                                                <input type="text" placeholder="Email Address"  value="" name="addr[pilling][email]">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-form form-default">
                                            <label>Phone Number</label>
                                            <div class="form-input form">
                                                <input type="text" placeholder="Phone Number" name="addr[pilling][phone_number]">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="single-form form-default">
                                            <label>Mailing Address</label>
                                            <div class="form-input form">
                                                <input type="text" placeholder="Mailing Address" name="addr[pilling][street_address]">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-form form-default">
                                            <label>City</label>
                                            <div class="form-input form">
                                                <input type="text" placeholder="City" name="addr[pilling][city]">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-form form-default">
                                            <label>Post Code</label>
                                            <div class="form-input form">
                                                <input type="text" placeholder="Post Code" name="addr[pilling][postal_code]">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-form form-default">
                                            <label>Country</label>
                                            <div class="form-input form">
                                                <input type="text" placeholder="Country" name="addr[pilling][country]">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-form form-default">
                                            <label>Region/State</label>
                                            <div class="select-items">
                                                <select  name="addr[pilling][state]"class="form-control">
                                                    <option value="0">select</option>
                                                    <option value="1">select option 01</option>
                                                    <option value="2">select option 02</option>
                                                    <option value="3">select option 03</option>
                                                    <option value="4">select option 04</option>
                                                    <option value="5">select option 05</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="single-checkbox checkbox-style-3">
                                            <input type="checkbox" id="checkbox-3">
                                            <label for="checkbox-3"><span></span></label>
                                            <p>My delivery and mailing addresses are the same.</p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="single-form button">
                                            <button class="btn" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseFour" aria-expanded="false"
                                                    aria-controls="collapseFour">next
                                                step</button>
                                        </div>
                                    </div>
                                </div>

                            </section>
                        </li>
                        <li>
                            <h6 class="title collapsed" data-bs-toggle="collapse" data-bs-target="#collapsefive"
                                aria-expanded="false" aria-controls="collapsefive">Payment Info</h6>
                            <section class="checkout-steps-form-content collapse" id="collapsefive"
                                     aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="checkout-payment-form">
                                            <div class="single-form form-default">
                                                <label>Cardholder Name</label>
                                                <div class="form-input form">
                                                    <input type="text" placeholder="Cardholder Name">
                                                </div>
                                            </div>
                                            <div class="single-form form-default">
                                                <label>Card Number</label>
                                                <div class="form-input form">
                                                    <input id="credit-input" type="text"
                                                           placeholder="0000 0000 0000 0000">
                                                    <img src="assets/images/payment/card.png" alt="card">
                                                </div>
                                            </div>
                                            <div class="payment-card-info">
                                                <div class="single-form form-default mm-yy">
                                                    <label>Expiration</label>
                                                    <div class="expiration d-flex">
                                                        <div class="form-input form">
                                                            <input type="text" placeholder="MM">
                                                        </div>
                                                        <div class="form-input form">
                                                            <input type="text" placeholder="YYYY">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="single-form form-default">
                                                    <label>CVC/CVV <span><i
                                                                class="mdi mdi-alert-circle"></i></span></label>
                                                    <div class="form-input form">
                                                        <input type="text" placeholder="***">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="single-form form-default button">
                                                <button  type="submit" class="btn">pay now</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </li>

                    </ul>
                </div>
            </div>
        </form>
            <div class="col-lg-4">
                <div class="checkout-sidebar">
                    <div class="checkout-sidebar-coupon">
                        <p>Appy Coupon to get discount!</p>
                        <form action="#">
                            <div class="single-form form-default">
                                <div class="form-input form">
                                    <input type="text" placeholder="Coupon Code">
                                </div>
                                <div class="button">
                                    <button class="btn">apply</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="checkout-sidebar-price-table mt-30">
                        <h5 class="title">Pricing Table</h5>

                        <div class="sub-total-price">
                            <div class="total-price">
                                <p class="value">Subotal Price:</p>
                                <p class="price">{{$cart}}</p>
                            </div>
                            <div class="total-price shipping">
                                <p class="value">Subotal Price:</p>
                                <p class="price">$10.50</p>
                            </div>
                            <div class="total-price discount">
                                <p class="value">Subotal Price:</p>
                                <p class="price">$10.00</p>
                            </div>
                        </div>

                        <div class="total-payable">
                            <div class="payable-price">
                                <p class="value">Subotal Price:</p>
                                <p class="price">$164.50</p>
                            </div>
                        </div>
                        <div class="price-table-btn button">
                            <a href="javascript:void(0)" class="btn btn-alt">Checkout</a>
                        </div>
                    </div>
                    <div class="checkout-sidebar-banner mt-30">
                        <a href="product-grids.html">
                            <img src="https://via.placeholder.com/400x330" alt="#">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--====== Checkout Form Steps Part Ends ======-->

<!-- Start Footer Area -->
</x-front>
