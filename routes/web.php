<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeTaskController;

// Rutas públicas
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Rutas de autenticación (sin estar logeado)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');
    
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.store');
});

// Logout (solo si estás logeado)
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// Rutas protegidas (solo usuarios logeados)
Route::middleware('auth')->group(function () {
    // CRUD de tareas - Lista, crear, editar, eliminar
    Route::resource('tasks', HomeTaskController::class);
    
    // Ruta adicional para marcar como completada
    Route::patch('tasks/{task}/toggle', [HomeTaskController::class, 'toggleComplete'])
        ->name('tasks.toggle');
});

// Ruta de ninjas (ejemplo anterior)
Route::get('/ninjas', function(){
    $ninjas = [
        ["name" => "mario","skill" => "Karate"],
        ["name" => "luigi","skill" => "Karate"],
        ["name" => "yoshi","skill" => "Karate"],
    ];
    return view('ninjas.index', ["Greeting" => "Hello Ninjas","ninjas" => $ninjas]);
});
