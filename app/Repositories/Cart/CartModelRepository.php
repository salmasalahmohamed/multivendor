<?php
namespace App\Repositories\Cart;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class   CartModelRepository implements CartRepository{


     public function get():\Illuminate\Support\Collection
     {
        return $items=Cart::with('product')->get();

     }

     public function add($product,$quantity=1)
     {
         Cart::create([
             'user_id'=>Auth::guard('customer')->user()->id,
             'product_id'=>$product,
             'quantity'=>$quantity,

         ]);
     }

     public function update(Product $product, $quantity)
     {
         Cart::where('product_id',$product->id)->update([
             'quantity'=>$quantity,

         ]);
     }

     public function delete($id)
     {
         Cart::where('product_id',$id)->delete();
     }

     public function clear()
     {
         DB::table('carts')->delete();

     }

     public function total()
     {
//          return (float)
//          Cart::join('products','products.id','=' ,'carts.product_id')->selectRaw('SUM(products.price*carts.quantity)as total')->value('total');

         return $this->get()->sum(function ($items){
              return $items->quantity * ($items->product->price ?? 0);
         });
     }


 }
