<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Platform;
use App\Models\Key;
use App\Models\Order;

class CheckoutController extends Controller
{
    public function index($gameId, $platformId)
    {
        $game = Game::findOrFail($gameId);
        $platform = Platform::findOrFail($platformId);

        $keyInfo = Key::where('game_id', $gameId)
            ->where('platform_id', $platformId)
            ->where('is_sold', false)
            ->firstOrFail();

        return view('web.pages.checkout', compact('game', 'platform', 'keyInfo'));
    }

    public function placeOrder(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Sipariş vermek için önce giriş yapmalısınız.');
        }

        $key = Key::where('game_id', $request->game_id)
            ->where('platform_id', $request->platform_id)
            ->where('is_sold', false)
            ->first();

        if (!$key) {
            return back()->with('error', 'Stok tükendi.');
        }

        Order::create([
            'user_id' => auth()->id(),
            'key_id' => $key->id,
            'total_price' => $key->price,
            'status' => 'completed'
        ]);

        $key->update(['is_sold' => true, 'user_id' => auth()->id()]);

        return redirect()->route('profile.orders')->with('success', 'Siparişiniz başarıyla tamamlandı!');
    }
}
