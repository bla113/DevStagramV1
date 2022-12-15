@extends('layouts.app')
@section('titulo')
Crea una nueva Piblicación
@endsection
@push('styles')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush


@section('contenido')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">

        <form action="{{route('imagenes.store')}}" 
             id="dropzone" name="dropzone" enctype="multipart/form-data"
            class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
            @csrf 
        </form>
        </div>

        <div class="md:w-1/2 px-10 bg-white p-6 rounded-lg shadow-xl mt-10 md:mt-0">
            <form action="{{route('post.store')}}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="titulo"  class="mb-2 block uppercase text-gray-500 font-bold">Título</label>
                    <input type="text" placeholder="Titulo de la publicación" name="titulo" id="titulo" class="boder p-3 w-full rounded-lg @error('titulo')
                    @enderror" value="{{old('titulo')}}">
                    
                    @error('titulo') 
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="description"  class="mb-2 block uppercase text-gray-500 font-bold">Descripción</label>
                    <textarea type="text" placeholder="Descripción de la publicación" name="description" id="description" class="boder p-3 w-full rounded-lg @error('description')
                    @enderror">{{old('description')}}</textarea>
                   
                    
                    @error('description') 
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{$message}}</p>
                    @enderror
                </div>


                <div class="mb-5">
                    <div>
                        <input type="hidden" name="imagen" id="" value="{{old('imagen')}}">
                    </div>
                    @error('imagen') 
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{$message}}</p>
                    @enderror
                </div>

                <input type="submit" value="Crear publicación" class="bg-sky-600 hover:bg-sky-700 transition-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
                
        </div>

    </div>
@endsection