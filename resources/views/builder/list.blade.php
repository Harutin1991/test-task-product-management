<ul data-sk="{{  $sk ?? 'list' }}"
    @if (!empty($classes))
        class="{{ $classes }}"
    @endif
    @if (!empty($styles))
        style="{{ $styles }}"
    @endif>
    @if (!empty($items))
        @foreach($items as $item)
            <li>{!! $item !!}</li>
        @endforeach
    @endif
</ul>
