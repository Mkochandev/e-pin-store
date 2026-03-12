<?php

use App\Http\Controllers\Panel\AdminController;
use App\Http\Controllers\Panel\AuthController;
use App\Http\Controllers\Panel\KeyController;
use App\Http\Controllers\Panel\GeneralController;
use App\Http\Controllers\Panel\GameController;
use App\Http\Controllers\Panel\SocialController;
use App\Http\Controllers\Panel\EditAboutController;
use App\Http\Controllers\Panel\EditContactController;
use App\Http\Controllers\Panel\CategoryController;
use App\Http\Controllers\Panel\ContactMessageController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => '', 'middleware' => ['auth:admin']], function () {

    Route::any('', [GeneralController::class, 'index'])->name('panel.index');

    Route::group(['prefix' => 'admin'], function () {
        Route::any('', [AdminController::class, 'list'])->name('panel.admin_list');
        Route::get('form/{unique?}', [AdminController::class, 'form'])->name('panel.admin_form');
        Route::post('form/{unique?}', [AdminController::class, 'save'])->name('panel.admin_save');
        Route::delete('delete', [AdminController::class, 'delete'])->name('panel.admin_delete');
    });

    Route::group(['prefix' => 'game'], function () {
        Route::any('', [GameController::class, 'list'])->name('panel.game_list');
        Route::get('form/{unique?}', [GameController::class, 'form'])->name('panel.game_form');
        Route::post('form/{unique?}', [GameController::class, 'save'])->name('panel.game_save');
        Route::delete('delete', [GameController::class, 'delete'])->name('panel.game_delete');
    });

    Route::group(['prefix' => 'key'], function () {
        Route::any('', [KeyController::class, 'list'])->name('panel.key_list');
        Route::get('form/{unique?}', [KeyController::class, 'form'])->name('panel.key_form');
        Route::post('form/{unique?}', [KeyController::class, 'save'])->name('panel.key_save');
        Route::delete('delete', [KeyController::class, 'delete'])->name('panel.key_delete');
    });

    Route::group(['prefix' => 'social'], function () {
        Route::any('', [SocialController::class, 'list'])->name('panel.social_list');
        Route::get('form/{unique?}', [SocialController::class, 'form'])->name('panel.social_form');
        Route::post('form/{unique?}', [SocialController::class, 'save'])->name('panel.social_save');
        Route::delete('delete', [SocialController::class, 'delete'])->name('panel.social_delete');
    });

    Route::group(['prefix' => 'about'], function () {
        Route::any('', [EditAboutController::class, 'list'])->name('panel.about_list');
        Route::get('form/{unique?}', [EditAboutController::class, 'form'])->name('panel.about_form');
        Route::post('form/{unique?}', [EditAboutController::class, 'save'])->name('panel.about_save');
        Route::delete('delete', [EditAboutController::class, 'delete'])->name('panel.about_delete');
    });

    Route::group(['prefix' => 'contact'], function () {
        Route::any('', [EditContactController::class, 'list'])->name('panel.contact_list');
        Route::get('form/{unique?}', [EditContactController::class, 'form'])->name('panel.contact_form');
        Route::post('form/{unique?}', [EditContactController::class, 'save'])->name('panel.contact_save');
        Route::delete('delete', [EditContactController::class, 'delete'])->name('panel.contact_delete');
    });
    Route::group(['prefix' => 'category'], function () {
        Route::any('', [CategoryController::class, 'list'])->name('panel.category_list');
        Route::get('form/{unique?}', [CategoryController::class, 'form'])->name('panel.category_form');
        Route::post('form/{unique?}', [CategoryController::class, 'save'])->name('panel.category_save');
        Route::delete('delete', [CategoryController::class, 'delete'])->name('panel.category_delete');
    });
    Route::group(['prefix' => 'contact_message'], function () {
        Route::any('', [ContactMessageController::class, 'list'])->name('panel.contact_message_list');
        Route::get('form/{unique?}', [ContactMessageController::class, 'form'])->name('panel.contact_message_form');
        Route::post('form/{unique?}', [ContactMessageController::class, 'save'])->name('panel.contact_message_save');
        Route::delete('delete', [ContactMessageController::class, 'delete'])->name('panel.contact_message_delete');
    });





    Route::get('profile', [AdminController::class, 'profile'])->name('panel.profile');
    Route::post('profile', [AdminController::class, 'profile_save'])->name('panel.profile_save');
});
Route::get('login', [AuthController::class, 'login'])->name('panel.login');
Route::post('login', [AuthController::class, 'access'])->name('panel.access');
Route::get('logout', [AuthController::class, 'logout'])->name('panel.logout');
