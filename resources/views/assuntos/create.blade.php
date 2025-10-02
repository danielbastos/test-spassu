@extends('layouts.app')
@section('title','Novo Assunto')

@section('content')
  <h1 class="h4 mb-3">Novo Assunto</h1>
  <form method="POST" action="{{ route('assuntos.store') }}">
    @include('assuntos._form')
  </form>
@endsection
