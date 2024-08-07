<?php

use App\Http\Controllers\CampaignController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServerConfigurationController;
use App\Http\Controllers\TemplateController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Artisan;


Route::get('migrate', function () {
    try {
        // Capture the output of the Artisan command
        $output = Artisan::output();

        // Run the migration
        Artisan::call('migrate');

        // Log the output for debugging
        Log::info('Migrate output: ' . $output);

        return "Migrations completed successfully";
    } catch (\Exception $e) {
        // Log the error
        Log::error('Migrate failed: ' . $e->getMessage());

        return "Migrations Failed: " . $e->getMessage();
    }
});

Route::get('migrate-fresh', function () {
    try {
        // Capture the output of the Artisan command
        $output = Artisan::output();

        // Run the migration
        Artisan::call('migrate:fresh');

        // Log the output for debugging
        Log::info('Migrate fresh output: ' . $output);

        return "Migrations completed successfully";
    } catch (\Exception $e) {
        // Log the error
        Log::error('Migrate fresh failed: ' . $e->getMessage());

        return "Migrations Failed: " . $e->getMessage();
    }
});

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });
Route::inertia('/', 'Home');


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::inertia('/', 'Dashboard')->name('dashboard');
        Route::inertia('/settings', 'AccountSettings');

        //Templates
        Route::resource('templates', TemplateController::class);
        // Route::prefix('templates')->group(function () {
        // Route::get('/', [TemplateController::class, 'index']);
        // Route::get('/', [TemplateController::class, 'index']);
        // Route::get('/', [TemplateController::class, 'index']);
        // Route::inertia('/new', 'CreateTemplate');
        // Route::get('/{id}/edit', [TemplateController::class, 'edits'])->name('templates.edit');
        // });

        //Campaigns
        Route::resource('campaigns', CampaignController::class);
        // Route::prefix('campaigns')->group(function () {
        //     Route::get('/', [CampaignController::class, 'index']);
        //     Route::get('/new', [CampaignController::class, 'create']);
        //     Route::post('/', [CampaignController::class,'store']);
        //     Route::get('/{id}/edit', [CampaignController::class, 'edit'])->name('campaigns.edit');
        // });
        //Server Config
        Route::resource('server-config', ServerConfigurationController::class);

        //Contacts
        Route::post('/contacts/bulk-upload', [ContactController::class, 'bulkUpload'])->name('contacts.bulkUpload');
        Route::post('/contacts/bulk-delete', [ContactController::class, 'bulkDelete'])->name('contacts.bulkDelete');
        Route::get('contacts/export', [ContactController::class, 'export'])->name('contacts.export');
        Route::resource('contacts', ContactController::class);

        Route::middleware('auth')->group(function () {
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        });

    });


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/templates', TemplateController::class);
});

// Route::resource('contacts', ContactController::class);
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
