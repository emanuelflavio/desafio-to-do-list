<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefas</title> @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/3.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/3.0.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-thin-rounded/css/uicons-thin-rounded.css'>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="bg-blue-600 h-screen flex items-center justify-center">
    <div class="flex w-11/12 h-[90vh] rounded-2xl overflow-hidden shadow-2xl">
        <aside class="w-1/4 bg-blue-800 text-white flex flex-col justify-between p-6">
            <div>
                <div class="w-40 md:w-96 flex justify-center md:justify-start"> <img
                        src="{{ Vite::asset('resources/images/logo.png') }}" alt="logo" class="w-100 h-auto">
                </div>
                <a href="{{ route('tasks.create') }}"
                    class="w-full mb-4 bg-green-600 hover:bg-green-500 p-3 flex flex-row gap-2 justify-center rounded-lg transition text-center font-semibold">
                    <i class="fi fi-rr-square-plus grid place-items-center"></i></i>
                    <div class="grid place-items-center">Nova Tarefa</div>
                </a>
                <a href="{{ route('tasks.index', ['filter' => 'deleted']) }}"
                    class="w-full bg-blue-700 hover:bg-blue-600 p-3 flex flex-row gap-2 justify-center rounded-lg transition text-center">
                    <i class="fi fi-rr-trash grid place-items-center"></i>
                    <div class="grid place-items-center">Lixeira</div>
                </a>
                <div class="mb-8">
                    <h2 class="text-lg font-semibold mb-3">Filtro por Status</h2>
                    <nav class="flex flex-col gap-3"> <a href="{{ route('tasks.index', ['filter' => 'pending']) }}"
                            class="bg-blue-700 hover:bg-blue-600 p-3 flex flex-row gap-2 justify-center rounded-lg transition text-center">
                            <i class="fi fi-rr-hourglass-end grid place-items-center"></i>
                            <div class="grid place-items-center">Pendentes</div>
                        </a> <a href="{{ route('tasks.index', ['filter' => 'completed']) }}"
                            class="bg-blue-700 hover:bg-blue-600 flex flex-row gap-2 justify-center p-3 rounded-lg transition text-center">
                            <i class="fi fi-tr-comment-alt-check grid place-items-center"></i>
                            <div class="grid place-items-center">Concluídas</div>
                        </a> <a href="{{ route('tasks.index', ['filter' => 'all']) }}"
                            class="bg-blue-700 hover:bg-blue-600 p-3 flex flex-row gap-2 justify-center rounded-lg transition text-center">
                            <i class="fi fi-sr-list grid place-items-center"></i>
                            <div class="grid place-items-center">Todas</div>
                        </a> </nav>
                </div>
            </div>
            <form action="{{ route('logout') }}" method="POST" class="mt-2">
                @csrf
                <button type="submit"
                    class="bg-blue-950 hover:bg-red-500 p-3 rounded-lg text-center transition flex flex-row gap-1 justify-center w-full">
                    <i class="fi fi-rr-sign-out-alt grid place-items-center"></i>
                    <div class="grid place-items-center"></div>Sair
                </button>
            </form>
        </aside>
        <main class="w-3/4 bg-zinc-100 rounded-r-3xl p-8 overflow-y-auto">
            @yield('content')

        </main>
    </div>
</body>

</html>