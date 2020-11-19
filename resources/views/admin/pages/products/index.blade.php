@extends('admin.layouts.app')

@section('title', 'Gestão de Produtos')
@section('content')

<h1>Exibindo os produtos</h1>
<a href="{{ route('products.create') }}" class="btn btn-primary"> Cadastrar Produto</a>
<hr>
<form action="{{ route('products.search')}}" method="post" class="form form-inline">
    @csrf
<input type="text" name="filter" placeholder="Filtrar" class="form-control" value="{{ $filters['filter'] ?? '' }}">
<button type="submit" class="btn btn-info">Pesquisar</button>
</form>

{{--
@include('admin.includes.alerts', ['content' => 'Alerta de preços de produtos'])

<hr>

@component('admin.components.card')
    @slot('title')
        <h1>Titulo card</h1>
    @endslot
    um card de exemplo
@endcomponent --}}

<table class="table .table-striped ">
    <thead>
        <tr>
            <th width="100">Imagem</th>
            <th>Nome</th>
            <th>Preço</th>
            <th width="100">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <td>
                    @if ($product->image)
                        <img src="{{ url("storage/{$product->image}") }}" alt="{{$product->name}}" style="max-width: 100px;">
                    @endif
                </td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
            <td><a href="{{ route('products.edit', $product->id) }}">Editar</a></td>
            <td><a href="{{ route('products.show', $product->id) }}">Detalhes</a></td>
            </tr>
            @endforeach
    </tbody>
</table>

@if (isset($filters))
    {!! $products->appends($filters)->links() !!}
@else

    {!! $products->links() !!}
@endif

@endsection

{{--

    @if (isset($products))
    @foreach ($products as $product)
    <p class="@if ($loop->last) last @endif">{{ $product->name }}</p>
    @endforeach
@endif

<hr>

@forelse ($products as $product)
<p class="@if ($loop->first) last @endif">{{ $product->name }}</p>
@empty
<p>Não existe produto cadastrado</p>
@endforelse


@if ($teste === '123')
     É igual
@elseif($teste === 123)
    É igual a 123
@else
    Não é igual
@endif

<br/>

@unless ($teste === '123')
abc
@else
234
@endunless

<br/>

@isset($teste2)
{{$teste2}}
@else
Não existe
@endisset

<br/>

@empty($teste3)

<p>Vazio</p>

@endempty

@auth
 <p>Autenticado</p>
 @else
 <p>Não está autenticado</p>
@endauth

@guest
<p>Não está autenticado</p>
@endguest

@switch($teste)
    @case(1)
        igual 1
        @break
    @case(2)
    igual 2
    @case(123)
    igual 123
        @break
    @default
    default
@endswitch

@endsection

@push('styles')
<style>
    .last {background: #CCC;}
</style>
@endpush

@push('scripts')
    <script>
        document.body.style.background = '#efefef'
    </script>
@endpush
--}}
