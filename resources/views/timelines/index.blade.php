<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Game Application</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    </head>
    <body class="antialiased">
        <h1>Timeline</h1>
        <div class='timelines'>
            @foreach ($timelines as $timeline)
            <div class='timeline'>
                <h2 class='username'>{{ $timeline->user_id }}</h2>
                <h3 class='gametitle'>{{ $timeline->game_id }}</h3>
                <h4 class='title'>{{ $timeline->title }}</h4>
                <p class='body'>{{ $timeline->body }}</p>
            </div>
            @endforeach
        </div>
    </body>
</html>
