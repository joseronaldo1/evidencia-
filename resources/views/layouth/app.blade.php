<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite('resources/css/app.css')

    <title>Laravel</title>
   {{--  @if (auth()->user())
        Usuario autenticado
        @else
        Login
    @endif --}}
  
</head>
<body class="bg-gray-100">

<header class="flex items-center justify-between border-b p-5 bg-white  shadow">
    <h1 class="text-3xl font-bold"></h1>
    @auth()
    <nav class="flex gap-2 items-center">
        <form action="{{route('logout')}}" method="post">
            {{-- Ayuda para que no sea dañado --}}
            @csrf
        <button class="font-bold uppercase text-gray-600">Cerrar Sesion</button>
    </form>
    </nav>
@endauth

@guest
<nav class="flex gap-2 items-center">
    <a class="font-bold uppercase text-gray-600" href="{{route('login')}}">Login</a>
    <a class="font-bold uppercase text-gray-600" href="{{route('register.index')}}">Crear Cuenta</a>
</nav>
@endguest
</header>

<main class="container mx-auto mt-10 ">
    <h2 class="font-black text-center text-3xl mb-10">
        @yield('titulo')
    </h2>
    @yield('contenido')
</main>
</body>
</html>