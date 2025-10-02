@extends('layouts.app')
@section('title','Autor')

@section('content')
  <h1 class="h4 mb-3">Autor #{{ $autor->cod_au }}</h1>
  <ul class="list-group mb-3">
    <li class="list-group-item"><strong>Nome:</strong> {{ $autor->nome }}</li>
  </ul>
  <a href="{{ route('autores.edit', $autor) }}" class="btn btn-warning">Editar</a>
  <a href="{{ route('autores.index') }}" class="btn btn-secondary">Voltar</a>
@endsection
