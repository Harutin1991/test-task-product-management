<section    data-sk="{{ $sk ?? 'section' }}"
            @if (!empty($classes))
                class="{{ $classes  }}"
            @endif
            @if (!empty($styles))
                style="{{ $styles }}"
            @endif>
    <div class="grid-container">
        {!! $string !!}
    </div>
</section>
