<?php

namespace App\Services;

use App\Models\Purchase;

class PayService
{
    public function pay(int $purchaseId)
    {
        Purchase::where('id', $purchaseId)->update(['is_paid' => true]);
    }
}
