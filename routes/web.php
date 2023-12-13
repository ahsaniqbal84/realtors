<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ZmController;
use Illuminate\Foundation\Application;
use App\Http\Controllers\BcmController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeesController;

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

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/', function () {
    if (!auth()->check()) {
        return Inertia::render('Auth/Login');
    }

    return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('employee', EmployeeController::class)->except('show')->middleware(['auth', 'verified']);
Route::resource('team', TeamController::class)->middleware(['auth', 'verified']);
Route::resource('bcm', BcmController::class)->middleware(['auth', 'verified']);
Route::resource('zm', ZmController::class)->middleware(['auth', 'verified']);

// Route::get('/employees', [EmployeesController::class, 'index'])->name('employees.index');
// Route::get('/employees/create', [EmployeesController::class, 'create'])->name('employees.create');
// Route::post('/employees', [EmployeesController::class, 'store'])->name('employees.store');
// Route::get('/employees/{id}/edit', [EmployeesController::class, 'edit'])->name('employees.edit');
// Route::put('/employees/{id}', [EmployeesController::class, 'update'])->name('employees.update');
// Route::delete('/employees/{id}',[EmployeesController::class,'destroy'])->name('employees.destroy');





Route::middleware('auth')->group(function () {
    Route::get('/about', fn () => Inertia::render('About'))->name('about');

    Route::get('users', [UserController::class, 'index'])->name('users.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
