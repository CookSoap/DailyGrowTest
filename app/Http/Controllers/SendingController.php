<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Sending;
use App\Models\Client;
use App\Models\Statistic;
use Carbon\Carbon;

class SendingController extends Controller
{
    public function create() 
    {
        return view('sending');
    }

    public function save(Request $request) 
    {
        $request->validate([
            'title'            => ['required', 'string'],          
            'text'             => ['required', 'string', 'max:255'],
            'login'            => ['required'],
            'password'         => ['required', 'string', 'min:6'],
            'flexRadioClients' => ['required'],
            'flexRadioDefault' => ['required'],
        ]);

        $sending = Sending::create([
            'title'     => request()->input('title'), 
            'text'      => request()->input('text'), 
            'login'     => request()->input('login'), 
            'password'  => encrypt(request()->input('password')), 
            'addressee' => request()->input('flexRadioClients'),
            'time'      => request()->input('flexRadioDefault'), 
        ]);

        if($sending) {
            $statistic = Statistic::create([
                'sending_id' => $sending->id, 
            ]);

            if($sending->time == 'rightNowRadio') {
                $id = $this->sendRightNow($sending);

                $status = $this->checkStatus($sending, $id);

                if($status == 0) {
                    $statistic->increment('sent');
                } else if ($status == 1) {
                    $statistic->increment('sent');
                    $statistic->increment('delivered');
                }
            }

            return redirect( route('statistics.index' ) );
        }

        return redirect( route('sending.create') )->withErrors([
            'sendingCreateError' => 'Ошибка'
        ]);  
    }

    public function sendRightNow($sending) {
        if($sending->addressee === 'allClients') {
            $phones = [];

            $clients = Client::all();

            foreach($clients as $client) {
                $phones[] = $client->phone;
            }
        }

        $response = Http::post('http://smsc.ru/rest/send/', [
            'login'  => $sending->login,
            'psw'    => decrypt($sending->password),
            'phones' => implode(",", $phones),
            'mes'    => $sending->text,
        ]);

        return $response->json('id');
    }

    public function checkStatus($sending, $id) {
        if($sending->addressee === 'allClients') {
            $phones = [];

            $clients = Client::all();

            foreach($clients as $client) {
                $phones[] = $client->phone;
            }
        }

        $response = Http::post('http://smsc.ru/sys/status.php?', [
            'login' => $sending->login,
            'psw'   => decrypt($sending->password),
            'phone' => implode(",", $phones),
            'id'    => $id,
        ]);

        return $response->json('status');
    } 
}
