<?php

namespace App\Console\Commands;

use App\Models\Monthly;
use App\Services\PendingMonthlyPurchasesService;
use App\Services\PurchaseService;
use Illuminate\Console\Command;

class MakePurchaseFromMonthlies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:create_from_monthlies';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(
        PurchaseService $purchaseService,
        PendingMonthlyPurchasesService $pendingPurchaseService
    ) {
        $start = now()->firstOfMonth()->startOfDay();

        $monthly_purchases = Monthly::whereNull('end_date')
            ->where('last_inserted_date', '<', $start)
            ->get();

        foreach ($monthly_purchases as $purchase) {

            $formatedPurchase = [
                'user_id' => $purchase->user_id,
                'reference' => now(),
                'description' => $purchase->description,
                'tags' => $purchase->tags,
                'paid_by' => $purchase->paid_by,
                'is_monthly' => true,
                'monthly_id' => $purchase->id
            ];

            $isNotPaid = ['pix', 'boleto'];

            if (in_array($formatedPurchase['paid_by'], $isNotPaid)) {
                $formatedPurchase['is_paid'] = false;
            }

            if (filter_var($purchase->same_price, FILTER_VALIDATE_BOOLEAN)) {
                $formatedPurchase['price'] = $purchase->price;

                $return = $purchaseService->storeFromMonthly($formatedPurchase);

                if ($return) {
                    $purchase->last_inserted_date = now();
                    $purchase->save();
                }
                continue;
            }

            $return = $pendingPurchaseService->store($formatedPurchase);

            if ($return) {
                $purchase->last_inserted_date = now();
                $purchase->save();
            }
        }
    }
}
