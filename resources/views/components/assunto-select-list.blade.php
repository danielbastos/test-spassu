<div class="mb-3">
  <label class="form-label">{{ $label }}</label>

  <div id="assunto-select-container">
    @php
    $values = collect(old($name, $selected ?? []))
                ->filter(fn($v) => $v !== null && $v !== '')
                ->values()
                ->all();
    if (empty($values)) { $values = [null]; } // mostra 1 select vazio
    @endphp

    @foreach($values as $index => $valor)
      <div class="d-flex gap-2 mb-2 assunto-select-item">
        <select name="{{ $name }}[]" class="form-select flex-grow-1">
          <option value="">Selecione...</option>
          @foreach($assuntos as $a)
            <option value="{{ $a->cod_as }}" @selected($valor == $a->cod_as)>
              {{ $a->descricao }}
            </option>
          @endforeach
        </select>
        <button type="button" class="btn btn-danger remove-assunto-btn">&times;</button>
      </div>
    @endforeach
  </div>

  <button type="button" class="btn btn-outline-primary btn-sm" id="add-assunto-btn">
    + Adicionar Assunto
  </button>

  @error($name)
    <div class="invalid-feedback d-block">{{ $message }}</div>
  @enderror
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
  const container = document.getElementById('assunto-select-container');
  const addBtn = document.getElementById('add-assunto-btn');

  // Template
  const template = `
    <div class="d-flex gap-2 mb-2 assunto-select-item">
      <select name="{{ $name }}[]" class="form-select flex-grow-1">
        <option value="">Selecione...</option>
        @foreach($assuntos as $a)
          <option value="{{ $a->cod_as }}">{{ $a->descricao }}</option>
        @endforeach
      </select>
      <button type="button" class="btn btn-danger remove-assunto-btn">&times;</button>
    </div>
  `;

  // Adicionar novo select
  addBtn.addEventListener('click', () => {
    container.insertAdjacentHTML('beforeend', template);
  });

  // Remover select
  container.addEventListener('click', (e) => {
    if (e.target.classList.contains('remove-assunto-btn')) {
      e.target.closest('.assunto-select-item').remove();
    }
  });
});
</script>
@endpush
