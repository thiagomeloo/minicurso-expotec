<?php

namespace App\Livewire;

use Livewire\Attributes\Computed;
use App\Models\Tarefa;
use Livewire\Component;

class Tarefas extends Component
{
    public $titulo;
    public $descricao;
    public $buscar;

    public function salvar()
    {
        $tarefa = new Tarefa();
        $tarefa->titulo = $this->titulo;
        $tarefa->descricao = $this->descricao;
        $tarefa->save();

        $this->reset();

        $this->js('Swal.fire("Tarefa salva com sucesso.");');
    }

    public function finalizar($id)
    {
        $tarefa = Tarefa::find($id);
        $tarefa->data_finalizacao = now();
        $tarefa->update();

        $this->js('Swal.fire("Tarefa finalizada com sucesso.");');
    }

    public function reverter($id)
    {
        $tarefa = Tarefa::find($id);
        $tarefa->data_finalizacao = null;
        $tarefa->update();

        $this->js('Swal.fire("Tarefa restaurada com sucesso.");');
    }

    #[Computed]
    public function listarAtivas()
    {
        return Tarefa::whereNull('data_finalizacao')
        ->where('titulo','like',  "%".$this->buscar."%")
        ->get();
    }

    #[Computed]
    public function listarFinalizadas()
    {
        return Tarefa::whereNotNull('data_finalizacao')->get();
    }

    public function render()
    {
        return view('livewire.tarefas');
    }
}
