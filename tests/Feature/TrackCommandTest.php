<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\Retailer;
use App\Models\Stock;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class TrackCommandTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_tracks_product_stock()
    {
        $switch = Product::create(['name' => 'Nintendo Switch']);

        $bestbuy = Retailer::create(['name' => 'Best Buy']);

        $this->assertFalse($switch->inStock());

        $stock = new Stock([
            'price' => 10000,
            'url' => 'http://foo.com',
            'sku' => '12345',
            'in_stock' => false
        ]);

        $bestbuy->addStock($switch, $stock);

        $this->assertFalse($stock->fresh()->in_stock);

        Http::fake(function() {
            return [
                'available' => true,
                'price' => 25000
            ];
        });

        $this->artisan('track');

        $this->assertTrue($stock->fresh()->in_stock);
    }
}
