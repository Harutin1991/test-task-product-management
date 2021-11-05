<button data-sk="{{ $sk ?? 'button' }}"
        class="btn @if(!empty($classes)){{ $classes }}@endif"
        @if (!empty($styles))
            style="{{ $styles }}"
        @endif>
    {!! $string ?? 'button' !!}
</button>
