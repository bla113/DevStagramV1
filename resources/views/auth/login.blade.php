@extends('layouts.app')

@section('titulo')
Inicia Sesión en DevStagram
@endsection

@section('contenido')
<div class="md:flex md:justify-center md:gap-4 md:items-center">
    <div class="md:w-6/12 p-5">
        <img src="{{asset('img/login.jpg')}}" alt="Imagen de Registro de Usuario">
    </div>
    <div class="md:w-4/12  bg-white p-6 rounded-lg shadow-lg">
        <form action="{{route('login')}}" method="POST" novalidate>
            @csrf

            @if (session('mensaje'))
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{session('mensaje')}}</p>
            @endif
           

            <div class="mb-5">
                <label for="email"  class="mb-2 block uppercase text-gray-500 font-bold">Correo</label>
                <input type="email" placeholder="Tu Email de registro" name="email" id="email" class="boder p-3 w-full rounded-lg @error('email') @enderror" value="{{old('email')}}">
                @error('email') 
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{$message}}</p>
            @enderror
            </div>

            <div class="mb-5">
                <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Password</label>
                <input type="password" placeholder="Tu password" id="password" name="password" class="boder p-3 w-full rounded-lg @error('password') @enderror" >
                @error('password') 
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{$message}}</p>
                 @enderror
            </div>

            <div class="mb-5">
                <input type="checkbox" name="remember"><label class="text-gray-500 text-sm" >Mantener mi sessión abierta</label> 

            </div>
           

            <input type="submit" value="Iniciar Sesion" class="bg-sky-600 hover:bg-sky-700 transition-pointer uppercase font-bold w-full p-3 text-white rounded-lg">


        </form>

    </div>

</div>
@endsection