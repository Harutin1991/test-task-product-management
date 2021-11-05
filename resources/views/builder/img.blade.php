<img data-sk="{{ $sk ?? 'img' }}"
     src="{{ asset('images/' . $src) }}"
     alt="{{ $alt ?? 'Thumbnail' }}"
     @if(empty($classes))
        class="{{ $classes }}"
     @endif
     @if(!empty($styles))
        style="{{ $styles }}"
     @endif
    />
