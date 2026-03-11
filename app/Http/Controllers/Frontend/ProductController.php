<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Key;
use App\Models\Platform;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function detail($platform, $slug)
{
    
    $platformData = Platform::where('slug', $platform)->firstOrFail();
    $game = Game::where('slug', $slug)
        ->with(['categories', 'gameModes', 'rated'])
        ->firstOrFail();


    $keyInfo = Key::where('game_id', $game->id)
        ->where('platform_id', $platformData->id)
        ->where('is_sold', false)
        ->select(\DB::raw('MIN(price) as platform_price'), \DB::raw('count(*) as stock'))
        ->first();

    $price = $keyInfo->platform_price ?? $game->price;
    $stock = $keyInfo->stock ?? 0;

    return view('web.pages.product_detail', compact('game', 'platformData', 'price', 'stock'));
}
}

