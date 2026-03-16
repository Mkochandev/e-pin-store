<?php

use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ShopController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Panel\PasswordController;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




Route::any('/cd-upload', function(Request $request){
    if($request->hasFile('upload'))
    {
        $originName = $request->file('upload')->getClientOriginalName();
        $fileName = pathinfo($originName, PATHINFO_FILENAME);
        $extension = $request->file('upload')->getClientOriginalExtension();
        $fileName = $fileName.'_'.time().'.'.$extension;

        if(strtolower($extension) != 'php')
        {
            $request->file('upload')->move(public_path('upload/other'), $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = URL::asset("/upload/other/$fileName");

            @header('Content-type: text/html; charset=utf-8');
            echo "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', 'Dosya başarılı şekilde yüklendi')</script>";
        } else {
            @header('Content-type: text/html; charset=utf-8');
            echo "<script>alert('İzin verilmeyen dosya uzantısı')</script>";
        }
    }
})->name("ck.upload");

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/product/{platform}/{game}', [ProductController::class,'detail'])->name('product.detail');
Route::get('/shop', [ShopController::class,'index'])->name('shop');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact/send', [ContactController::class, 'sendMessage'])->name('contact.send');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/checkout/{game}/{platform}', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/order/place', [CheckoutController::class, 'placeOrder'])->name('order.place');
    Route::get('/profile/orders', [ProfileController::class, 'orders'])->name('profile.orders');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/wishlist', [WishlistController::class, 'index'])->name('profile.wishlist');
    Route::post('/wishlist/toggle', [WishlistController::class, 'toggle'])->name('wishlist.toggle');
    Route::get('/profile/settings', [PasswordController::class, 'index'])->name('profile.settings');
    Route::post('/profile/settings', [PasswordController::class, 'update'])->name('profile.settings.update');
});