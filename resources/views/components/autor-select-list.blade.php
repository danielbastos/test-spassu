<div class="mb-3">
  <label class="form-label">{{ $label }}</label>

  <div id="autor-select-container">
    @php
      $values = collect(old($name, $selected ?? []))
                ->filter(fn($v) => $v !== null && $v !== '')
                ->values()
                ->all();
      if (empty($values)) { $values = [null]; }
    @endphp

    @foreach($values as $valor)
      <div class="d-flex gap-2 mb-2 autor-select-item">
        <select name="{{ $name }}[]" class="form-select flex-grow-1">
          <option value="">Selecione...</option>
          @foreach($autores as $a)
            <option value="{{ $a->cod_au }}" @selected($valor == $a->cod_au)>
              {{ $a->nome }}
            </option>
          @endforeach
        </select>
        <button type="button" class="btn btn-danger remove-autor-btn">&times;</button>
      </div>
    @endforeach
  </div>

  <button type="button" class="btn btn-outline-primary btn-sm" id="add-autor-btn">
    + Adicionar Autor
  </button>

  @error($name)
    <div class="invalid-feedback d-block">{{ $message }}</div>
  @enderror
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
  const container = document.getElementById('autor-select-container');
  const addBtn = document.getElementById('add-autor-btn');

  // Template
  const template = `
    <div class="d-flex gap-2 mb-2 autor-select-item">
      <select name="{{ $name }}[]" class="form-select flex-grow-1">
        <option value="">Selecione...</option>
        @foreach($autores as $a)
          <option value="{{ $a->cod_au }}">{{ $a->nome }}</option>
        @endforeach
      </select>
      <button type="button" class="btn btn-danger remove-autor-btn">&times;</button>
    </div>
  `;

  // Adicionar novo select
  addBtn.addEventListener('click', () => {
    container.insertAdjacentHTML('beforeend', template);
  });

  // Remover select
  container.addEventListener('click', (e) => {
    if (e.target.classList.contains('remove-autor-btn')) {
      e.target.closest('.autor-select-item').remove();
    }
  });
});
</script>
@endpush
