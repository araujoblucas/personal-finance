<?php

namespace App\Http\Controllers\MonthlyPurchase;

use App\Http\Controllers\Controller;
use App\Http\Requests\MonthlyPurchaseStoreRequest;
use App\Services\MonthlyPurchaseService;

class StoreController extends Controller
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
    public function __invoke(MonthlyPurchaseStoreRequest $request)
    {
        $data = $request->validated();

        $monthly = $this->monthlyPurchaseService->store($data);

        $this->monthlyPurchaseService->createAPurchaseBasedOnThisMonthly($monthly);

        return redirect()->route('monthly.create');
    }
}
