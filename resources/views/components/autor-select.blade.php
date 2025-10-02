<div class="mb-3">
  <label class="form-label" for="{{ $name }}">{{ $label }}{{ $required ? ' *' : '' }}</label>
  <select
      name="{{ $name }}"
      id="{{ $name }}"
      class="form-select @error($name) is-invalid @enderror"
      {{ $required ? 'required' : '' }}
  >
      <option value="">Selecione...</option>
      @foreach($autores as $a)
          <option value="{{ $a->cod_au }}"
              {{ old($name, $selected) == $a->cod_au ? 'selected' : '' }}>
              {{ $a->nome }}
          </option>
      @endforeach
  </select>
  @error($name)
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>
