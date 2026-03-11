<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Key extends Model
{
    use HasFactory;
    protected $fillable = [
        'game_id',
        'user_id',
        'platform_id',
        'key_code',
        'price',
        'is_sold',
        'order_id',
    ];
    protected $with = ['game', 'platform'];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function platform()
    {
        return $this->belongsTo(Platform::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
