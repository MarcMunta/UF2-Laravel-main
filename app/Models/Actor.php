<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Actor extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'surname',
        'birthdate',
        'country',
        'img_url',
        'created_at',
        'updated_at',
    ];
    protected $casts = [
        'name' => 'string',
        'surname' => 'string',
        'birthdate' => 'date',
        'country' => 'string',
        'img_url' => 'string',
        'created_at' => 'datetime',
        'updated_at'  => 'datetime',
    ];


    public function Films()
    {
        return $this->belongsToMany(Film::class);
    }
}
?>