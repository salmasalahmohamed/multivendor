<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{

    public function index(Request $request){
        //if we return one object from data base by elequent orm and need its relation we use load function instded with function
        return Product::filter($request->query())->with(['store','category'])->paginate(10);
    }
}
