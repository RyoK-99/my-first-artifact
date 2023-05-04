<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Game Application</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        
    </head>
    <body class="antialiased">
        <h1>ユーザー情報</h1>
        <div class='users'>
            <div class='user'>
                <a href="/games/{{ $game->id }}">{{ $user->name }}</a>
                <form action="/games/{{ $game->id }}" id="form_{{ $game->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="button" onclick="deleteGame({{ $game->id }})">delete</button>
                </form>
            </div>
            @endforeach
            <a href='/games/create'>create</a>
        </div> 
        <div class='paginate'>{{ $games->links() }}</div>
        <script>
            function deleteGame(id) {
                'use strict'
                
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }    
            }
        </script>
    </body>
</html>