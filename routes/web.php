<?php

use App\Http\Controllers\AdsController;
use App\Http\Controllers\BotAdsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\TelegramBotController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->middleware('auth')->name('home');

Route::post('/telegram/webhook', [TelegramBotController::class, 'handleWebhook']);

Route::get('/get-new-movies', [TelegramBotController::class, 'getNewMovies']);

Route::get('/telegram/get-updates', [TelegramBotController::class, 'getUpdates'])->name('get-updates');

Route::get('/admin', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('index');

// Profilni boshqarish (faqat autentifikatsiyadan o'tganlar uchun)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

   Route::resource('movies', MovieController::class);
   Route::resource('bots', BotAdsController::class);
   Route::resource('ads', AdsController::class);
});
   Route::resource('statistic', StatisticsController::class);

require __DIR__.'/auth.php';
