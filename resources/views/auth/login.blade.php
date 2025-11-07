@extends('auth.layout')

@section('content')

        <div class="w-40 md:w-96 flex justify-center md:justify-start">
            <img src="{{ Vite::asset('resources/images/logo.png') }}" alt="logo" class="w-100 h-auto">
        </div>
        <div class="flex bg-zinc-100 w-full rounded-md flex-col gap-6 py-10 max-w-md md:px-20 px-6">
            <h1 class="font-bold text-center text-2xl">Login</h1>

            @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('login') }}" method="POST" class="flex flex-col gap-4">
                @csrf
                <div class="flex flex-col">
                    <label for="">E-mail: </label>
                    <input type="email" name="email" id="email" required
                        class="border border-zinc-300 bg-zinc-100 px-4 py-2 outline-none w-full rounded-sm">
                </div>

                <div class="flex flex-col">
                    <label for="">Senha: </label>
                    <input type="password" name="password" id="password" required
                        class="border border-zinc-300 bg-zinc-100 px-4 py-2 outline-none w-full rounded-sm">

                </div>

                <button type="submit"
                    class="bg-blue-500 w-full py-2 rounded-sm text-zinc-100 font-semibold">Enviar</button>

            </form>

            <div class="flex gap-2 justify-center text-sm">
                <p>Não tem uma conta?</p>
                <a href="{{ route('register.show') }}" class="text-blue-500">Criar </a>
            </div>
        </div>
        

@endsection
