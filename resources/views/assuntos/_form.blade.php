@csrf
<div class="mb-3">
  <label class="form-label">Descrição *</label>
  <input name="descricao" class="form-control @error('descricao') is-invalid @enderror"
         value="{{ old('descricao', $assunto->descricao ?? '') }}">
  @error('descricao') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
<button class="btn btn-success">Salvar</button>
<a href="{{ route('assuntos.index') }}" class="btn btn-secondary">Cancelar</a>
