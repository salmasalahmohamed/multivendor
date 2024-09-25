<?php
namespace  App\Helpers;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class helper{

    public static function format($amount,$currency=null){
        $rate=Cache::get('currency_rates');
$formatter=new \NumberFormatter(config('app.local'),\NumberFormatter::CURRENCY);
if ($currency==null){
   $currency= Session::get('currency_code');
}
if ($currency!=config('app.currency'))

{
$amount=$amount*$rate;
}
return $formatter->formatCurrency($amount,$currency);
    }

}
