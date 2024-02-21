<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sending extends Model
{
    use HasFactory;
    
    public $timestamps = false;

    protected $fillable = [
        'title',      
        'text',
        'login',      
        'password',     
        'addressee',
        'time',
    ];

    protected $hidden = [
        'password',
    ];
}
