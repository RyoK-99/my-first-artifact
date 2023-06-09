<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Game Application</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        
    </head>
    <body class="antialiased">
        <h1>Review</h1>
        <div class='reviews'>
            @foreach ($reviews as $review)
            <div class='review'>
                <h2 class='username'>{{ $review->user->name }}</h2>
                <p><a href ='title'>{{ $review->game->name }}<a/></p>
                <a href="/reviews/{{ $review->id }}">{{ $review->title }}</a>
                <p class='body'>{{ $review->body }}</p>
                <form action="/reviews/{{ $review->id }}" id="form_{{ $review->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="button" onclick="deleteReview({{ $review->id }})">delete</button>
                </form>
            </div>
            @endforeach
            <a href='/reviews/create'>create</a>
        </div> 
        <div class='paginate'>{{ $reviews->links() }}</div>
        <script>
            function deleteReview(id) {
                'use strict'
                
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }    
            }
        </script>
    </body>
</html>