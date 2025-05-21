<label for="{{ $name }}">{{ $label }} @if($required == 'true') <span>*</span> @endif</label>
<select name="{{ $name }}" id="{{ $name }}" class="@error($name) is-invalid @enderror" @if($required == 'true') required @endif>
    <option value="">Please select</option>
    @if ($collection)
        @foreach ($collection as $item)
            <option value="{{ $item->id }}" {{ (string) $item->id === (string) $selectedValue ? 'selected' : '' }}>
                {{ $item->$displayField }}
            </option>
        @endforeach
    @else
        @foreach ($options as $key => $value)
            <option value="{{ $key }}" {{ (string) $key === (string) $selectedValue ? 'selected' : '' }}>
                {{ $value }}
            </option>
        @endforeach
    @endif
</select>

@error($name)
<div class="alert alert-danger">
    {{ $message }}
</div>
@enderror

