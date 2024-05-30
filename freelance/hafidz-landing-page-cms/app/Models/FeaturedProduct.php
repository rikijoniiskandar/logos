<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeaturedProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'header',
        'subheader',
        'content',
        'image'
    ];

    protected $casts = [
        'content' => 'array', // Cast content to array
    ];
}

