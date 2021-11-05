<nav data-sk="{{ $sk ?? 'menu' }}"
     role="navigation"
     @if (!empty($classes))
        class="{{ $classes }}"
    @endif
    @if (!empty($styles))
        style="{{ $styles }}"
    @endif>
    {!! $string !!}
</nav>
