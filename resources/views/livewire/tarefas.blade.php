<div class="grid w-2/3 grid-cols-2 gap-8 p-4 mx-auto mt-4 shadow-xl h-1/2 bg-gray-50 rounded-xl">

<form class="col-span-2" wire:submit="salvar">
    <div class="mb-2">
        <label for="titulo" class="block mb-2 text-sm font-medium text-gray-900">
            Titulo
        </label>
        <input type="text" wire:model="titulo" id="titulo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
    </div>
    <div class="mb-2">
        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">
        Descrição
        </label>
        <textarea wire:model="descricao" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" ></textarea>
    </div>
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">
        Salvar
    </button>
</form>


    <div class="p-2 border rounded-lg">
        <p class="text-lg font-semibold">Tarefas</p>
        <div class="overflow-auto max-h-72">
            <div>
                <div class="mb-2">
                    <label for="buscar" class="block mb-2 text-sm font-medium text-gray-900">
                        Buscar
                    </label>
                    <input type="text" wire:model.live="buscar" id="buscar" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>
            </div>
            @foreach($this->listarAtivas as $tarefaAtiva)
            <div class="p-1 border">
                      <div class="flex justify-between w-full">
                          {{$tarefaAtiva->titulo}}
                          <i class="px-2 text-green-600 cursor-pointer" wire:click='finalizar({{$tarefaAtiva->id}})'>ok</i>
                      </div>
                      <p class="text-xs">
                          {{$tarefaAtiva->descricao}}
                      </p>
                  </div>
            @endforeach
        </div>
    </div>

    <div class="p-2 border rounded-lg">
        <p class="text-lg font-semibold">Tarefas Finalizadas</p>
        <div class="overflow-auto max-h-72">
        @foreach ($this->listarFinalizadas as $tarefaFinalizada)
                <div class="p-1 border">
                    <div class="flex justify-between w-full">
                        {{$tarefaFinalizada->titulo}}
                        <i class="px-2 text-orange-600 cursor-pointer" wire:click='reverter({{$tarefaFinalizada->id}})'><</i>
                    </div>
                    <p class="text-xs">
                        {{$tarefaFinalizada->descricao}}
                    </p>
                </div>
            @endforeach
        </div>
    </div>

</div>
