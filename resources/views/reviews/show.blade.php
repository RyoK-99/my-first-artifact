<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
    <head>
        <meta charset="utf-8">
        <title>Game Application</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    </head>
    <body class="antialiased">
        <h1 class='title'>
            {{ $review->title }}
        </h1>
        <div class='content'>
            <dev class='content_review'>
            <h3 class='username'>{{ $review->user->name }}</h3>
            <a href='title'>{{ $review->game->name }}</a>
            <p class='body'>{{ $review->body }}</p>
            </dev>
        </div>
        <div class='footer'>
            <a href="/">戻る</a>
        </div>
    </body>
    </x-app-layout>
</html>