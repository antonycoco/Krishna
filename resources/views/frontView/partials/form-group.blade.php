<div class="form-group">
    <input id="{{ $name }}" type="{{ $type }}" class="form-control{{ $errors->has($name) ? ' is-invalid' : '' }}"
           name="{{ $name }}" value="{{ old($name, isset($value) ? $value : '') }}" {{ $required ? 'required' : ''}}
           placeholder="{{ $title }}"><br>

    @if ($errors->has($name))
        <div class="invalid-feedback">
            {{ $errors->first($name) }}
        </div>
    @endif
</div>
