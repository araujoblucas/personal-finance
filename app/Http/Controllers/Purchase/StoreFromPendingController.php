<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use App\Http\Requests\PurchaseStoreFromPendingRequest;
use App\Services\PurchaseService;

class StoreFromPendingController extends Controller
{
    public function __construct(
        protected PurchaseService $purchaseService
    ) {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(PurchaseStoreFromPendingRequest $request, int $pendingId)
    {
        $validated = $request->validated();

        $this->purchaseService->storeFromPending($pendingId, $validated);

        return redirect()->route('pending.list');
    }
}
