<?php

namespace App\Commands;

use App\Models\Product;
use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class TrackCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'track';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Track all product stock';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Product::all()->each->track();

        $this->info('All done');
    }

    /**
     * Define the command's schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}
