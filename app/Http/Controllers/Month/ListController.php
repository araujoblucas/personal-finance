<?php

namespace App\Http\Controllers\Month;

use App\Http\Controllers\Controller;
use App\Services\MonthService;
use Illuminate\View\View;

class ListController extends Controller
{

    public function __construct(
        protected MonthService $monthService
    ) {
    }

    /**
     * Show the application dashboard.
     *
     * @return View
     */
    public function __invoke(): View
    {
        dd($purchases = $this->monthService->createRelatory());

        return view('monthly.list', compact('purchases'));
    }
}
