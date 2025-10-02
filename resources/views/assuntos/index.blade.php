@extends('layouts.app')
@section('title','Assuntos')

@section('content')
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3">Assuntos</h1>
    <a href="{{ route('assuntos.create') }}" class="btn btn-primary">+ Novo</a>
  </div>

  <form method="GET" class="row g-2 mb-3">
    <div class="col-md-4">
      <input name="q" value="{{ $q }}" class="form-control" placeholder="Buscar descrição...">
    </div>
    <div class="col-auto"><button class="btn btn-outline-secondary">Buscar</button></div>
  </form>

  <table class="table table-bordered table-hover align-middle">
    <thead class="table-dark">
      <tr>
        <th>Código</th>
        <th>Descrição</th>
        <th style="width:180px;">Ações</th>
      </tr>
    </thead>
    <tbody>
      @forelse($assuntos as $a)
        <tr>
          <td>{{ $a->cod_as }}</td>
          <td>{{ $a->descricao }}</td>
          <td>
            <a href="{{ route('assuntos.show',$a) }}" class="btn btn-sm btn-info">Ver</a>
            <a href="{{ route('assuntos.edit',$a) }}" class="btn btn-sm btn-warning">Editar</a>
            <form action="{{ route('assuntos.destroy',$a) }}" method="POST" class="d-inline">
              @csrf @method('DELETE')
              <button onclick="return confirm('Excluir este assunto?')" class="btn btn-sm btn-danger">Excluir</button>
            </form>
          </td>
        </tr>
      @empty
        <tr><td colspan="3" class="text-center">Nenhum assunto encontrado.</td></tr>
      @endforelse
    </tbody>
  </table>

  {{ $assuntos->links('pagination::bootstrap-5') }}
@endsection
