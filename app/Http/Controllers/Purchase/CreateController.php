<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use App\Models\Purchase;

class CreateController extends Controller
{

    public function __invoke()
    {
        $purchase = Purchase::all();

        return view('purchase.create', compact('purchase'));
    }
}
