<?php

namespace App\Models;

use App\Observers\CartObserver;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
        static::addGlobalScope('cookie_id',function (Builder $builder){
            $builder->where('cookie_id','=',self::getCookieId());
        });
   }
    public static function getCookieId(){

//         $cookie_id=request()->cookie('name');
//
//
//         if (!isset($cookie_id)){
//             $cookie_id=Str::uuid();
//
//
////               Cookie::queue(cookie('name',$cookie_id, Carbon::now()->addDays(30)->format('d')));
//         }
        return $cookie_id='64ad38ca-fa67-42e4-951c-6563c00f8b29';
    }
}
