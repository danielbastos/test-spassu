@extends('layouts.app')
@section('title', 'Lista de Livros')

@section('content')
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3">Livros</h1>
    <a href="{{ route('livros.create') }}" class="btn btn-primary">+ Novo</a>
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
        <th>Título</th>
        <th>Editora</th>
        <th>Ano</th>
        <th style="width: 180px;">Ações</th>
      </tr>
    </thead>
    <tbody>
      @forelse($livros as $livro)
        <tr>
          <td>{{ $livro->cod_l }}</td>
          <td>{{ $livro->titulo }}</td>
          <td>{{ $livro->editora }}</td>
          <td>{{ $livro->ano }}</td>
          <td>
            <a href="{{ route('livros.show', $livro) }}" class="btn btn-sm btn-info">Ver</a>
            <a href="{{ route('livros.edit', $livro) }}" class="btn btn-sm btn-warning">Editar</a>
            <form action="{{ route('livros.destroy', $livro) }}" method="POST" class="d-inline">
              @csrf @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Excluir este livro?')">
                Excluir
              </button>
            </form>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="5" class="text-center">Nenhum livro encontrado.</td>
        </tr>
      @endforelse
    </tbody>
  </table>

  {{ $livros->links('pagination::bootstrap-5') }}
@endsection
