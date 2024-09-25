<?php

namespace App\Http\Controllers\Web\Front\auth;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Repositories\Cart\CartModelRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use function Laravel\Prompts\confirm;
use function view;

class PaymentController extends Controller
{
    public function create(Order $order){
        return view('user.payment',get_defined_vars());
    }
    public function createstrippaymentintent(Request $request ,Order$order){

        $cart=\App\Facads\cart::total();
        try {
            $stripe = new \Stripe\StripeClient(config('services.stripe.secret_key'));
            $payment=$stripe->paymentIntents->create([
                'amount' => 333,
                'currency' => 'usd',
                'automatic_payment_methods' => ['enabled' => true],
            ]);

            $output = [
                'clientSecret' => $payment->client_secret,
                // [DEV]: For demo purposes only, you should avoid exposing the PaymentIntent ID in the client-side code.
                'dpmCheckerLink' => "https://dashboard.stripe.com/settings/payment_methods/review?transaction_id={$payment->id}",
            ];
              $cofirmpayment=$stripe->paymentIntents->confirm(
                "$payment->id",[
                      'payment_intent_data' => ['transfer_group' => 'ORDER100'],
                      'return_url' => 'https://www.example.com',
                  ]
                );
            $stripe->transfers->create([
                'amount' => 7000,
                'currency' => 'usd',
                'destination' => '{{CONNECTED_ACCOUNT_ID}}',
                'transfer_group' => 'ORDER100',
            ]);
            if ($cofirmpayment->status=='succeeded'){
                try {
                    Payment::create([
                        'order_id'=>$order->id,
                        'amount'=>$cofirmpayment->amount,
                        'currency'=>$cofirmpayment->currency,
                        'status'=>'complete',
                        'method'=>$cofirmpayment->payment_method,
                        'transaction_id'=>$cofirmpayment->id,
                        'transaction_data'=> json_decode($cofirmpayment),

                    ])
                    ;
                }catch (\Exception $exception){
                     return  $exception->getMessage();
                }
               echo 'success' ;
            }else
                  echo 'failed';
        }catch (\Exception$exception){
            return $exception->getMessage();
        }
        }

}
