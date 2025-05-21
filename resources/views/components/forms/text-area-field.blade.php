<textarea name="{{ $name }}" id="{{ $name }}" class="form-control @error($name) is-invalid @enderror @if($isTinyEditor == 'yes') tinyEditor @endif" cols="30" rows="10" @if($required == 'true') required @endif>{{ old($name, $value) }}</textarea>

@error($name)
    <div class="alert alert-danger">
        {{ $message }}
    </div>
@enderror
