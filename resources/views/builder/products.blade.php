<div data-sk="{{ $sk ?? 'products' }}"
     @if (!empty($styles))
        style="{{ $styles }}"
     @endif
     @if(!empty($classes))
        class="{{ $classes }}"
     @endif>
    {!! $string !!}
</div>
