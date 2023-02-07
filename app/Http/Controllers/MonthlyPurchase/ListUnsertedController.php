<?php

namespace App\Http\Controllers\MonthlyPurchase;

use App\Http\Controllers\Controller;
use App\Http\Requests\MonthlyPurchaseStoreRequest;
use App\Models\Monthly;
use App\Services\MonthlyPurchaseService;

class ListUnsertedController extends Controller
{

    public function __construct(
        protected MonthlyPurchaseService $monthlyPurchaseService
    ) {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke()
    {
        $purchases = $this->monthlyPurchaseService->getUnsertedMonthlyPurchases();

        return view('monthly.list-unserted', compact('purchases'));
    }
}
