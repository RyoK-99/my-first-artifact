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
        <div>
            @if($review->is_liked_by_auth_user())
                <a href="{{ route('review.unlike', $review->id) }}" class="btn btn-success btn-sm">いいね<span class="badge">{{ $review->likes->count() }}</span></a>
            @else
                <a href="{{ route('review.like', $review->id) }}" class="btn btn-secondary btn-sm">いいね<span class="badge">{{ $review->like->count() }}</span></a>
            @endif
        </div>
        <div class='footer'>
            <a href="/games">戻る</a>
        </div>
    </body>
    </x-app-layout>
</html>