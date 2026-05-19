<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use App\Models\Project;

Route::get('/', function () {
    $projects = Project::latest()->get();
    return view('welcome', compact('projects'));
});

// Route untuk melihat detail portfolio (Inilah yang error tadi)
Route::get('/project/{project:slug}', [ProjectController::class, 'show'])->name('project.show');


// 2. HALAMAN ADMIN & CRUD (Hanya bisa diakses jika sudah Login)
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Dashboard Admin
    Route::get('/dashboard', function () {
        $projects = Project::latest()->get();
        return view('dashboard', compact('projects'));
    })->name('dashboard');

    // Proses CRUD Portofolio
    Route::post('/projects/upload', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');

    // Pengaturan Profil Bawaan Breeze
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
