<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sending;

class Statistic extends Model
{
    use HasFactory;
    
    public $timestamps = false;

    protected $fillable = [
        'sending_id',      
        'sent',    
        'delivered',
    ];

    public function sending()
    {
        return $this->belongsTo(Sending::class);
    }
}
