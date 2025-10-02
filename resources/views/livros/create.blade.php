@extends('layouts.app')
@section('title', 'Novo Livro')

@section('content')
  <h1 class="h4 mb-3">Novo Livro</h1>
  <form action="{{ route('livros.store') }}" method="POST">
    @include('livros._form')
  </form>
@endsection
