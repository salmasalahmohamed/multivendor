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
                    @if (session('status') == 'two-factor-authentication-enabled')
                        <div class="mb-4 font-medium text-sm">
                            Please finish configuring two factor authentication below.
                        </div>
                    @endif
                    <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
                        <form class="card login-form"  action="{{route('two-factor.enable')}}" method="post">
                            @csrf
                            <div class="card-body">

                                <div class="button">
                                    @if(!\Illuminate\Support\Facades\Auth::guard('customer')->user()->two_factor_secret)
                                    <button class="btn" type="submit">enable</button>
                                    @else
                                       {!!  \Illuminate\Support\Facades\Auth::guard('customer')->user()->twoFactorQrCodeSvg()!!}

                                    @foreach( \Illuminate\Support\Facades\Auth::guard('customer')->user()->recoveryCodes() as $code)
                                    {{$code[0]}}
                                        @endforeach
                                        @method('delete')
                                        <button class="btn" type="submit">disable</button>

                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Account Login Area -->

    </x-slot:crmbus>
</x-front>
s X 4 L l 7 f 5
