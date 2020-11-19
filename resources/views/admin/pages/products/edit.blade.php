@extends('admin.layouts.app')

@section('title', "Editar Produto {{$product->name}}")

@section('content')
<h1>Editar Produto {{$product->name }} <a href="{{ route('products.index') }}"><<</a></h1>

    <form action="{{route('products.update', $product->id)}}" method="post">

        @method('put')
       @include('admin.pages.products._partials.form')
    </form>
@endsection
