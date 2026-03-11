<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rated extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'image',
    ];

    protected function game()
    {
        return $this->hasMany(Game::class);
    }
}
