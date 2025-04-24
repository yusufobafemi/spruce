<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppLink extends Model
{
    protected $fillable = [
        'platform', // ← this is missing
        'url',
    ];
}
