<?php

namespace App\Http\Controllers\Web\Front\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddCategoryRequest;
use App\Models\Category;
use App\service\CurrencyConverter;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CurrencyConverterController extends Controller
{
public function store(Request$request){
    $currency_code=$request->input('currency_code');
    $rates=Cache::get('currency_rates','');
    $basecurrency=config('app.currency');

    if (!isset($rates[$currency_code])){
        $converter=new CurrencyConverter(env('CURRENCY_API_KEY'));
        $rate= $converter->convert($basecurrency,$currency_code);

        Cache::put('currency_rates',$rate,now()->addMinutes(90));

    }
    //session store the value for same user //cache for multiple
    Session::put('currency_code',$currency_code);

}
}
