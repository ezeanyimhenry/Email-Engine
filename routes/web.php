<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TemplateController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/login-default', function () {
    $user = User::first();
    
    if ($user) {
        Auth::login($user);
        return redirect()->route('dashboard'); // Redirect to a route after authentication
    }

    return 'Default user not found.';
});

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return
// });
Route::inertia('/', 'Home');
Route::inertia('/login', 'Login');
Route::inertia('/dashboard', 'Dashboard')->name('dashboard');
Route::inertia('/dashboard/settings', 'EmailTemplates');
Route::get('/templates/{id}/edit', [TemplateController::class, 'edits'])->name('templates.edit');
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/templates', TemplateController::class);
});

Route::resource('contacts', ContactController::class);

require __DIR__.'/auth.php';
