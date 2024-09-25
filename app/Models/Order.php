<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Order extends Model
{
    use HasFactory;
    protected $guarded=[];
public function store(){
    return $this->belongsTo(Store::class);
}
    public function user(){
        return $this->belongsTo(User::class)->withDefault();
    }
    public static function booted()
    {
static::creating(function (Order $order){
    $order->number=Order::getNextOrderNumber();
})   ;

}
public function products(){
    return $this->belongsToMany(Product::class,'order_items')->using(OrderItem::class)->withPivot(['product_name','price','quantity','option']);
}

public function addresses(){
    return $this->hasMany(OrderAddresses::class);
}

    public function pillingaddresses(){
        return $this->hasOne(OrderAddresses::class)->where('type','=','pilling');
    }

    public function shippingaddresses(){
        return $this->hasOne(OrderAddresses::class)->where('type','=','shipping');
    }


public static function getNextOrderNumber(){
    $year=Carbon::now()->year;
    $number=Order::whereYear('created_at',$year)->max('number');
    if ($number)
        return $number+1;

    return $year.'0001';
}

}
