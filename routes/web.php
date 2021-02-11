<?php

use App\Models\Admin\Admin;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::get('/dashboard', function () {
    $getAllTokenCounts = Admin::count();
    $soldTokens = Admin::where('status', 'sold')->count();
    $usedTokens = Admin::whereNotNull('card_user')->count();
    $totalSchool = User::where('role', 'User')->count();
    return view('pages.dashboard', compact('getAllTokenCounts', 'soldTokens', 'totalSchool', 'usedTokens'));
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->prefix('admin')->group(function () {
    // All get Routes
    Route::get('/token', [AdminController::class, 'index'])->name('viewToken');
    Route::get('/my-tokens',  [UserController::class, 'getUserTokens'])->name('getUserTokens');
    // All Post Routes
    Route::post('/tokens', [AdminController::class, 'store'])->name('storeToken');
    //All Update Routes
    // All Delete Routes
    Route::delete('/delete-tokens/{token}', [AdminController::class, 'deleteToken'])->name('deleteToken');
});

Route::middleware('auth')->prefix('portal')->group(function () {
    // All get Routes
    Route::get('/register-user', [UserController::class, 'index'])->name('regUser');
    Route::get('/users',  [UserController::class, 'getUsers'])->name('getUsers');

    // All post Routes
    Route::post('/register-user', [UserController::class, 'store'])->name('regUser');
    Route::post('/change-password', [UserController::class, 'changePassword'])->name('changePassword');
    Route::delete('/delete-user/{user}', [UserController::class, 'deleteUser'])->name('deleteUser');
    Route::view('/change-password', 'pages.changePassword')->name('changePassword');
});

Route::resource('/tokens', TokenController::class);

require __DIR__.'/auth.php';
