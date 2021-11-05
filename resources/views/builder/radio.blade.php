<label  data-sk="{{ $sk ?? 'radio' }}"
        @if (!empty($classes))
            class="{{ $classes }}"
        @endif
        @if (!empty($styles))
            style="{{ $styles }}"
        @endif>
    <input  @if (!empty($name))
                name="{{ $name ?? '' }}"
            @endif
            @if (!empty($value))
                value="{{ $value ?? '' }}"
            @endif
            type="radio"
    />

    <span class="checkbox__virtual"></span>
    @if (!empty($string))
        <span class="checkbox__label">{!! $string !!}</span>
    @endif
</label>
