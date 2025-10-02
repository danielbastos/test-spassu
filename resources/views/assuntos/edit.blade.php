@extends('layouts.app')
@section('title','Editar Assunto')

@section('content')
  <h1 class="h4 mb-3">Editar Assunto</h1>
  <form method="POST" action="{{ route('assuntos.update', $assunto) }}">
    @method('PUT')
    @include('assuntos._form', ['assunto'=>$assunto])
  </form>
@endsection
