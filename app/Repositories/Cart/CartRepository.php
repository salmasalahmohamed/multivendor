<?php
namespace App\Repositories\Cart;

use App\Models\Product;
use phpDocumentor\Reflection\Types\Collection;

interface CartRepository{


    public function get():\Illuminate\Support\Collection;
    public function add(Product $product,$quantity=1);
    public function update(Product $product,$quantity);
    public function delete($id);
    public function clear();
    public function total();
}
