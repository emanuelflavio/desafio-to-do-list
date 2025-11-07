@extends('auth.layout')

@section('content')
        <div class="w-40 md:w-96 flex justify-center md:justify-start">
            <img src="{{ Vite::asset('resources/images/logo.png') }}" alt="logo" class="w-100 h-auto">
        </div>

        <div class="bg-zinc-100 w-full max-w-md px-6 md:px-20 rounded-md flex flex-col gap-6 py-10">
            <h1 class="font-bold text-center text-2xl">Cadastro</h1>

            @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            
            <form action="{{ route('register') }}" method="POST" class="flex flex-col gap-4">
                @csrf
                <div class="flex flex-col">
                    <label for="">Nome:</label>
                    <input type="text" id="name" name="name"
                        class="border border-zinc-300 bg-zinc-100 px-4 py-2 outline-none w-full rounded-sm">

                </div>



                <div class="flex flex-col">
                    <label for="">Email:</label>
                    <input type="email" id="email" name="email" required
                        class="border border-zinc-300 bg-zinc-100 px-4 py-2 outline-none w-full rounded-sm ">

                    
                </div>

                <div class="flex flex-col">
                    <label for="">Senha:</label>
                    <input type="password" id="password" name="password" required
                        class="border border-zinc-300 bg-zinc-100 px-4 py-2 outline-none w-full rounded-sm ">

                </div>

                <div class="flex flex-col">
                    <label for="">Confirmar Senha:</label>
                    <input type="password" name="password_confirmation" id="confirmacao" required
                        class="border border-zinc-300 bg-zinc-100 px-4 py-2 outline-none w-full rounded-sm ">

                </div>

                <button type="submit"
                    class="bg-blue-500 w-full py-2 rounded-sm text-zinc-100 font-semibold">Cadastrar</button>
            </form>

            <div class="flex gap-2 justify-center text-sm">
                <p>Já tem uma conta?</p>
                <a href="{{ route('login.show') }}" type="button" class="text-blue-500">Entrar</a>
            </div>
        </div>

        @endsection