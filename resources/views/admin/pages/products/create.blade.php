@extends('admin.layouts.app')

@section('title', 'Cadastrar Novo Produto')

@section('content')
<h1>Cadastrar Movo Produto <a href="{{ route('products.index') }}"><<</a></h1>

    <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data" class="form-group">
        @include('admin.pages.products._partials.form')
        @csrf
    </form>
@endsection
