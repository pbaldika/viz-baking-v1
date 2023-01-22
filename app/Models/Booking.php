<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'email',
        'phone',
        'age',
        'dietary',
    ];

    protected $casts = [
        'name' => 'array',
        'email' => 'array',
        'phone' => 'array',
        'age' => 'array',
        'dietary' => 'array'
        ];

    protected $guarded = [];
}
