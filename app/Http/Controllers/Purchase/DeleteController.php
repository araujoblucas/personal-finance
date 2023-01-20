<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use App\Http\Requests\PurchaseStoreRequest;
use App\Models\Purchase;
use App\Services\PurchaseService;

class DeleteController extends Controller
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
    public function __invoke(int $purchaseId)
    {
        $this->purchaseService->delete($purchaseId);

        return redirect()->route('purchase.list')->with("Deletado com sucesso");
    }
}
