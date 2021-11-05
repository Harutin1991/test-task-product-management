<div data-sk="{{ $sk ?? 'image' }}"
     @if (!empty($styles))
        style=" background-image: url('{{ asset('images/default.jpg') }}');
                background-repeat: no-repeat;
                background-size: cover;
                background-position: center;
                {{ $styles }}"
     @endif
     @if(!empty($classes))
        class="{{ $classes }}"
     @endif>
    {!! $string !!}
</div>
