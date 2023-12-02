<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Tarefas;

Route::get('/', function () {
return redirect()->route('tarefas');
});

Route::get('/tarefas',Tarefas::class)->name('tarefas');
