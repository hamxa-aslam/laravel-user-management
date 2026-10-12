<?php
use App\Models\User;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', function () {
    $totalUsers = User::count();

    $adminCount = User::where('role', 'admin')->count();

    $regularUserCount = User::where('role', 'user')->count();

    $recentUsers = User::latest()
        ->take(5)
        ->get();

    return view('dashboard', compact(
        'totalUsers',
        'adminCount',
        'regularUserCount',
        'recentUsers'
    ));
})->middleware(['auth', 'verified'])->name('dashboard');



Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function() {
  Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
  Route::get('/users/create', [UserController::class, 'create'])->name('admin.users.create');
  Route::post('/users',[UserController::class, 'store'])->name('admin.users.store');
  Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
  Route::put('/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
  Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
    });
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


