<?php

namespace App\Http\Controllers\Web\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use function view;

class HomeController extends Controller
{
    public function index(){
        $products=Product::with('category')->active()->take(8)->get();
        return view('user.index',get_defined_vars());
    }
}
