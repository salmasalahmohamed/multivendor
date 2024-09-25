<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use App\Facads\cart;
use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class DeductProductQuantity
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderCreated $event): void
    {
        foreach ( $event->carts as $item){
           $product= Product::where('id','=',$item->product_id);
           $product->update([
               'quantity'=>DB::raw('quantity-'.$item->quantity)
           ]);
        };


    }


}
