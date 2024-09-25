<?php

namespace App\Http\Controllers\Web\Front\auth;

use App\Events\OrderCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use App\Notifications\OrderCreatedNotification;
use App\Repositories\Cart\CartModelRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use function view;

class CheckoutController extends Controller
{

    public function checkout(){
        $cart=\App\Facads\cart::total();
if (!$cart){
    return to_route('home');
}
        return view('user.checkout',get_defined_vars());
    }
    public function store(  OrderRequest $request){

        $carts=\App\Facads\cart::get();
$items=$carts->groupBy('product.store_id');

        DB::beginTransaction();
        try {
            foreach ($items as $store_id=>$cart_item){
               $order=Order::create([
                    'store_id'=>$store_id,
                    'user_id'=>Auth::guard('customer')->user()->id,
                    'payment_method'=>'code'
                ]);
                foreach ($cart_item as $cart){
                    OrderItem::create([
                        'order_id' =>$order->id,
                        'product_id'=>$cart->product->id,
                        'product_name'=>$cart->product->name,
                        'price'=>$cart->product->price,
                        'quantity'=>$cart->quantity,
                    ]);
                }

                foreach ($request->post('addr') as $type=>$address){
                    $address['type']=$type;
                    $address['order_id']=$order->id;

                    $order->addresses()->insert([$address]);
                }
            }
            //$user=User::where('store_id',$order->store_id)->first();
            //$user->notify(new OrderCreatedNotification($order));

            event(new OrderCreated($carts));
            DB::commit();



        }catch (Exception $exception){
            DB::rollBack();

            return $exception->getMessage();
        }
        return redirect('payment/'.$order->id);

    }
}
