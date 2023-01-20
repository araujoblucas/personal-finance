<?php

namespace App\Services;

use App\Models\Monthly;
use App\Models\Purchase;
use App\Traits\DateFormatTrait;
use Illuminate\Support\Carbon;

class MonthlyPurchaseService
{
    use DateFormatTrait;

    public function createAPurchaseBasedOnThisMonthly(Monthly $monthly): bool
    {
        $hasToBeAdded = $this->checkIfItNeedsToBeAdded($monthly->start_date);

        if (! $hasToBeAdded) {
            return false;
        }

        $purchase = Purchase::create([
            'reference' => now(),
            'user_id' => auth()->user()->id,
            'monthly_id' => $monthly->id,
            'description' => $monthly->description,
            'price' => $monthly->price,
            'tags' => $monthly->tags,
            'is_monthly' => true,
            'paid_by' => $monthly->paid_by,
            'is_paid' => $monthly->is_paid ?? false,
        ]);

        if ($purchase) {
            $this->updateLastDateInserted($monthly->id);
            return true;
        }
        return false;
    }

    public function getAll()
    {
        return Monthly::all();
    }

    private function checkIfItNeedsToBeAdded(Carbon $startDate): bool
    {
        return $startDate->month >= now()->month;
    }

    private function updateLastDateInserted($monthlyId): void
    {
        Monthly::where('id', $monthlyId)->update([
            'last_inserted_date' => now()
        ]);
    }

    public function delete(int $purchaseId)
    {
        return Monthly::where('id', $purchaseId)->delete();
    }

    public function store(array $data)
    {
        $data['start_date'] = Carbon::createFromFormat('Y-m-d', $data['start_date']);
        $data['last_inserted_date'] = ! empty($data['last_inserted_date']) ? Carbon::createFromFormat('Y-m-d', $data['last_inserted_date']) : null;
        $data['end_date'] = ! empty($data['end_date']) ? Carbon::createFromFormat('Y-m-d', $data['end_date']) : null;
        $data['user_id'] = auth()->user()->id;
        return Monthly::create($data);
    }

    public function getUnsertedMonthlyPurchases()
    {
        return Monthly::where('last_inserted_date' > now()->endOfMonth())
            ->orWhere('last_inserted_date', null)
            ->get();
    }
}
