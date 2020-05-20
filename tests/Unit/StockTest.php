<?php

namespace Tests\Unit;

use App\Clients\ClientNotFoundException;
use App\Models\Retailer;
use App\Models\Stock;
use RetailerWithProductSeeder;
use Tests\TestCase;

class StockTest extends TestCase
{
    /** @test */
    public function it_throws_an_exception_if_a_client_is_not_found_when_tracking()
    {
        $this->seed(RetailerWithProductSeeder::class);

        Retailer::first()->update(['name' => 'Foo Retailer']);

        $this->expectException(ClientNotFoundException::class);

        Stock::first()->track();
    }
}
