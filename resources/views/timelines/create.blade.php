<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Game Application</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    </head>
    <body class="antialiased">
        <h1>CREATE TIMELINE</h1>
        <form action="/timelines" method="POST">
            @csrf
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="timeline[title]" placeholder="タイトル">
            </div>
            <div class="body">
                <h2>Body</h2>
                <textarea name="timeline[body]" placeholder="「ゲームタイトル」＠１募集します"></textarea>
            </div>
            <input type="submit" value="store">
        </from>
        <div class='footer'>
            <a href="/">戻る</a>
        </div>
    </body>
</html>
