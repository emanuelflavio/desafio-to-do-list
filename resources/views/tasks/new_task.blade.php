@extends('tasks.layout')

@section('content')

    <h2 class="text-3xl font-bold mb-6 text-gray-800">Crie uma nova tarefa</h2>

    <div class="w-full rounded-lg shadow-sm p-6 bg-white">

        
        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-100 border border-red-400 text-red-700 rounded">
                <ul class="list-disc ml-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        
        <form action="{{ route('tasks.store') }}" method="POST" class="flex flex-col gap-4">
            @csrf

            <div>
                <label for="title" class="block font-semibold mb-2 text-gray-700">Título</label>
                <input type="text" name="title" id="title" placeholder="Título da Tarefa"
                    class="w-full mb-4 p-3 border rounded-lg" required>
            </div>

            <div>
                <label for="description" class="block font-semibold mb-2 text-gray-700">Descrição</label>
                <textarea name="description" id="description" placeholder="Detalhes da tarefa (opcional)"
                    class="w-full mb-4 p-3 border rounded-lg" rows="4"></textarea>
            </div>

            <div>
                <label class="block font-semibold mb-2 text-gray-700">Status</label>
                <div class="flex gap-3">
                    <input type="radio" name="status" id="pending" value="pending" class="hidden peer/pending" checked>
                    <label for="pending"
                        class="peer-checked/pending:bg-blue-600 peer-checked/pending:text-white bg-gray-200 hover:bg-blue-100 cursor-pointer rounded-lg px-5 py-2 font-semibold transition">
                        Pendente
                    </label>

                    <input type="radio" name="status" id="completed" value="completed" class="hidden peer/completed">
                    <label for="completed"
                        class="peer-checked/completed:bg-blue-600 peer-checked/completed:text-white bg-gray-200 hover:bg-green-100 cursor-pointer rounded-lg px-5 py-2 font-semibold transition">
                        Concluída
                    </label>
                </div>
            </div>

            <div class="flex justify-end gap-5">
                <button type="submit"
                    class="bg-green-600 hover:bg-green-500 text-white px-4 py-2 rounded-lg font-semibold flex gap-2 items-center">
                    <i class="fi fi-rr-bookmark"></i> Salvar Tarefa
                </button>

                <a href="{{ route('tasks.index') }}"
                    class="bg-gray-400 hover:bg-gray-300 text-white px-4 py-2 rounded-lg font-semibold flex gap-2 items-center">
                    <i class="fi fi-rr-x"></i> Cancelar
                </a>
            </div>
        </form>
    </div>

@endsection
