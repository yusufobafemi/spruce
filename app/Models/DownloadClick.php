<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DownloadClick extends Model
{
    protected $fillable = [
        'platform',        // 👈 Allow mass assignment
        'ip_address',
        'user_agent',
    ];
}
