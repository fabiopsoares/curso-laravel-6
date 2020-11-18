@extends('admin.layouts.app')

@section('title', 'Cadastrar Novo Produto')

@section('content')
<h1>Cadastrar Movo Produto</h1>

    @include('admin.includes.alerts')

    <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data" class="form-group">
        @csrf
        <div class="form-group">
            <input type="text" class="form-group" name="name" id="name" placeholder="Nome:" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <input type="text" class="form-group" name="price" id="price" placeholder="Preço:" value="{{ old('price') }}">
        </div>
        <div class="form-group">
            <input type="text" class="form-group" name="description" id="description" placeholder="Descrição" value="{{ old('description') }}">
        </div>
        <div class="form-group">
            <input type="file" class="form-group" name="image id="image">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Enviar</button>
        </div>
    </form>
@endsection
