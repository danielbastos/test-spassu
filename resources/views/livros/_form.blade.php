@csrf
<div class="mb-3">
  <label class="form-label">Título *</label>
  <input type="text" name="titulo" class="form-control @error('titulo') is-invalid @enderror"
         value="{{ old('titulo', $livro->titulo ?? '') }}">
  @error('titulo') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<x-assunto-select-list
    name="assuntos"
    :selected="isset($livro) ? $livro->assuntos->pluck('cod_as')->all() : []"
    label="Assuntos Relacionados"
/>

<x-autor-select-list
    name="autores"
    :selected="isset($livro) ? $livro->autores->pluck('cod_au')->all() : []"
    label="Autores Relacionados"
/>

<div class="mb-3">
  <label class="form-label">Editora *</label>
  <input type="text" name="editora" class="form-control @error('editora') is-invalid @enderror"
         value="{{ old('editora', $livro->editora ?? '') }}">
  @error('editora') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
  <label class="form-label">Edição *</label>
  <input type="number" name="edicao" class="form-control @error('edicao') is-invalid @enderror"
         value="{{ old('edicao', $livro->edicao ?? '') }}">
  @error('edicao') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
  <label class="form-label">Ano *</label>
  <input type="number" name="ano" class="form-control @error('ano') is-invalid @enderror"
         value="{{ old('ano', $livro->ano ?? '') }}">
  @error('ano') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<button class="btn btn-success">Salvar</button>
<a href="{{ route('livros.index') }}" class="btn btn-secondary">Cancelar</a>
