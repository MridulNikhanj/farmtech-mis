<?php

use App\Http\Controllers\CategoryCotroller;
use App\Http\Controllers\CropController;
use App\Http\Controllers\FarmController;
use App\Http\Controllers\farmCropController;
use App\Http\Controllers\farmRegisterController;
use App\Http\Controllers\LeaseController;
use App\Http\Controllers\NoteControlller;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FarmerController;
use App\Http\Controllers\SchemeController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\AssistanceController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GetTrainedController;
use Illuminate\Support\Facades\Mail;

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
    return view('dashboard');
})->name('dashboard');

Route::resource('crop', CropController::class);
Route::resource('category', CategoryCotroller::class);
Route::resource('farm', FarmController::class);
Route::resource('note', NoteControlller::class);
Route::resource('lease', LeaseController::class);
Route::resource('farm-crop', farmCropController::class);
Route::resource('register', farmRegisterController::class);

Route::group(['middleware'=>['auth']] ,function(){

});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/farmer-registration', [FarmerController::class, 'register'])->name('farmer.register');
Route::get('/government-schemes', [SchemeController::class, 'index'])->name('schemes');
Route::get('/assistance', [AssistanceController::class, 'index'])->name('assistance');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('/get-trained', [GetTrainedController::class, 'index'])->name('get-trained');

Route::prefix('farmerregistration')->group(function () {
    Route::get('/', [FarmerController::class, 'index'])->name('farmer.index');
    Route::get('/create', [FarmerController::class, 'create'])->name('farmer.create');
    Route::post('/store', [FarmerController::class, 'store'])->name('farmer.store');
    Route::get('/{farmer}', [FarmerController::class, 'show'])->name('farmer.show');
    Route::get('/{farmer}/edit', [FarmerController::class, 'edit'])->name('farmer.edit');
    Route::put('/{farmer}', [FarmerController::class, 'update'])->name('farmer.update');
    Route::delete('/{farmer}', [FarmerController::class, 'destroy'])->name('farmer.destroy');
});

// Test route for email functionality
Route::get('/test-email', function () {
    try {
        // Log the current mail configuration
        \Log::info('Mail Configuration:', [
            'driver' => config('mail.default'),
            'host' => config('mail.mailers.smtp.host'),
            'port' => config('mail.mailers.smtp.port'),
            'encryption' => config('mail.mailers.smtp.encryption'),
            'username' => config('mail.mailers.smtp.username'),
            'from_address' => config('mail.from.address'),
        ]);

        Mail::to('nikhanjmridul@gmail.com')->send(new \App\Mail\WelcomeMail('Test User'));
        return 'Test email sent successfully!';
    } catch (\Exception $e) {
        return 'Error sending email: ' . $e->getMessage() . 
               '<br>File: ' . $e->getFile() . 
               '<br>Line: ' . $e->getLine();
    }
});

