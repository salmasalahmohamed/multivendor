<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StoreController extends Controller
{
    public function create()
    {
        return view('stores.create');

    }

    public function store(Request $request)
    {
        $store = Store::create([
            'name' => $request->name,
            'description' => $request->description,
            'logo' => $request->logo,
            'status' => $request->status,
            'slug' => Str::slug($request->name)
        ]);
        $request->user()->store()->associate($store);
        $request->user()->save();
    }
}
