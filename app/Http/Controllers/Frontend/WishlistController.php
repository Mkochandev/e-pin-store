<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlistItems = Wishlist::where('user_id', Auth::id())
            ->with(['game', 'platform'])
            ->latest()
            ->get();

        return view('web.user.wishlist', compact('wishlistItems'));
    }

    public function toggle(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Önce giriş yapmalısınız.'], 401);
        }

        $userId = Auth::id();
        $gameId = $request->game_id;
        $platformId = $request->platform_id;

        $exists = Wishlist::where('user_id', $userId)
            ->where('game_id', $gameId)
            ->where('platform_id', $platformId)
            ->first();

        if ($exists) {
            $exists->delete();
            return response()->json([
                'status' => 'removed',
                'message' => 'Ürün favorilerinizden kaldırıldı.'
            ]);
        } else {
            Wishlist::create([
                'user_id' => $userId,
                'game_id' => $gameId,
                'platform_id' => $platformId
            ]);
            return response()->json([
                'status' => 'added',
                'message' => 'Ürün favorilerinize eklendi.'
            ]);
        }
    }
}