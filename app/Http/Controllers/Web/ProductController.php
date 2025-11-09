<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(){
        $products=Product::with(['category','store'])->paginate(15);
        return view('product.show',get_defined_vars());
    }
    public function edit($id){
        $product=Product::find($id);
        $categories=Category::all();
        $stores=Store::all();
        $tags=implode(',',$product->tags()->pluck('name')->toArray());
        return view('product.edit',get_defined_vars());

    }
    public function update(Request $request,Product $product){
        $id=[];
        $product->update($request->except('tag'));
           $tags=json_decode($request->post('tag'),true);

        foreach ($tags as $key=>$tag) {

               $slug = Str::slug($tag['value']);

               $exist_tag = Tag::where('name', $tag)->first();
               if (!isset($exist_tag)) {
                   $new_tag = Tag::create([
                       'name' => $tag['value'],
                       'slug' => $slug
                   ]);

               }
               $id[] = $new_tag->id;
           }

          $product->tags()->sync($id);

    }
}
