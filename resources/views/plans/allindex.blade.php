<x-main-layout>
<link rel="stylesheet" href="{{ asset('css/index-page.css') }}">
    <h1 class='midashi'>All Plans</h1>
    <div class='posts'>
        @foreach ($posts as $post)
            <div class='post'>
                    <img src="{{ $post->image }}" alt="Post Image">
                
                    <h2 class='title'>
                        <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    </h2>
                    <p class='visited_at'>{{ $post->visited_at }}</p>
                    <!--<p class='prefecture_name'>in {{ $post->prefecture->name }}</p>-->
                    <p class='user_name'>written by {{ $post->user->name }}</p>
            </div>
        @endforeach
    </div>
</x-main-layout>