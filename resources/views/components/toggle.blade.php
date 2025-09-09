<div class="form-check form-switch mb-2">
    <input class="form-check-input" type="checkbox" name="{{ $name }}" value="1" {{ ($value ?? false) == '1' ? 'checked' : '' }}>
    <label class="form-check-label">{{ $label }}</label>
</div>
