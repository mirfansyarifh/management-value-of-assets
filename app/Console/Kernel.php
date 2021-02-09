<?php

namespace App\Console;

use App\Models\Auth\User\User;
use App\Models\Resources\Peminjaman\Peminjaman;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            auth()->loginUsingId(User::whereEmail('system@example.com')->get()->first()->id);
            Log::info('[Peminjaman Scheduler] logged in as System user');
            Peminjaman::whereStatus('approved')->get()->each(function (Peminjaman $peminjaman) {
                if ($peminjaman->sudah_lewat) {
                    $peminjaman->status = 'selesai';
                    $peminjaman->save();
                    Log::info('[Peminjaman Scheduler] Changed status of peminjaman with id: '. $peminjaman->id);
                }
            });
            auth()->logout();
            Log::info('[Peminjaman Scheduler] logged out as System user');
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
