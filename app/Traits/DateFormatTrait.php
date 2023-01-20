<?php

namespace App\Traits;

use Exception;
use Illuminate\Support\Carbon as CarbonClass;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

trait DateFormatTrait
{
    public function formatToInput($date)
    {
        try {
            return Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d') ?? null;
        } catch (Exception $exception) {
            return $date;
        }
    }

    public function formatToDatabase($date)
    {
        try {
            return Carbon::createFromFormat('Y-m-d', $date) ?? null;
        } catch (Exception $exception) {
            Log::debug("FAIL WITH " . $date . " e = " . $exception);
            return $date;
        }


    }
}
