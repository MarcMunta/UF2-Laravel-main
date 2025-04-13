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
        'created_at',
        'updated_at',
    ];
    protected $casts = [
        'name' => 'string',
        'year' => 'integer',
        'genre' => 'string',
        'country' => 'string',
        'duration' => 'integer',
        'img_url' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function Actors()
    {
        return $this->belongsToMany(Actor::class);
    }
}