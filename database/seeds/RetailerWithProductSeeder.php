<?php

use App\Models\Product;
use App\Models\Retailer;
use App\Models\Stock;
use Illuminate\Database\Seeder;

class RetailerWithProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $switch = Product::create(['name' => 'Nintendo Switch']);

        $bestbuy = Retailer::create(['name' => 'Best Buy']);

        $bestbuy->addStock($switch, new Stock([
            'price' => 10000,
            'url' => 'http://foo.com',
            'sku' => '12345',
            'in_stock' => false
        ]));

    }
}
