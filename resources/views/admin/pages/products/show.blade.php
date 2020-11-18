@extends('admin.layouts.app')

@section('title', 'Detalhes Produto')
@section('content')

<h1>Produto {{$product->name}} <a href="{{ route('products.index') }}"><<</a></h1>

<ul class="list-group">
<li><strong>Nome: </strong>{{ $product->name }}</li>
    <li><strong>Preço: </strong>{{ $product->price }}</li>
    <li><strong>Descrição: </strong>{{ $product->description }}</li>
</ul>
@endsection

