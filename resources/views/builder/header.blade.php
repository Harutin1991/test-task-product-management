<header data-sk="{{ $sk ?? 'header' }}"
        @if (!empty($styles))
            style="{{ $styles }}"
        @endif
        @if(!empty($classes))
            class="{{ $classes }}"
        @endif>
    {!! $string !!}
</header>
