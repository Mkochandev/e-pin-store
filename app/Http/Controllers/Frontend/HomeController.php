<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Game;
use App\Models\Key;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
{
    $latestGames = Key::where('is_sold', false)
        ->with(['game', 'platform']) 
        ->select('game_id', 'platform_id', \DB::raw('MIN(price) as current_price'), \DB::raw('count(*) as stock'))
        ->groupBy('game_id', 'platform_id')
        ->latest()
        ->take(8)
        ->get();

    $popularGames = Key::where('is_sold', false)
        ->with(['game', 'platform']) 
        ->select('game_id', 'platform_id', \DB::raw('MIN(price) as current_price'), \DB::raw('count(*) as stock'))
        ->groupBy('game_id', 'platform_id')
        ->inRandomOrder()
        ->take(6)
        ->get();

    return view('web.pages.home', compact('latestGames', 'popularGames'));
}
}
