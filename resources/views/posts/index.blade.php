<x-main-layout>
        <h1>Diary</h1>
        <a href="/post/create">create</a>
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    <h2 class='title'>
                        <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    </h2>
                    <h3 class='user_id'>{{ $post->user_id }}</h3>
                    <h4 class='prefecture_id'>{{ $post->prefecture_id }}</h4>
                </div>
            @endforeach
        </div>
</x-main-layout>