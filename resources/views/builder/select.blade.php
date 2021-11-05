<select data-sk="{{ $sk ?? 'select' }}"
        class="nice-select @if (!empty($classes)){{ $classes }}@endif"
        @if (!empty($name))
            name="{{ $name }}"
        @endif
        @if (!empty($styles))
            style="{{ $styles }}"
        @endif>
    @foreach($items as $index => $item)
        <option @if (isset($item["value"]))
                    value="{{ $item["value"] }}"
                @endif
                @if (isset($item["selected"]) && $item["selected"])
                    selected="selected"
                @endif>
            {{ $item["text"] ?? "Option $index" }}
        </option>
    @endforeach
</select>
