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
        <h1>CREATE REVIEW</h1>
        <form action="/reviews" method="POST">
            @csrf
            <div class="user">
            </div>
            <div class ="game">
                <h2>GameTitle</h2>
                <select name="review[game_id]">
                    @foreach($games as $game)
                        <option value="{{ $game->id }}">{{ $game->name }}</option>
                    @endforeach
                </select>
            </div>
                <h2>星評価</h2>
            　　<div class="stars">
                　　<span class="star" id="1">★</span>
                　　<span class="star" id="2">★</span>
                　　<span class="star" id="3">★</span>
                　　<span class="star" id="4">★</span>
                　　<span class="star" id="5">★</span>
            　　</div>
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="review[title]" placeholder="タイトル" value={{ old('review.title') }}>
                <p class='title__error' style="color:red">{{ $errors->first('review.title') }}</p>
            </div>
            <div class="body">
                <h2>Body</h2>
                <textarea name="review[body]" placeholder="ゲームの概要を入力してください">{{ old('review.body') }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('review.body') }}</p>
            </div>
            <input type="submit" value="store">
        </from>
        <div class='footer'>
            <a href="/">戻る</a>
        </div>
    </body>
    </x-app-layout>
</html>