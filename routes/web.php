<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MedecinController;
use App\Http\Controllers\RendezVousController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

// Health check route for UptimeRobot (pings Aiven MySQL)
Route::get('/health-check', function () {
    try {
        DB::connection()->getPdo();
        
        return response()->json([
            'status' => 'success',
            'database' => 'connected',
            'timestamp' => now()->toDateTimeString()
        ], 200);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'Database connection failed'
        ], 500);
    }
});

Route::get('/', function () {
    return view('home');
});

Route::get('/medecins', [MedecinController::class, 'index'])->name('medecins.index');

Route::get('/dashboard', function () {
    $rendezVous = \App\Models\RendezVous::where('user_id', Auth::id())->get();
    $enAttente = $rendezVous->where('statut', 'en_attente')->count();
    $confirmes = $rendezVous->where('statut', 'confirme')->count();

    return view('dashboard', compact('rendezVous', 'enAttente', 'confirmes'));
})->middleware(['auth', 'verified'])->name('dashboard');

// 1. ADMIN ROUTES (Must come BEFORE /medecins/{medecin})
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [MedecinController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/medecins/create', [MedecinController::class, 'create'])->name('medecins.create');
    Route::post('/medecins', [MedecinController::class, 'store'])->name('medecins.store');
    Route::get('/medecins/{medecin}/edit', [MedecinController::class, 'edit'])->name('medecins.edit');
    Route::put('/medecins/{medecin}', [MedecinController::class, 'update'])->name('medecins.update');
    Route::delete('/medecins/{medecin}', [MedecinController::class, 'destroy'])->name('medecins.destroy');
});

// 2. AUTHENTICATED & PUBLIC DOCTOR ROUTES
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Keep this wildcard route AFTER /medecins/create
    Route::get('/medecins/{medecin}', [MedecinController::class, 'show'])->name('medecins.show');
    Route::post('/medecins/{medecin}/avis', [MedecinController::class, 'storeAvis'])->name('medecins.avis.store');

    Route::get('/mes-rendez-vous', [RendezVousController::class, 'index'])->name('rendezvous.index');
    Route::get('/medecins/{medecin}/rendez-vous', [RendezVousController::class, 'create'])->name('rendezvous.create');
    Route::post('/rendez-vous', [RendezVousController::class, 'store'])->name('rendezvous.store');
    Route::delete('/rendez-vous/{rendezVous}', [RendezVousController::class, 'destroy'])->name('rendezvous.destroy');
});

require __DIR__.'/auth.php';