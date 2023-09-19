<x-main-layout>
<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class="title">
            {{ $post->title }} <span style="font-size: 14px;"> in {{ $post->place }}</span>
        </h1>
        <h2>{{ $post->prefecture->name }}</h2>
        <div class="content">
            <div class="content__post">
                <h3>{{ $post->visited_at }}</h3>
                <p class='about'>{{ $post->about }}</p>
                
        <div class="post-images">
            @if ($post->images)
                @foreach ($post->images as $image)
                   
                    <img src="{{ $image->image }}" alt="Image">
                @endforeach
            @else
            <p>No images available.</p>
            @endif
        </div>

                <h4>感想</h4>
                <p class='impression'>{{ $post->impression }}</p>
            </div>
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
        <div class="footer2">
            <a href="/posts/{{ $post->id }}/edit">編集</a>
        </div>
    </body>
</html>
</x-main-layout>