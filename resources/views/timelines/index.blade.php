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
        <a href="timelines/create">create</a>
        <div class='timelines'>
            @foreach ($timelines as $timeline)
            <div class='timeline'>
                <h2 class='username'>{{ $timeline->user_id }}</h2>
                <h3 class='gametitle'>{{ $timeline->game_id }}</h3>
                <a href="/timelines/{{ $timeline->id }}">{{ $timeline->title }}</a>
                <p class='body'>{{ $timeline->body }}</p>
            </div>
            @endforeach
        </div>
        <div class='paginate'>{{ $timelines->links() }}</div>
    </body>
</html>
