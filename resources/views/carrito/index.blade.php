@extends('layouts.menu')

@section('contenido')
@if(!session('cart'))
<p>Variable no existente</p>
@else
<div class="row">
        {{ session('cart')[0]["name"] }}
        {{ session('cart')[0]["cantidad"] }}
    </div>
    <form method="POST" action="{{ route('carrito.destroy', 1) }}">
        @csrf
        @method('DELETE')
        <button class="btn waves-efects waves-light" type="submit">
            Eliminar Carrito
        </button>
    </form>
@endif
 
@endsection