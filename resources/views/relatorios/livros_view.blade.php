@extends('layouts.app')
@section('title','Relatório (VIEW) de Livros')

@section('content')
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3">Relatório de Livros</h1>
  </div>

  <form method="GET" class="row g-2 mb-3">
    <div class="col-auto">
      <input type="text" name="q" class="form-control" placeholder="Título, Autor, Assunto, Editora, Ano" value="{{ $q }}">
    </div>
    <div class="col-auto">
      <button class="btn btn-primary">Pesquisar</button>
      @if($q)<a class="btn btn-secondary" href="{{ route('relatorio.livros') }}">Limpar</a>@endif
    </div>
  </form>

  <table class="table table-hover table-bordered align-middle mb-0">
    <thead class="table-dark">
        <tr>
        <th>Título</th>
        <th>Editora</th>
        <th>Edição</th>
        <th>Ano</th>
        <th>Preço</th>
        <th>Autores</th>
        <th>Assuntos</th>
        </tr>
    </thead>
    <tbody>
        @forelse($rows as $r)
        <tr>
            <td>{{ $r->titulo }}</td>
            <td>{{ $r->editora ?? '—' }}</td>
            <td>{{ $r->edicao ?? '—' }}</td>
            <td>{{ $r->ano ?? '—' }}</td>
            <td>R$ {{ number_format($r->preco, 2, ',', '.') }}</td>
            <td>{{ $r->autores_str ?: '—' }}</td>
            <td>{{ $r->assuntos_str ?: '—' }}</td>
        </tr>
        @empty
        <tr><td colspan="7" class="text-center text-muted">Nenhum registro.</td></tr>
        @endforelse
    </tbody>
  </table>


  <div class="mt-3">
    {{ $rows->links('pagination::bootstrap-5') }}
  </div>
@endsection
