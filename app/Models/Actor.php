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
    ];
    protected $casts = [
        'name' => 'string',
        'surname' => 'string',
        'birthdate' => 'date',
        'country' => 'string',
        'img_url' => 'string',
    ];

    public function Films()
    {
        return $this->belongsToMany(Film::class);
    }
}
?>