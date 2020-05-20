<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use RetailerWithProductSeeder;
use Tests\TestCase;

class TrackCommandTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_tracks_product_stock()
    {
        $this->seed(RetailerWithProductSeeder::class);

        $this->assertFalse(Product::first()->inStock());

        Http::fake(function() {
            return [
                'available' => true,
                'price' => 25000
            ];
        });

        $this->artisan('track')->expectsOutput('All done');

        $this->assertTrue(Product::first()->inStock());
    }
}
