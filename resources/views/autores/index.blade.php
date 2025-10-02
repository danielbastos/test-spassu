@extends('layouts.app')
@section('title','Autores')

@section('content')
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3">Autores</h1>
    <a href="{{ route('autores.create') }}" class="btn btn-primary">+ Novo</a>
  </div>

  <form class="row g-2 mb-3" method="GET">
    <div class="col-auto">
      <input type="text" name="q" class="form-control" placeholder="Buscar por nome" value="{{ $q }}">
    </div>
    <div class="col-auto">
      <button class="btn btn-outline-secondary">Buscar</button>
    </div>
  </form>

  <table class="table table-bordered table-hover align-middle">
    <thead class="table-dark">
      <tr>
        <th>Código</th>
        <th>Nome</th>
        <th style="width:180px">Ações</th>
      </tr>
    </thead>
    <tbody>
      @forelse($autores as $a)
        <tr>
          <td>{{ $a->cod_au }}</td>
          <td>{{ $a->nome }}</td>
          <td>
            <a href="{{ route('autores.show', $a) }}" class="btn btn-sm btn-info">Ver</a>
            <a href="{{ route('autores.edit', $a) }}" class="btn btn-sm btn-warning">Editar</a>
            <form action="{{ route('autores.destroy', $a) }}" method="POST" class="d-inline">
              @csrf @method('DELETE')
              <button class="btn btn-sm btn-danger" onclick="return confirm('Excluir este autor?')">Excluir</button>
            </form>
          </td>
        </tr>
      @empty
        <tr><td colspan="3" class="text-center">Nenhum autor encontrado.</td></tr>
      @endforelse
    </tbody>
  </table>

  {{ $autores->links('pagination::bootstrap-5') }}
@endsection
