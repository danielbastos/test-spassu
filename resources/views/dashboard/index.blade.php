@extends('layouts.app')
@section('title','Dashboard')

@section('content')
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3">Dashboard</h1>
    <small class="text-muted">Período: {{ $inicio->toDateString() }} a {{ $fim->toDateString() }}</small>
  </div>

  {{-- Cards de resumo --}}
  <div class="row g-3 mb-4">
    <div class="col-md-4">
      <div class="card border-0 shadow-sm">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <div class="text-muted">Livros</div>
              <div class="h3 m-0">{{ $totais['livros'] }}</div>
            </div>
            <a href="{{ route('livros.index') }}" class="btn btn-sm btn-outline-primary">Ver</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card border-0 shadow-sm">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <div class="text-muted">Autores</div>
              <div class="h3 m-0">{{ $totais['autores'] }}</div>
            </div>
            <a href="{{ route('autores.index') }}" class="btn btn-sm btn-outline-primary">Ver</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card border-0 shadow-sm">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <div class="text-muted">Assuntos</div>
              <div class="h3 m-0">{{ $totais['assuntos'] }}</div>
            </div>
            <a href="{{ route('assuntos.index') }}" class="btn btn-sm btn-outline-primary">Ver</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Tabelas de recentes --}}
  <div class="row g-3">
    <div class="col-md-4">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-header bg-white fw-semibold">Últimos Livros</div>
        <div class="card-body p-0">
          <table class="table table-sm mb-0">
            <thead><tr><th>Título</th><th class="text-end">Data</th></tr></thead>
            <tbody>
              @forelse($recentes['livros'] as $l)
                <tr>
                  <td><a href="{{ route('livros.show', $l->cod_l) }}">{{ $l->titulo }}</a></td>
                  <td class="text-end">{{ $l->created_at?->format('d/m/Y') }}</td>
                </tr>
              @empty
                <tr><td colspan="2" class="text-center text-muted">—</td></tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-header bg-white fw-semibold">Últimos Autores</div>
        <div class="card-body p-0">
          <table class="table table-sm mb-0">
            <thead><tr><th>Nome</th><th class="text-end">Data</th></tr></thead>
            <tbody>
              @forelse($recentes['autores'] as $a)
                <tr>
                  <td><a href="{{ route('autores.show', $a->cod_au) }}">{{ $a->nome }}</a></td>
                  <td class="text-end">{{ $a->created_at?->format('d/m/Y') }}</td>
                </tr>
              @empty
                <tr><td colspan="2" class="text-center text-muted">—</td></tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-header bg-white fw-semibold">Últimos Assuntos</div>
        <div class="card-body p-0">
          <table class="table table-sm mb-0">
            <thead><tr><th>Descrição</th><th class="text-end">Data</th></tr></thead>
            <tbody>
              @forelse($recentes['assuntos'] as $s)
                <tr>
                  <td><a href="{{ route('assuntos.show', $s->cod_as) }}">{{ $s->descricao }}</a></td>
                  <td class="text-end">{{ $s->created_at?->format('d/m/Y') }}</td>
                </tr>
              @empty
                <tr><td colspan="2" class="text-center text-muted">—</td></tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  {{-- Mini-série (texto) últimos 7 dias --}}
  <div class="mt-4">
    <div class="row g-3">
      @foreach (['livros'=>'Livros','autores'=>'Autores','assuntos'=>'Assuntos'] as $k => $titulo)
        <div class="col-md-4">
          <div class="card border-0 shadow-sm">
            <div class="card-header bg-white fw-semibold">{{ $titulo }} nos últimos 7 dias</div>
            <div class="card-body">
              <ul class="list-unstyled mb-0 small">
                @foreach($serie[$k] as $dia => $qtd)
                  <li class="d-flex justify-content-between">
                    <span>{{ \Carbon\Carbon::parse($dia)->format('d/m') }}</span>
                    <span class="fw-semibold">{{ $qtd }}</span>
                  </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection
