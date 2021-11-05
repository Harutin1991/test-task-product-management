<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="HandheldFriendly" content="True" />
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="MobileOptimized" content="320" />
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Garage</title>
    <meta name="keywords" content="">
    <meta name="description" content="" />

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="./img/favicons/favicon.png" sizes="32x32">
    <meta name="msapplication-TileImage" content="./img/favicons/favicon.png">
    <meta name="msapplication-TileColor" content="#00aba9">

    <!-- apple web app title -->
    <meta name="application-name" content="Garage">
    <meta name="apple-mobile-web-app-title" content="Garage">
    <meta name="mobile-web-app-capable" content="Garage">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <![endif]-->

    <!-- Global Templates Styles -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <script src="{{ asset('js/bootstrap.js') }}" ></script>
</head>
<body style="background-color: {{$color}}">
        <?php $i = 0; ?>
    @foreach($elements as $key=>$element)
        @switch($element['category_id'])
            @case(1)
                    <button style="margin-top: {{ $element['bbox'][1] }}; margin-left: {{ $element['bbox'][0] }}; display: initial;" class="btn">Button</button>
                @break
            @case(2)
                    <div style="margin-top: {{ $element['bbox'][1] }}; margin-left: {{ $element['bbox'][0] }}; display: initial;">
                    <ul class="navbar-nav navbar-nav-lg nav-tabs">
                        <li>
                            Filter 1
                        </li>
                        <li>
                            Filter 1
                        </li>
                        <li>
                            Filter 1
                        </li>
                    </ul>
                    </div>
            @break
            @case(3)
                <?php
                    $img = \Intervention\Image\Facades\Image::make($image);
                    $img->crop(round($element['bbox'][2]), round($element['bbox'][3]), round($element['bbox'][0]), round($element['bbox'][1]));
                    $name = md5(time()) . '.jpg';
                    $path = public_path('images' . DIRECTORY_SEPARATOR . $name);
                    $img->save($path);
                ?>
            <div class="row" style="margin-top: {{ $element['bbox'][1] }}px; margin-left: {{ $element['bbox'][0] }}px; display: initial;">
                <img src="{{ asset('images/' . $name) }}" class="img-responsive" style="height: {{ $element['bbox'][3] }}px; width: {{ $element['bbox'][2] }}px">
            </div>
            @break

            @case(5)

            @break
            @case(6)
            <div style="margin-top: {{ $element['bbox'][1] }}px; margin-left: {{ $element['bbox'][0] }}px; display: initial;">
                <p class="" style="display: initial;">Lorem ipsum</p>
            </div>
            @break
            @endswitch
    @endforeach
            {!! $productsGridView !!}
</body>
</html>
