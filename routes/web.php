<?php

use App\Http\Controllers\DepartamentosController;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/employees', function () {
    return view('employees');
})->middleware(['auth', 'verified'])->name('employees');

Route::middleware('auth')->group(function () {
    // Rutas perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //rutas empleados
    Route::get('/employees', [EmpleadosController::class, 'index'])->name('employees.index');
    Route::get('/employees/{user}/edit', [EmpleadosController::class, 'edit'])->name('employees.edit');
    Route::put('/employees/{user}', [EmpleadosController::class, 'update'])->name('employees.update');
    Route::delete('/employees/{user}', [EmpleadosController::class, 'destroy'])->name('employees.destroy');
    Route::get('/employees/create', [EmpleadosController::class, 'create'])->name('employees.create');
    Route::get('/employees', [EmpleadosController::class, 'store'])->name('employees.store');

    //rutas departamentos
    Route::get('/departments', [DepartamentosController::class, 'index'])->name('departments.index');
    Route::get('/departments/filter-users', [DepartamentosController::class, 'filterUsers'])->name('departments.filterUsers');
    Route::delete('/departments/{dpto}', [DepartamentosController::class, 'deleteUsers'])->name('departments.deleteUsers');
    Route::get('/departments/{user}/edit', [DepartamentosController::class, 'edit'])->name('departments.edit');
    Route::put('/departments/{dpto}', [DepartamentosController::class, 'updatee'])->name('departments.update');

});
//ruta api para obtener los departamentos
Route::get('/api/departamentos', function () {
    $response = Http::get('https://www.datos.gov.co/resource/xdk5-pm3f.json');
    $departamentos = $response->json();

    // Extraer el nombre de los departamentos y eliminar duplicados
    $departamentoNombres = [];
    foreach ($departamentos as $departamento) {
        $nombre = $departamento['departamento'];
        $departamentoNombres[$nombre] = ['name' => $nombre];
    }

    // Convertir el array asociativo a un array simple
    $departamentoNombres = array_values($departamentoNombres);

    // Ordenar los departamentos por nombre
    sort($departamentoNombres);


    return response()->json($departamentoNombres);
});

require __DIR__.'/auth.php';
