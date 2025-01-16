<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model{
    
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'events';
    protected $fillable = [
        'event', 
        'start', 
        'end',
        'user_id'
    ];

    public function user () {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
