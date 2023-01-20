<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use App\Http\Requests\PurchaseStoreRequest;
use App\Models\Purchase;
use App\Services\PurchaseService;
use Illuminate\Support\Carbon;

class EditController extends Controller
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
    public function __invoke(int $purchaseId)
    {
        $purchase = $this->purchaseService->get($purchaseId);

        $purchase->reference = $purchase->reference->format("Y-m-d");

        return view('purchase.edit', compact('purchase'));
    }
}
