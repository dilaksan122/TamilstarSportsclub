<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchFeature extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'date', 'time', 'location', 'event_id'];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
}
