@extends('tasks.layout')

@section('content')

<h2 class="text-3xl font-bold mb-6 text-gray-800">Minhas Tarefas</h2>

@if ($tasks->isEmpty())
    <p class="text-gray-500">Nenhuma tarefa encontrada.</p>
@else
    <!-- GRID DE CARDS -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($tasks as $task)
            <div class="w-full rounded-xl shadow-md p-4 flex flex-col justify-between hover:shadow-lg hover:-translate-y-1 transition bg-white">

                <div>
                    <a href="{{ route('tasks.edit', $task->id) }}">
                        <h3 class="font-semibold text-lg text-gray-800 mb-1">{{ $task->title }}</h3>
                        <p class="text-gray-500 text-xs mb-1">
                            Criado em: {{ $task->created_at->setTimezone('America/Sao_Paulo')->format('d/m/Y H:i') }}
                        </p>
                        <p class="text-gray-600 text-sm">{{ $task->description ?? 'Sem descrição.' }}</p>
                    </a>
                </div>

                <div class="flex justify-between items-center mt-4">
                    <span class="px-3 py-1 text-sm rounded-full 
                        {{ $task->deleted_at 
                            ? 'bg-gray-300 text-gray-700' 
                            : ($task->status === 'completed' 
                                ? 'bg-green-100 text-green-700' 
                                : 'bg-yellow-100 text-yellow-700') }}">
                        {{ $task->deleted_at ? 'Lixeira' : ucfirst($task->status) }}
                    </span>

                    <div class="flex gap-2">
                        @if ($task->deleted_at)
                            <form action="{{ route('tasks.restore', $task->id) }}" method="POST" onsubmit="return confirm('Deseja realmente restaurar esta tarefa?');">
                                @csrf
                                <button type="submit" class="bg-green-500 hover:bg-green-400 text-white px-3 py-1 rounded-lg text-sm">
                                    <i class="fi fi-tr-recycle-bin"></i>
                                </button>
                            </form>

                            <form action="{{ route('tasks.forceDelete', $task->id) }}" method="POST" onsubmit="return confirm('Deseja realmente apagar esta tarefa permanentemente?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-gray-700 hover:bg-gray-600 text-white px-3 py-1 rounded-lg text-sm">
                                    <i class="fi fi-tr-x"></i>
                                </button>
                            </form>
                        @else
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Deseja realmente apagar esta tarefa?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-400 text-white px-3 py-1 rounded-lg text-sm">
                                    <i class="fi fi-rr-trash"></i>
                                </button>
                            </form>
                        @endif
                    </div>
                </div>

            </div>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $tasks->links() }}
    </div>
@endif

@endsection
