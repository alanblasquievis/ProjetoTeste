<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefasController extends Controller
{
    public function index() {
        $tarefas = Tarefa::all();
        return view('tarefas', compact('tarefas'));
    }

    public function create() {
        return view('create'); // Verifique se 'create' corresponde ao arquivo correto
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:55',
            'description' => 'required|string|max:255',
            'date' => 'required|date',
        ]);

        Tarefa::create($validatedData);

        return redirect()->route('tarefas.index')->with('success', 'Tarefa criada com sucesso');
    }

    public function destroy($id)
    {
        $tarefa = Tarefa::findOrFail($id);
        $tarefa->delete();


        return redirect()->route('tarefas.index')->with('success', 'Tarefa excluída com sucesso');
    }

    public function edit($id)
    {
        $tarefa = Tarefa::findOrFail($id);
        return view('edit', compact('tarefa')); // Verifique se a view está no mesmo diretório
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:55',
            'description' => 'required|string|max:255',
            'date' => 'required|date',
        ]);

        $tarefa = Tarefa::findOrFail($id);
        $tarefa->update($validatedData);

        return redirect()->route('tarefas.index')->with('success', 'Tarefa atualizada com sucesso');
    }
}
