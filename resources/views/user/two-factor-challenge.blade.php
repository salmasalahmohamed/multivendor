<x-front title="dashborad">
    <x-slot:crmbus>
        <div class="breadcrumbs">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="breadcrumbs-content">
                            <h1 class="page-title">Login</h1>
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
        <!-- End Breadcrumbs -->

        <!-- Start Account Login Area -->
        <div class="account-login section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
                        <form class="card login-form"  action="{{url('customer/two-factor-challenge')}}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="title">
                                    <h3>recovery</h3>
                                    <p>You can login using your social media account or email address.</p>
                                </div>
                                <div class="social-login">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-12"><a class="btn facebook-btn"
                                                                                 href="javascript:void(0)"><i class="lni lni-facebook-filled"></i> Facebook
                                                login</a></div>
                                        <div class="col-lg-4 col-md-4 col-12"><a class="btn twitter-btn"
                                                                                 href="javascript:void(0)"><i class="lni lni-twitter-original"></i> Twitter
                                                login</a></div>
                                        <div class="col-lg-4 col-md-4 col-12"><a class="btn google-btn"
                                                                                 href="javascript:void(0)"><i class="lni lni-google"></i> Google login</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="alt-option">
                                    <span>Or</span>
                                </div>
                                <div class="form-group input-group">
                                    <label for="reg-fn">recovery code</label>
                                    <input class="form-control" type="text"  required name="code">

                                <div class="button">
                                    <button class="btn" type="submit">recovery</button>
                                </div>
                                </p>
                            </div>
                        </form>
                        @if ($errors->any())--}}
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- End Account Login Area -->

    </x-slot:crmbus>
</x-front>
