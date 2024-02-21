<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use Illuminate\Support\Facades\Http;
use App\Models\Sending;
use App\Models\Client;
use App\Models\Statistic;
use Carbon\Carbon;


class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {

       $schedule->call(function () {
            $sendings  = Sending::all();
            $clients   = Client::all();
            $todayDate = Carbon::now()->format('Y-m-d');

            foreach($sendings as $sending) {
                if($sending->addressee === 'allClients' && $sending->time === 'thenRadio') {
                    foreach($clients as $client) {
                        $searchingDate = date('Y-m-d', strtotime($client->date_of_birth. " - 7 day"));

                        if($searchingDate == $todayDate) {

                            $response = Http::post('http://smsc.ru/rest/send/', [
                                'login'  => $sending->login,
                                'psw'    => decrypt($sending->password),
                                'phones' => $client->phone,
                                'mes'    => $sending->text,
                            ]);

                            print_r($response);

                            $statistic = Statistic::where('sending_id', $sending->id);
                
                            $status = Http::post('http://smsc.ru/sys/status.php?', [
                                'login' => $sending->login,
                                'psw'   => decrypt($sending->password),
                                'phone' => $client->phone,
                                'id'    => $response->json('id'),
                            ])->json('status'); 
                
                            if($status == 0) {
                                $statistic->increment('sent');
                            } else if ($status == 1) {
                                $statistic->increment('sent');
                                $statistic->increment('delivered');
                            } 
                        }
                    }
                }
            }
        })->dailyAt('10:30');
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
