<?php
use App\Http\Controllers\TipostatusController;
use App\Http\Controllers\CursosController;
use Illuminate\Support\Facades\Route;

# Montando a rota, referente a cursos (prefix)
Route::prefix('cursos')->group(function () {
	# Montando a rota do método index referente a classe CursosController e criando um rename chamado curso.index e poderemos referenciar esse rename.
    Route::get('/', [CursosController::class, 'index'])->name('curso.index');
    // Cadastrar
    Route::get('/cadastrarCurso', [CursosController::class, 'cadastrarCurso'])->name('cadastrar.curso');
    Route::post('/cadastrarCurso', [CursosController::class, 'cadastrarCurso'])->name('cadastrar.curso');
    // Alterar
    Route::get('/atualizarCurso/{id}', [CursosController::class, 'atualizarCurso'])->name('atualizar.curso');
    Route::put('/atualizarCurso/{id}', [CursosController::class, 'atualizarCurso'])->name('atualizar.curso');
    Route::delete('/delete', [CursosController::class, 'delete'])->name('curso.delete');
    Route::post('/habilitar', [CursosController::class, 'habilitar'])->name('curso.habilitar');
});

Route::prefix('tipostatus')->group(function () {
	# Montando a rota do método index referente a classe TipostatusController e criando um rename chamado curso.index e poderemos referenciar esse rename.
    Route::get('/', [TipostatusController::class, 'index'])->name('tipostatus.index');
    // Cadastrar
    Route::get('/cadastrarTipostatus', [TipostatusController::class, 'cadastrarTipostatus'])->name('cadastrar.tipostatus');
    Route::post('/cadastrarTipostatus', [TipostatusController::class, 'cadastrarTipostatus'])->name('cadastrar.tipostatus');
    // Alterar
    Route::get('/atualizarTipostatus/{id}', [TipostatusController::class, 'atualizarTipostatus'])->name('atualizar.tipostatus');
    Route::put('/atualizarTipostatus/{id}', [TipostatusController::class, 'atualizarTipostatus'])->name('atualizar.tipostatus');
    Route::delete('/delete', [TipostatusController::class, 'delete'])->name('tipostatus.delete');
    Route::post('/habilitar', [TipostatusController::class, 'habilitar'])->name('tipostatus.habilitar');
});

Route::get('/', function () { return view('index'); });