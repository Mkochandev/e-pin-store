<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Key;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function index(Request $request) 
    {
        $query = Key::where('is_sold', false)
            ->with(['game.categories', 'platform']);

        if ($request->filled('platform')) {
            $query->whereHas('platform', function($q) use ($request) {
                $q->where('slug', $request->platform);
            });
        }

        if ($request->filled('category')) {
            $query->whereHas('game.categories', function($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        if ($request->filled('q')) {
            $query->whereHas('game', function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->q . '%');
            });
        }

        $games = $query->select('game_id', 'platform_id', DB::raw('MIN(price) as current_price'), DB::raw('count(*) as stock'))
            ->groupBy('game_id', 'platform_id')
            ->paginate(12)
            ->withQueryString();

        $categories = Categories::withCount('games')->get();

        return view('web.pages.shop', compact('games', 'categories'));
    }
}