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
        <div class='timelines'>
            <h2 class='username'>{{ $timeline->user_id }}</h2>
            <h3 class='gametitle'>{{ $timeline->game_id }}</h3>
            <p class='body'>{{ $timeline->body }}</p>
        </div>
    </body>
</html>
