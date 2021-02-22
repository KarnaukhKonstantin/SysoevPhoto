<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta content="Свадебный и Семейный Фотограф Станислав Сысоев. Самые яркие воспоминания всегда с тобой! Ты в кадре! Фотограф Запорожье" name="description">
    <meta content="фотограф Запорожье, лучший фотограф, фотография, кращій фотограф, фотограф Запоріжжя, Станислав Сысоев, Станіслав Сисоєв, Запорожье фотограф,свадебный, семейный, лавстори, love-story, фотограф, Станислав, Сысоев, Украина, Запорожье, моменты, фото, кадр, воспоминания,"
          name="keywords">
    <meta content="{{ asset('images/favicon.png') }}" property="og:image">
    <meta content="Свадебный и Семейный фотограф Станислав Сысоев Запорожье" property="og:title">
    <meta content="website" property="og:type">
    <meta content="ru_RU" property="og:locale">
    <meta content="Свадебный и Семейный Фотограф Станислав Сысоев. Самые яркие воспоминания всегда с тобой! Ты в кадре!" property="og:description">
    <meta content="Сысоев Станислав. Фотограф. Свадебная и семейная фотография." property="og.site_name">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/logo-stas.png">
    <title>SysoevPhoto</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet' type='text/css'>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link href='{{ url('sitemap.xml') }}' rel='alternate' title='Sitemap' type='application/rss+xml'/>

    <!-- CSS -->
    <link href="{{ mix('css/app.min.css') }}" rel="stylesheet">
</head>
<body>
<div id="app" class="all-page">
    <landing-page class="landing"></landing-page>
</div>
<script src="{{ mix('js/app.min.js') }}"></script>
</body>
</html>
