@extends('layouts.app')
@section('title','Assunto')

@section('content')
  <h1 class="h4 mb-3">Assunto #{{ $assunto->cod_as }}</h1>
  <ul class="list-group mb-3">
    <li class="list-group-item"><strong>Descrição:</strong> {{ $assunto->descricao }}</li>
  </ul>
  <a href="{{ route('assuntos.edit',$assunto) }}" class="btn btn-warning">Editar</a>
  <a href="{{ route('assuntos.index') }}" class="btn btn-secondary">Voltar</a>
@endsection
