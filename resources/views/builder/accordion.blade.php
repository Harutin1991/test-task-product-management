<ul data-sk="{{ $sk ?? "accordion" }}"
    class="accordion @if (!empty($classes)){{ $classes }}@endif"
    @if (!empty($styles))
        style="{{ $styles }}"
    @endif>
    @if (!empty($items))
        @foreach($items as $index => $item)
            <li>
                <label  @if (!empty($id))
                            for="{{ "$id-$index"  }}"
                        @endif>
                    {{ $item["label"]  }}
                </label>
                <input  @if (!empty($id))
                            id="{{ "$id-$index" }}"
                            name="{{ $id }}"
                        @endif
                        @if (!empty($item["active"]) && $item["active"])
                            checked="checked"
                        @endif
                        type="radio"
                    />
                <a href="#" class="accordion__toggle">
                    <i class="icon icon--arrow-right-black"></i>
                </a>
                <div class="content">
                    {!! $item["content"] !!}
                </div>
            </li>
        @endforeach
    @endif
</ul>
