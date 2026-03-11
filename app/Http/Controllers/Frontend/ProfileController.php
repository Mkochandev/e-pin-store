<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Key;
use App\Models\User;

class ProfileController extends Controller
{
    public function orders()
{
    $myKeys = Key::where('user_id', auth()->id())
                 ->where('is_sold', true)
                 ->with(['game', 'platform'])
                 ->latest('updated_at')
                 ->get();

    return view('web.user.order', compact('myKeys'));
}

public function index()
{
    $user = auth()->user();
    return view('web.user.profile', compact('user'));
}

}
