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
                <div>
                @if($game->is_liked_by_auth_user())
                    <form action="{{ route('game.destroy', $game->id) }}" method="POST">
                       @csrf
                       <button type="submit" class="btn btn-success btn-sm">お気に入り<span class="badge">{{ $game->game_user->count() }}</span></button>
                    </form>
                @else
                    <form action="{{ route('game.favorite', $game->id) }}" method="POST">
                       @csrf
                       <button type="submit" class="btn btn-secondary btn-sm">お気に入り<span class="badge">{{ $game->game_user->count() }}</span></button>
                    </form>
                @endif
                </div>
                <p class='overview'>{{ $game->overview }}</p>
            </div>
        </div>
        <div class="edit">
            <a href="/games/{{ $game->id }}/edit">記事の更新</a>
        </div>
        <a href='/reviews/create'>レビューを作る</a>
        <div class='review'>
            @forelse ($reviews as $review)
            <div><a href="/reviews/{{ $review->id }}">{{ $review->title }}</a></div>
            <p class='username'>{{ $review->user->name }}</p>
            <p class='reviewbody'>{{ $review->body }}</p>
            <form action="/reviews/{{ $review->id }}" id="form_{{ $review->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="button" onclick="deleteReview({{ $review->id }})">delete</button>
            </form>
            @empty
            <div class='reviewempty'>
                <p class='empty'>レビューはまだありません。</p>
            </div>
            @endforelse
        </div>
        <script>
            function deleteReview(id) {
                'use strict'
                
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }    
            }
        </script>
        <div class="footer">
            <a href="/games">戻る</a>
        </div>
    </body>
</html>