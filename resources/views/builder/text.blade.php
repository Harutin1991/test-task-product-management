<p  data-sk="{{ $sk ?? 'text' }}"
    @if (!empty($styles))
        style="{{ $styles }}"
    @endif
    @if(!empty($classes))
        class="{{ $classes }}"
    @endif>
    {!! $string !!}
</p>
