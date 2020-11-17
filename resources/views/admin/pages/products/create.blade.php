@extends('admin.layouts.app')

@section('title', 'Cadastrar Novo Produto')

@section('content')
<h1>Cadastrar Movo Produto</h1>
    <form action="{{route('products.store')}}" method="POST">
        @csrf
        <input type="text" name="name" id="name" placeholder="Nome:">
        <input type="text" name="description" id="description" placeholder="Descrição">
        <button type="submit">Enviar</button>
    </form>
@endsection
