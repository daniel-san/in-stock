<?php

namespace App\Clients;

use App\Models\Stock;
use Illuminate\Support\Facades\Http;

class Target implements Client {

    public function checkAvailability(Stock $stock)
    {
        //
    }
}
