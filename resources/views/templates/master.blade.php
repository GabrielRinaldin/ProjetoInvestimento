<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Investindo</title>
    <link rel="stylesheet" href="{{ asset ('css/stylesheet.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    @yield('css-view')
</head>

<body>
    @include('layouts.app')
    <section id="view-conteudo">
        @yield('conteudo-view')
    </section>
    @yield('js-view')


</body>

</html>