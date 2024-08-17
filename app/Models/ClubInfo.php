<?php

// app/Models/ClubInfo.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClubInfo extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'phoneNo', 'email', 'logoImage'];
}
