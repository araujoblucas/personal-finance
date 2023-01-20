<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use App\Http\Requests\PurchaseUpdateRequest;
use App\Services\PurchaseService;

class UpdateController extends Controller
{
    public function __construct(
        protected PurchaseService $purchaseService
    ) {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __invoke(int $purchaseId, PurchaseUpdateRequest $request)
    {
        $validated = $request->validated();

        $this->purchaseService->update($purchaseId, $validated);

        return redirect()->route('purchase.list');
    }
}
