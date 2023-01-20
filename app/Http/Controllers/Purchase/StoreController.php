<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use App\Http\Requests\PurchaseStoreRequest;
use App\Models\Purchase;
use App\Services\PurchaseService;

class StoreController extends Controller
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
    public function __invoke(PurchaseStoreRequest $request)
    {
        $validated = $request->validated();

        $this->purchaseService->store($validated);

        return redirect()->route('purchase.list');
    }
}
