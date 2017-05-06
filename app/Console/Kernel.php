<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Task;

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
        //get all active tasks from db
        $tasks = Task::where('active', 1)->get();

        foreach ($tasks as $task)
        {
            # minute (m), hour (h), day of month (dom), month (mon) and day of week (dow)
            $schedule->exec($task->command)
                        ->evenInMaintenanceMode()
                        ->cron( $task->minute           . ' ' .
                                $task->hour             . ' ' .
                                $task->day_of_month     . ' ' .
                                $task->month            . ' ' .
                                $task->day_of_week);
        }

    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
