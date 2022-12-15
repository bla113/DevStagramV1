@extends('layouts.app')

@section('titulo')
Regístrate en DevStagram 
@endsection

@section('contenido')
<div class="md:flex md:justify-center md:gap-4 md:items-center">
    <div class="md:w-6/12 p-5">
        <img src="{{asset('img/registrar.jpg')}}" alt="Imagen de Registro de Usuario">
    </div>
    <div class="md:w-4/12  bg-white p-6 rounded-lg shadow-lg">
        <form action="{{route('register')}}" method="POST" novalidate>
            @csrf
            <div class="mb-5">
                <label for="name"  class="mb-2 block uppercase text-gray-500 font-bold">Nombre Completo</label>
                <input type="text" placeholder="Tu Nombre" name="name" id="name" class="boder p-3 w-full rounded-lg @error('name')
                @enderror" value="{{old('name')}}">
                
                @error('name') 
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="username"  class="mb-2 block uppercase text-gray-500 font-bold">Usuario</label>
                <input type="text" placeholder="Tu Nombre de Usuario" name="username" id="username" class="boder p-3 w-full rounded-lg @error('username')@enderror" value="{{old('username')}}">
                @error('username') 
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{$message}}</p>
            @enderror
            </div>

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
                <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">Repita Tu Password</label>
                <input for="password_confirmation" type="password" placeholder="Confirma tu password" id="password_confimation" name="password_confimation" class="boder p-3 w-full rounded-lg">
               
            </div>

            <input type="submit" value="Crear Cuenta" class="bg-sky-600 hover:bg-sky-700 transition-pointer uppercase font-bold w-full p-3 text-white rounded-lg">


        </form>

    </div>

</div>
@endsection