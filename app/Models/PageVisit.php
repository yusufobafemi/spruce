<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PageVisit extends Model
{
    use HasFactory;

    protected $fillable = ['url', 'ip_address', 'user_agent'];
}
