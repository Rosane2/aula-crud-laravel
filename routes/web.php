<?php
# Tem que incluir o arquivo da classe aqui 
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\TurnoController;
use App\Http\Controllers\SemestreController;
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


Route::prefix('semestre')->group(function () {
    Route::get('/', [SemestreController::class, 'index'])->name('semestre.index');
    // Cadastrar
    Route::get('/cadastrarSemestre', [SemestreController::class, 'cadastrarSemestre'])->name('cadastrar.semestre');
    Route::post('/cadastrarSemestre', [SemestreController::class, 'cadastrarSemestre'])->name('cadastrar.semestre');
    // Alterar
    Route::delete('/delete', [SemestreController::class, 'delete'])->name('semestre.delete');
    Route::post('/habilitar', [SemestreController::class, 'habilitar'])->name('semestre.habilitar'); 
});

Route::prefix('turno')->group(function () {
    Route::get('/', [TurnoController::class, 'index'])->name('turno.index');
    // Cadastrar
    Route::get('/cadastrarTurno', [TurnoController::class, 'cadastrarTurno'])->name('cadastrar.turno');
    Route::post('/cadastrarTurno', [TurnoController::class, 'cadastrarTurno'])->name('cadastrar.turno');
    // Alterar
    Route::delete('/delete', [TurnoController::class, 'delete'])->name('turno.delete');
    Route::post('/habilitar', [TurnoController::class, 'habilitar'])->name('turno.habilitar'); 
});

Route::prefix('aluno')->group(function () {
    Route::get('/', [AlunoController::class, 'index'])->name('aluno.index');
    // Cadastrar
    Route::get('/cadastrarAluno', [AlunoController::class, 'cadastrarAluno'])->name('cadastrar.aluno');
    Route::post('/cadastrarAluno', [AlunoController::class, 'cadastrarAluno'])->name('cadastrar.aluno');
    // Alterar
    Route::get('/atualizarAluno/{id}', [AlunoController::class, 'atualizarAluno'])->name('atualizar.aluno');
    Route::put('/atualizarAluno/{id}', [AlunoController::class, 'atualizarAluno'])->name('atualizar.aluno');
    Route::delete('/delete', [AlunoController::class, 'delete'])->name('aluno.delete');
    Route::post('/habilitar', [AlunoController::class, 'habilitar'])->name('aluno.habilitar'); 
});

Route::get('/', function () { return view('index'); });