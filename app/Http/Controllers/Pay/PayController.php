<?php

namespace App\Http\Controllers\Pay;

use App\Http\Controllers\Controller;
use App\Services\PayService;
use Illuminate\Http\RedirectResponse;

class PayController extends Controller
{
    public function __construct(
        protected PayService $payService
    ) {
    }

    public function __invoke($purchaseId): RedirectResponse
    {
        $this->payService->pay($purchaseId);

        return redirect()->route('purchase.list');
    }
}
