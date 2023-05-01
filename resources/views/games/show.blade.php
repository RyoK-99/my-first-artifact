<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Game Application</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        
    </head>
    <body class="antialiased">
        <h1>Games</h1>
        <div class='games'>
            <div class='game'>
                <h2 class='name'>{{ $game->name }}</h2>
                <p class='overview'>{{ $game->overview }}</p>
            </div>
        </div>
        <div class="edit">
            <a href="/games/{{ $game->id }}/edit">update</a>
        </div>
        <div class="footer">
            <a href="/games">戻る</a>
        </div>
    </body>
</html>