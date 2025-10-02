@extends('layouts.app')
@section('title', 'Detalhes do Livro')

@section('content')
  <h1 class="h4 mb-3">{{ $livro->titulo }}</h1>

  <ul class="list-group mb-3">
    <li class="list-group-item"><strong>Editora:</strong> {{ $livro->editora ?? '—' }}</li>
    <li class="list-group-item"><strong>Edição:</strong> {{ $livro->edicao ?? '—' }}</li>
    <li class="list-group-item"><strong>Ano:</strong> {{ $livro->ano ?? '—' }}</li>
  </ul>

  <a href="{{ route('livros.edit', $livro) }}" class="btn btn-warning">Editar</a>
  <a href="{{ route('livros.index') }}" class="btn btn-secondary">Voltar</a>
@endsection
