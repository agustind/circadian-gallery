<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ArtworkController;
use App\Http\Controllers\AuctionController;
use App\Http\Controllers\BlockchainController;
use App\Models\Application;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/signup', function(){

    $application = new Application;
    $application->name = request('name');
    $application->email = request('email');
    $application->social = request('social');
    $application->work = request('work');
    $application->save();

});

Route::middleware(['web', 'auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/artwork', [ArtworkController::class, 'myArtwork'])->name('artwork');
    Route::get('/artwork/submit', [ArtworkController::class, 'submit'])->name('artworkSubmit');
    Route::post('/artwork', [ArtworkController::class, 'store'])->name('artworkStore');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::post('/upload-files', [ArtworkController::class, 'uploadFiles']);
    Route::get('/auction', [AuctionController::class, 'auction'])->name('auction');
    Route::get('/setup-auction', [AuctionController::class, 'setupAuction'])->name('setup-auction');

});

Route::get('/bid/{tx}', [AuctionController::class, 'placeBid'])->name('placeBid');
Route::get('/bids', [AuctionController::class, 'bids'])->name('bids');

Route::get('/auction', [AuctionController::class, 'auction'])->name('auction');

Route::get('/blockchain', [BlockchainController::class, 'sync']);


Route::get('/nft/{nft}', [BlockchainController::class, 'nftData']);


require __DIR__.'/auth.php';
