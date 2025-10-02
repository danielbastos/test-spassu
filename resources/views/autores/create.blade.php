@extends('layouts.app')
@section('title','Novo Autor')

@section('content')
  <h1 class="h4 mb-3">Novo Autor</h1>
  <form method="POST" action="{{ route('autores.store') }}">
    @include('autores._form')
  </form>
@endsection
