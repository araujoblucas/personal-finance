<?php

namespace App\Services;

use App\Models\Monthly;
use App\Models\PendingMonthlyPurchase;
use App\Models\Purchase;
use App\Traits\DateFormatTrait;
use Carbon\Carbon;

class PurchaseService
{
    use DateFormatTrait;

    public function delete(int $purchaseId): bool
    {
        return Purchase::where('id', $purchaseId)->delete();
    }

    public function get(int $purchaseId): ?Purchase
    {
        return Purchase::where('id', $purchaseId)->first();
    }

    public function update(int $purchaseId, array $validated)
    {
        $validated['reference'] = $this->transformDateForDMY($validated['reference']);
        Purchase::where('id', $purchaseId)->update($validated);
    }

    private function transformDateForDMY($date): string
    {
        return Carbon::createFromFormat('Y-m-d', $date)->format("d/m/Y");

    }

    public function store(array $validated): void
    {
        $validated['user_id'] = auth()->id();
        if (! empty($validated['number_of_installments']) &&
            $validated['number_of_installments'] > 1
        ) {
            $this->storeInstallments($validated);
            return;
        }
        $validated['reference'] = $this->formatToDatabase($validated['reference']);

        Purchase::create($validated);
    }

    public function storeFromMonthly(array $purchase): ?Purchase
    {
        return Purchase::create($purchase);
    }

    private function storeInstallments(array $validated)
    {
        $actual_installment = $validated['actual_of_installment'] ?? 1;
        $months = 0;

        while ($actual_installment <= $validated['number_of_installments']) {
            $temp = $validated;

            $temp['reference'] = Carbon::createFromFormat('Y-m-d', $temp['reference']);
            $temp['actual_installment'] = $actual_installment;

            $temp['reference'] = ($temp['reference'])->addMonths($months);

            Purchase::create($temp);
            $months++;
            $actual_installment++;
        }
    }

    public function storeFromPending(int $pendingId, array $data)
    {
        $pending = PendingMonthlyPurchase::find($pendingId);
        if (empty($pending)) {
            \Log::critical("Pending not fount in " . self::class);
            return;
        }
        $pending['price'] = $data['price'];

        Purchase::create($pending->toArray());

        $monthly = Monthly::find($pending['monthly_id']);
        $monthly->last_inserted_date = now();
        $monthly->price = $data['price'];
        $monthly->save();

        $pending->delete();

    }
}
