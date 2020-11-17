@extends('admin.layouts.app')

@section('title', 'Gestão de Produtos')
@section('content')

<h1>Exibindo os produtos</h1>

@include('admin.includes.alerts', ['content' => 'Alerta de preços de produtos'])

<hr>

@component('admin.components.card')
    @slot('title')
        <h1>Titulo card</h1>
    @endslot
    um card de exemplo
@endcomponent

<hr>

@if (isset($products))
    @foreach ($products as $product)
    <p class="@if ($loop->last) last @endif">{{ $product }}</p>
    @endforeach
@endif

<hr>

@forelse ($products as $product)
<p class="@if ($loop->first) last @endif">{{ $product }}</p>
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
