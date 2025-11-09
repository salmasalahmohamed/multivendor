<?php

namespace App\Models;

use App\Observers\CartObserver;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class Cart extends Model
{
    use HasFactory;
    public $incrementing=false;
    protected $guarded=[];
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function user(){
        return $this->belongsTo(User::class)->withDefault(['name'=>'anonymous']);
    }

    protected static function booted(){
        static::observe(CartObserver::class);

   }
    public static function cookie()
    {
        $c = request()->cookie('cart_id');

        if(!$c){
            $c = (string) Str::uuid();
            Cookie::queue('cart_id', $c, 60*24*30);
        }

        return $c;
    }
}
