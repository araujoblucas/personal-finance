<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Month;
use App\Models\Monthly;
use App\Models\PendingMonthlyPurchase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        Monthly::factory()->create(['last_inserted_date' => now()->subMonth()]);

        $app = app()->make('App\Console\Commands\MakePurchaseFromMonthlies');
        $service1 = app()->make('App\Services\PurchaseService');
        $service2 = app()->make('App\Services\PendingMonthlyPurchasesService');
        $app->handle($service1, $service2);

        dd(PendingMonthlyPurchase::all());
//        $response = $this->get('/');

//        $response->assertStatus(200);
    }
}
