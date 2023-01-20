<?php

namespace App\Http\Controllers\MonthlyPurchase;

use App\Http\Controllers\Controller;
use App\Services\MonthlyPurchaseService;

class DeleteController extends Controller
{
    public function __construct(
        protected MonthlyPurchaseService $purchaseService
    ) {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(int $monthlyPurchaseId)
    {
        $this->purchaseService->delete($monthlyPurchaseId);

        return redirect()->route('monthly.list');
    }
}
