<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'year',
        'genre',
        'country',
        'duration',
        'img_url',
    ];
    protected $casts = [
        'name' => 'string',
        'year' => 'integer',
        'genre' => 'string',
        'country' => 'string',
        'duration' => 'integer',
        'img_url' => 'string',
    ];
}

    public function Actors()
    {
        return $this->belongsToMany(Actor::class);
    }
}