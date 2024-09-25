<?php
namespace App\service;
use Illuminate\Support\Facades\Http;

class CurrencyConverter{
protected $apikey;
protected $baseurl='https://free.currconv.com/api/v7/';
    public function __construct($apikey)
    {
        $this->apikey=$apikey;
    }
    public function convert($from,$to,$amount=1){
       $q= "{$from}_{$to}";
       $response= Http::baseUrl($this->baseurl)->get('/convert/',[
                'q'=>$q,
            'compact'=>'y',
            'apiKey'=>$this->apikey,
        ]);
        $rate=$response->json();
        return $rate[$q]['val'];
    }
}
