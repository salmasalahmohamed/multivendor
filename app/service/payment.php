<?php

namespace App\service;

use App\Models\Order;
use Illuminate\Http\Request;

interface payment
{

    public function paymentprocess( Request $request, Order$order);
}
