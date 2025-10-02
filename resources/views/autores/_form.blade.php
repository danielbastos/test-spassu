@csrf
<div class="mb-3">
  <label class="form-label">Nome *</label>
  <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror"
         value="{{ old('nome', $autor->nome ?? '') }}">
  @error('nome') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<button class="btn btn-success">Salvar</button>
<a href="{{ route('autores.index') }}" class="btn btn-secondary">Cancelar</a>
