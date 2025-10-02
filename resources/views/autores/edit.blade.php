@extends('layouts.app')
@section('title','Editar Autor')

@section('content')
  <h1 class="h4 mb-3">Editar Autor</h1>
  <form method="POST" action="{{ route('autores.update', $autor) }}">
    @method('PUT')
    @include('autores._form', ['autor' => $autor])
  </form>
@endsection
