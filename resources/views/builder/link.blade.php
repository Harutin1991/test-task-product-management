<a  data-sk="{{ $sk ?? 'link' }}"
    href="{{ $href ?? '#' }}"
    @if (!empty($target))
        target="{{ $target }}"
    @endif
    @if (!empty($classes))
        class="{{ $classes }}"
    @endif
    @if (!empty($styles))
        style="{{ $styles }}"
    @endif>
    {!! $string ?? "Link" !!}
</a>
