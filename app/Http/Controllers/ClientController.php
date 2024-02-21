<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function create() 
    {
        return view('addClient');
    }

    public function save(Request $request) 
    {
        $request->validate([
            'name'          => ['required', 'string'],          
            'phone'         => ['required', 'size:11', 'unique:clients'],
            'email'         => ['required', 'string', 'email',  'unique:clients'],
            'inputDate'     => ['required', 'date'],   
        ]);

        $client = Client::create([
            'name'          => request()->input('name'),
            'phone'         => request()->input('phone'),
            'email'         => request()->input('email'),
            'date_of_birth' => request()->input('inputDate'),
        ]);

        if($client) {
            return redirect( route('client.all') );
        }

        return redirect( route('client.create') )->withErrors([
            'clientCreateError' => 'Ошибка'
        ]);  
    }

    public function index()
    {   
        $clients = Client::all(); 

        return view('clients', [
            "clients" => $clients
        ]);
    }

}
