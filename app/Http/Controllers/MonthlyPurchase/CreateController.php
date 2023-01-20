<?php

namespace App\Http\Controllers\MonthlyPurchase;

use App\Http\Controllers\Controller;
use App\Models\Monthly;

class CreateController extends Controller
{

    public function __invoke()
    {
        $monthly = Monthly::all();

        return view('monthly.create', compact('monthly'));
    }
}
