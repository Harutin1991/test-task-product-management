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
    <link rel="stylesheet" href="{{asset('css/base.css')}}">
    <link rel="stylesheet" href="{{asset('css/grid.css')}}">
    <link rel="stylesheet" href="./../../fonts/oswald.css">
    <link rel="stylesheet" href="./../../fonts/bebas.css">
    <link rel="stylesheet" href="./../../css/base.css">
    <link rel="stylesheet" href="./../../css/typography.css">
    <link rel="stylesheet" href="./../../css/grid.css">
    <link rel="stylesheet" href="./../../css/btn.css">
    <link rel="stylesheet" href="./../../css/icons.css">

</head>
<body style="background-color: {{$color}}">
{!! $contentHtml !!}
</body>
</html>
