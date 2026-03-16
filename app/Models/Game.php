<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'slug',
        'developer',
        'publisher',
        'description',
        'release_date',
        'rated_id',
    ];

    protected $with = ['rated', 'categories', 'gameModes'];

    public function categories()
    {
        return $this->belongsToMany(Categories::class);
    }

    public function gameModes()
    {
        return $this->belongsToMany(GameMode::class);
    }

    public function rated()
    {
        return $this->belongsTo(Rated::class);
    }
    public function keys()
    {
        return $this->hasMany(Key::class, 'game_id');
    }
    public function isFavoritedOnPlatform($platformId)
{
    if (!auth()->check()) {
        return false;
    }

    return \App\Models\Wishlist::where('user_id', auth()->id())
        ->where('game_id', $this->id)
        ->where('platform_id', $platformId)
        ->exists();
}
}
