<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Game Application</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        
    </head>
    <body>
        <h1>ユーザー情報</h1>
        <div class="mr-3">
        <div class='username'>{{ $user->name }}</div>
        <img
            id="preview"
            src="{{ isset(Auth::user()->image_path) ? asset('storage/' . Auth::user()->image_path) : asset('images/user_icon.png') }}" 
            alt=""
            class="w-16 h-16 rounded-full object-cover border-none bg-gray-200">
        </div>
    </body>
    <div class='footer'>
        <a href="/">Topページへ</a>
    </div>
</html>