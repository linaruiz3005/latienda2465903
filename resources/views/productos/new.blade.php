@extends('layouts.menu')
 
@section('contenido')
@if(session('Mensajito'))
<div class="row">
    <span class="red-text text-darken-2">{{ session('Mensajito') }}</span>
</div>
@endif
<div class="row">
    <h1 class="purple-text text-darken-4">Nuevo Producto</h1>
</div>
<div class="row">
    <form 
    method="POST"
    action="{{ route('productos.store') }}"
    class="col s8">
    @csrf
        <div class="row">
            <div class="input-field col s8">
                <input 
                placeholder="Nombre del Producto"
                type="text"
                id="nombre"
                name="nombre"
                value="{{ old('nombre') }}"/>
                <label for="nombre">Nombre</label>
                <span class="red-text text-darken-2"> {{ $errors->first('nombre') }}</span>
            </div>
        </div>

        <div class="row">
                    <div class="input-field col s8">
                    <textarea name="desc" id="desc" class="materialize-textarea">
                    {{ old('desc') }}
                    </textarea>
                    <label for="desc">Descripción:</label>
                    <span class="red-text text-darken-2">{{  $errors->first('desc') }}</span>
                </div>
        </div>
        <div class="row">
            <div class="input-field col s8">
                <input 
                placeholder="Precio del producto"
                type="text"
                id="precio"
                name="precio"
                value="{{ old('precio') }}"/>
                <label for="precio">Precio</label>
                <span class="red-text text-darken-2">{{  $errors->first('precio') }}</span>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s8">
                <select name="marca" id="marca">
                    <option value="">Elija marca</option>
                    @foreach($marcas as $marca)
                        <option value="{{ $marca->id }}">
                            {{ $marca->nombre }}
                        </option>
                    @endforeach
                </select>
                <label for="marca">Elija Una Marca</label>
                <span class="red-text text-darken-2">{{ $errors->first('marca') }}</span>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s8">
                <select name="categoria" id="categoria">
                <option value="">Elija Categoria</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}">
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>
                <label for="categoria">Elija Una Categoria</label>
                <span class="red-text text-darken-2">{{ $errors->first('categoria') }}</span>
            </div>
        </div>

        <div class="row">
            <div class="file-field input-field col s8">
                <div class="btn">
                    <span>
                        Imagen del Producto
                    </span>
                    <input type="file" name="imagen">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path" type="text">
                </div>
            </div>
        </div>
        <div class="row">
            <button class="btn waves-efects waves-light" type="submit">
                Guardar
            </button>
        </div>
</form>
</div>
@endsection