<footer data-sk="{{ $sk ?? 'footer' }}"
        @if (!empty($styles))
            style="{{ $styles }}"
        @endif
        @if(!empty($classes))
            class="{{ $classes }}"
        @endif>
    {!! $string !!}
</footer>
