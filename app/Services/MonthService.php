<?php

namespace App\Services;

use App\Models\Purchase;
use Carbon\Carbon;
use Illuminate\Support\Str;

class MonthService
{
    public function createRelatory(Carbon $month = null)
    {
        $start = $month ?? now();
        $end = $month ?? now();
        $start = $start ? $start->firstOfMonth()->startOfDay() : now()->firstOfMonth()->startOfDay();
        $end = $end ? $end->lastOfMonth()->endOfDay() : now()->lastOfMonth()->endOfDay();

        $purchases = Purchase::where('reference', '>', $start)->where('reference', '<', $end)->get();

        $formatedPurchases = $this->updateValueWhenHasInstallments($purchases);
        return array(
            'total_value' => $formatedPurchases->sum('price'),
            'total_purchases' => $formatedPurchases->count(),
            'media_by_day' => round($formatedPurchases->sum('price') / now()->day, 2)
        );
    }

    private function updateValueWhenHasInstallments($purchases)
    {
        foreach ($purchases as $purchase) {
            if (! empty($purchase->price_of_installments)) {
                $purchase->price = $purchase->price_of_installments;
            }

//            $eliminatedTags = 'dizimo';
//            if (Str::contains($purchase->tags, $eliminatedTags)) {
//                $purchase->price = 0;
//            }
//
//            $eliminatedTags = 'imposto';
//            if (Str::contains($purchase->tags, $eliminatedTags)) {
//                $purchase->price = 0;
//            }
//
//            $eliminatedTags = 'aluguel';
//            if (Str::contains($purchase->tags, $eliminatedTags)) {
//                $purchase->price = 0;
//            }
        }


        return $purchases;
    }
}
