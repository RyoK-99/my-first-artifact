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
        <div class='image_path'>
            @if (isset($user->image_path))
               <img src="{{ asset('storage/' . $user->image_path) }}" width="100" height="100">
            @else
               NO Image
            @endif
        </div>
        <div class='favorites'>
            <h2>お気に入り</h2>
            @forelse ($gameusers as $gameuser)
            <div>{{ $gameuser->game->name }}</div>
            @empty
            <div class='gameuserempty'>
                <p class='empty'>お気に入りはありません。</p>
            </div>
            @endforelse
        </div>
        <div class='timelines'>
            <h3>最近の投稿</h3>
            @forelse ($timelines as $timeline)
            <p><a href ="/games/{{ $timeline->game->id }}">{{ $timeline->game->name }}<a/></p>
                <a href="/timelines/{{ $timeline->id }}">{{ $timeline->title }}</a>
                <p class='body'>{{ $timeline->body }}</p>
            @empty
            <div class='gameuserempty'>
                <p class='empty'>最近の投稿はありません。</p>
            </div>
            @endforelse
        </div>
    </body>
    <div class='footer'>
        <a href="/">Topページへ</a>
    </div>
</html>