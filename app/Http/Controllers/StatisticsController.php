<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Statistic;

class StatisticsController extends Controller
{
    public function index() 
    {   
        $statistics = Statistic::all(); 

        return view('statistics', [
            "statistics" => $statistics
        ]);
        
    }

    public function save(Request $request) 
    {

        $topic = Topic::create([
            'title'     => request()->input('title'), 
            'text'      => request()->input('text'), 
            'author_id' => $user->id,
        ]);

        if($topic) {
            return redirect( route('topic.detail', ['id' => $topic->id]) );
        }

        return redirect( route('topic.create') )->withErrors([
            'topicCreateError' => 'topic creating error'
        ]);  
    }
}
