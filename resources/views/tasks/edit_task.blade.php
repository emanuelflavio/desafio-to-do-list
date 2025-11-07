@extends('tasks.layout')

@section('content')

<h2 class="text-3xl font-bold mb-6 text-gray-800">Editar Tarefa</h2>

@if ($task->deleted_at)
    <div class="w-full rounded-lg shadow-sm p-6 bg-red-100 border border-red-400 text-red-700">
        Esta tarefa está na lixeira e não pode ser editada.
    </div>
    <div class="mt-4">
        <a href="{{ route('tasks.index') }}"
            class="bg-gray-400 hover:bg-gray-300 text-white px-4 py-2 rounded-lg font-semibold flex gap-2 items-center">
            <i class="fi fi-rr-x"></i> Voltar
        </a>
    </div>
@else
    <div class="w-full rounded-lg shadow-sm p-6 bg-white">
        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="title" class="block font-semibold mb-2 text-gray-700">Título</label>
            <input type="text" id="title" name="title"
                value="{{ old('title', $task->title) }}"
                class="w-full mb-4 p-3 border rounded-lg focus:ring focus:ring-blue-200 outline-none"
                required>

            <label for="description" class="block font-semibold mb-2 text-gray-700">Descrição</label>
            <textarea id="description" name="description" rows="4"
                class="w-full mb-4 p-3 border rounded-lg focus:ring focus:ring-blue-200 outline-none">{{ old('description', $task->description) }}</textarea>

            <div>
                <label class="block font-semibold mb-2 text-gray-700">Status</label>
                <div class="flex gap-3">
                    <input type="radio" name="status" id="pending" value="pending"
                        class="hidden peer/pending"
                        {{ old('status', $task->status) === 'pending' ? 'checked' : '' }}>
                    <label for="pending"
                        class="peer-checked/pending:bg-blue-600 peer-checked/pending:text-white bg-gray-200 hover:bg-blue-100 cursor-pointer rounded-lg px-5 py-2 font-semibold transition">
                        Pendente
                    </label>

                    <input type="radio" name="status" id="completed" value="completed"
                        class="hidden peer/completed"
                        {{ old('status', $task->status) === 'completed' ? 'checked' : '' }}>
                    <label for="completed"
                        class="peer-checked/completed:bg-blue-600 peer-checked/completed:text-white bg-gray-200 hover:bg-blue-100 cursor-pointer rounded-lg px-5 py-2 font-semibold transition">
                        Concluída
                    </label>
                </div>
            </div>

            <div class="flex justify-end gap-5 mt-4">
                <button type="submit"
                    class="bg-green-600 hover:bg-green-500 text-white px-4 py-2 rounded-lg font-semibold flex gap-2 items-center">
                    <i class="fi fi-rr-bookmark"></i> Confirmar Edição
                </button>

                <a href="{{ route('tasks.index') }}"
                    class="bg-gray-400 hover:bg-gray-300 text-white px-4 py-2 rounded-lg font-semibold flex gap-2 items-center">
                    <i class="fi fi-rr-x"></i> Cancelar
                </a>
            </div>
        </form>
    </div>
@endif

@endsection
