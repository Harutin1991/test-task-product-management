<div style="{{$styles}}; display:flex;" @if($classes != '')class="{{$classes}}" @endif>
    @for($i = 0; $i < 5; $i ++)
        <span>
            <img src="{{asset('images/star.png')}}" alt="star">
        </span>
    @endfor
</div>
