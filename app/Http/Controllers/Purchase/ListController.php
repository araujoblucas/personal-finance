<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use App\Http\Requests\PurchaseListRequest;
use App\Models\Purchase;

class ListController extends Controller
{

    public function __invoke(PurchaseListRequest $request)
    {
        $date = $request->validated();
        if (empty($date)) {
            $purchases = Purchase::where("reference", '<=', now()->lastOfMonth())
                ->where("reference", '>=', now()->firstOfMonth()->startOfDay())
                ->orderByDesc('reference')->get();

            return view('purchase.list', compact("purchases"));
        }

        $start = now()->setMonth($date['month'])->setYear($date['year'])
            ->firstOfMonth()->startOfDay();

        $end = now()->setMonth($date['month'])->setYear($date['year'])
            ->lastOfMonth()->endOfDay();

        $purchases = Purchase::where("reference", '>=', $start)
            ->where("reference", '<=', $end)
            ->orderByDesc('reference')->get();

        return view('purchase.list', compact("purchases"));
    }
}
