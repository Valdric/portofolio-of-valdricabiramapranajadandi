<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'tagline',
        'tags',
        'description',
        'external_url',
        'media',
        'order',
    ];

    protected $casts = [
        'tags' => 'array',
        'media' => 'array',
    ];
}
