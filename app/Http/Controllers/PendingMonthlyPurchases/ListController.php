<?php

namespace App\Http\Controllers\PendingMonthlyPurchases;

use App\Http\Controllers\Controller;
use App\Services\PendingMonthlyPurchasesService;
use Illuminate\View\View;

class ListController extends Controller
{

    public function __construct(
        protected PendingMonthlyPurchasesService $pendingMonthlyPurchaseService
    ) {
    }

    /**
     * Show the application dashboard.
     *
     * @return View
     */
    public function __invoke(): View
    {
        $pending_purchases = $this->pendingMonthlyPurchaseService->getAll();
        $pending_purchases = $this->pendingMonthlyPurchaseService->getOldPrices($pending_purchases);
        return view('pending.list', compact('pending_purchases'));
    }
}
