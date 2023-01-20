<?php

namespace App\Services;

use App\Models\PendingMonthlyPurchase;
use App\Models\Purchase;
use App\Traits\DateFormatTrait;
use Illuminate\Database\Eloquent\Collection;

class PendingMonthlyPurchasesService
{
    use DateFormatTrait;

    public function getAll()
    {
        return PendingMonthlyPurchase::all();
    }

    public function store(array $purchase)
    {
        return PendingMonthlyPurchase::create($purchase);
    }

    public function getOldPrices(Collection $pendingMonthlyPurchases)
    {
        foreach ($pendingMonthlyPurchases as $key => $purchase) {
            $price = Purchase::where('monthly_id', $purchase->monthly_id)->first()?->price;
            $pendingMonthlyPurchases[$key]['old_price'] = $price;
        }
        return $pendingMonthlyPurchases;
    }
}
