<?php

use App\Models\Admin\Admin;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\UserController;
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


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::get('/', function () {
    $getAllTokenCounts = Admin::count();
    $soldTokens = Admin::where('status', 'sold')->count();
    $usedTokens = Admin::whereNotNull('card_user')->count();
    $totalSchool = User::where('role', 'Standard')->count();
    return view('pages.dashboard', compact('getAllTokenCounts', 'soldTokens', 'totalSchool', 'usedTokens'));
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth', 'can:isAdmin'])->prefix('admin')->group(function () {
    // All get Routes
    Route::get('/token', [AdminController::class, 'index'])->name('viewToken');
    Route::get('/users',  [AdminController::class, 'getUsers'])->name('getUsers');
    Route::get('/edit-user/{user}',  [AdminController::class, 'editUser'])->name('editUser');
    // All Post Routes
    Route::post('/tokens', [AdminController::class, 'store'])->name('storeToken');
    Route::post('/register-user', [AdminController::class, 'storeUser'])->name('regUser');
    //All Update Routes
    Route::post('/update-user/{user}', [AdminController::class, 'updateUser'])->name('updateUser');
    // All Delete Routes
    Route::delete('/delete-tokens/{token}', [AdminController::class, 'deleteToken'])->name('deleteToken');
    Route::delete('/delete-user/{user}', [AdminController::class, 'deleteUser'])->name('deleteUser');
});

Route::middleware('auth')->prefix('portal')->group(function () {
    // All get Routes
    Route::get('/my-tokens',  [UserController::class, 'getUserTokens'])->name('getUserTokens');
    // All post Routes
    Route::post('/change-password', [UserController::class, 'changePassword'])->name('changePassword');
    Route::view('/change-password', 'pages.changePassword')->name('changePassword');
});

Route::resource('/tokens', TokenController::class);

require __DIR__ . '/auth.php';
