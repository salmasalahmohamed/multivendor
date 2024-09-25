<?php

namespace App\Http\Controllers\Web\Front\auth;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Repositories\Cart\CartModelRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use function view;

class CartController extends Controller
{
    public function index(Product$product){
        $cart_1= App::make('cart');
       $cart_info=$cart_1->get();
        return view('user.cart',get_defined_vars());
    }
    public function store(Request $request,Product $product){
        $request->validate([
            'product_id'=>'required',
            'quantity'=>'nullable|min:1'

        ]);
        $items=Cart::where('product_id',$request->product_id)->first();
if ($items){
     return $items->increment('quantity',$request->post('quantity'));

}else{
    $cart=new CartModelRepository();
    $cart->add($request->product_id,$request->post('quantity'));
}


    }
    public function update(Request $request,$product){

        $request->validate([
            'quantity'=>'nullable|min:1'

        ]);
        $product=Product::find($product->id);
        $cart=App::make('cart');
        $cart->update($product,$request->post('quantity'));

    }
    public function destroy($id){
        $cart=App::make('cart');
        $cart->delete($id);

    }
    public function checkout(){
        return view('user.checkout');
    }
}
