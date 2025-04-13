<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $table = 'films';
    public function actors()
    {
        return $this->belongsToMany(Actor::class, 'films_actors');
    }
    public $timestamps = true;
}
