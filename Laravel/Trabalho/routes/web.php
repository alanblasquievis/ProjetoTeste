<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TarefasController;

Route::get('/tarefas', [TarefasController::class, 'index'])->name('tarefas.index');
Route::get('/tarefas/create', [TarefasController::class, 'create'])->name('tarefas.create');
Route::post('/tarefas', [TarefasController::class, 'store'])->name('tarefas.store');
route::delete('/tarefas/{id}', [TarefasController::class, 'destroy'])->name('tarefas.destroy');
Route::get('/tarefas/{id}/edit', [TarefasController::class, 'edit'])->name('tarefas.edit');
route::put('/tarefas/{id}', [TarefasController::class, 'update'])->name('tarefas.update');
