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
        <h1>CREATE GAME</h1>
        <form action="/games/{{ $game->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class ="game">
                <h2>GameTitle</h2>
                <input type="text" name="game[name]" placeholder="ゲームタイトル" value="{{ $game->name }}"/>
                <p class="name__error" style="color:red">{{ $errors->first('game.name') }}</p>
            </div>
            <div class="overview">
                <h2>概要</h2>
                <textarea name="game[overview]">{{ $game->overview }}</textarea>
                <p class="overview__error" style="color:red">{{ $errors->first('game.overview') }}</p>
            </div>
            <input type="submit" value="update"/>
        </from>
        <div class='footer'>
            <a href="/games/{{ $game->id }}">戻る</a>
        </div>
    </body>
    </x-app-layout>
</html>
