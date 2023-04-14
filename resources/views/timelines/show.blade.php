<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Game Application</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    </head>
    <body class="antialiased">
        <h1 class='title'>
            {{ $timeline->title }}
        </h1>
        <div class='content'>
            <dev class='content_timeline'>
            <h3 class='username'>{{ $timeline->user_id }}</h3>
            <h4 class='gametitle'>{{ $timeline->game_id }}</h4>
            <p class='body'>{{ $timeline->body }}</p>
            </dev>
        </div>
        <div class='footer'>
            <a href="/">戻る</a>
        </div>
    </body>
</html>
