@extends('tasks.layout')

@section('content')

    <h2 class="text-3xl font-bold mb-6 text-gray-800">Minhas Tarefas</h2>

    @if ($tasks->isEmpty())
        <p class="text-gray-500">Nenhuma tarefa encontrada.</p>
    @else
        @foreach ($tasks as $task)
            <div class="w-full rounded-lg shadow-md p-4 flex flex-col gap-2 hover:bg-gray-100 transition mb-4">

                <div class="flex justify-between items-center">
                    <div class="task-content cursor-pointer">
                        <a href="{{ route('tasks.edit', $task->id) }}">
                            <h3 class="font-semibold text-lg text-gray-800">{{ $task->title }}</h3>
                            <p class="text-gray-500 text-xs mb-1">Criado em: {{ $task->created_at->format('d/m/Y H:i') }}</p>
                            <p class="text-gray-600 text-sm">{{ $task->description ?? '' }}</p>
                        </a>
                    </div>

                    <div class="flex gap-2">
                        @if ($task->deleted_at)

                            <form action="{{ route('tasks.restore', $task->id) }}" method="POST" onsubmit="return confirm('Deseja realmente restaurar esta tarefa?');">
                                @csrf
                                <button type="submit" class="bg-green-500 hover:bg-green-400 text-white px-3 py-1 rounded-lg text-sm">
                                    <i class="fi fi-tr-recycle-bin grid place-items-center"></i>
                                </button>
                            </form>

                            <form action="{{ route('tasks.forceDelete', $task->id) }}" method="POST" onsubmit="return confirm('Deseja realmente apagar esta tarefa permanentemente?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-gray-700 hover:bg-gray-600 text-white px-3 py-1 rounded-lg text-sm">
                                    <i class="fi fi-tr-x grid place-items-center"></i>
                                </button>
                            </form>
                        @else
                            
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Deseja realmente apagar esta tarefa?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-400 text-white px-3 py-1 rounded-lg text-sm">
                                    <i class="fi fi-rr-trash grid place-items-center"></i>
                                </button>
                            </form>
                        @endif
                    </div>
                </div>

                
                <span class="px-3 py-1 text-sm rounded-full 
                    {{ $task->deleted_at 
                        ? 'bg-gray-300 text-gray-700' 
                        : ($task->status === 'completed' 
                            ? 'bg-green-100 text-green-700' 
                            : 'bg-yellow-100 text-yellow-700') }}">
                    {{ $task->deleted_at ? 'Lixeira' : ucfirst($task->status) }}
                </span>
            </div>
        @endforeach
        
    <div class="mt-6">
        {{ $tasks->links() }}
    </div>
    @endif

@endsection
