<div data-sk="{{ $sk ?? 'block' }}"
     @if (!empty($styles))
        style="{{ $styles }}"
     @endif
     @if(!empty($classes))
        class="{{ $classes }}"
     @endif>
    {!! $string !!}
</div>
