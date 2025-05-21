<label for="{{ $name }}">{{ $label }} @if($required == 'true') <span>*</span> @endif</label>
@if($type == 'number')
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" class="form-control @error($name) is-invalid @enderror" value="{{ old($name, $value) }}" @if($required == 'true') required @endif min="0" step="any">
@else
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" class="form-control @error($name) is-invalid @enderror" value="{{ old($name, $value) }}" @if($required == 'true') required @endif>
@endif

@error($name)
    <div class="alert alert-danger">
        {{ $message }}
    </div>
@enderror

