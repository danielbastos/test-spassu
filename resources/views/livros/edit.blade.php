@extends('layouts.app')
@section('title', 'Editar Livro')

@section('content')
  <h1 class="h4 mb-3">Editar Livro</h1>
  <form action="{{ route('livros.update', $livro) }}" method="POST">
    @method('PUT')
    @include('livros._form')
  </form>
@endsection
