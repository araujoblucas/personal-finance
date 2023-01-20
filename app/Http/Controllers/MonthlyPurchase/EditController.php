<?php

namespace App\Http\Controllers\MonthlyPurchase;

use App\Http\Controllers\Controller;
use App\Models\Monthly;
use App\Traits\DateFormatTrait;
use Illuminate\Support\Carbon;

class EditController extends Controller
{
    use DateFormatTrait;

    public function __invoke(int $monthlyId)
    {
        $monthly = Monthly::where('id', $monthlyId)->first()->toArray();

//        $monthly->last_inserted_date = $this->formatToInput($monthly->last_inserted_date);
        $monthly['start_date'] = $this->formatToInput($monthly['start_date']);

        return view('monthly.edit', compact('monthly'));
    }
}
