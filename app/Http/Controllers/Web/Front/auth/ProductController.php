<?php

namespace App\Http\Controllers\Web\Front\auth;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

class ProductController extends Controller
{

    public function showOneProduct(Product $product){
        if ($product->status!='active'){
            abort(404);

        }
        return view('user.showproduct',get_defined_vars());
    }
}
