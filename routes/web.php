<?php
use  App\Http\Controllers\PinchController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\Auth\Logout;
use App\Http\Controllers\Auth\Login;

Route::get('/', [PinchController::class, 'index']);

Route::middleware('auth')->group(function(){
    Route::post('/pinches', [PinchController::class, 'store']);
    Route::get('/pinches/{pinch}/edit', [PinchController::class, 'edit']);
    Route::put('/pinches/{pinch}', [PinchController::class, 'update']);
    Route::delete('pinches/{pinch}', [PinchController::class, 'destroy']);
});

//REGISTER
Route::view('/register', 'auth.register')
    ->middleware('guest')
    ->name('register');

Route::post('/register', Register::class)
    ->middleware('guest');
//LOGOUT
Route::post('/logout', Logout::class)
    ->middleware('auth')
    ->name('logout');

//LOGIN
Route::view('/login', 'auth.login')
    ->middleware('guest')
    ->name('login');
Route::post('login', Login::class)
    ->middleware('guest');