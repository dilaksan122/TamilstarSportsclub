<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'date', 'description'];

    public function matchFeatures()
    {
        return $this->hasMany(MatchFeature::class, 'event_id');
    }
}
