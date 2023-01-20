<?php

namespace App\Http\Controllers\MonthlyPurchase;

use App\Http\Controllers\Controller;
use App\Services\MonthlyPurchaseService;
use Illuminate\View\View;

class ListController extends Controller
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
    public function __invoke(): View
    {
        $purchases = $this->monthlyPurchaseService->getAll();

        return view('monthly.list', compact('purchases'));
    }
}
