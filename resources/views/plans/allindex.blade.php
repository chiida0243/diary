<x-main-layout>
<link rel="stylesheet" href="{{ asset('css/index-page.css') }}">
    <h1 class='midashi'>Community Posts</h1>
    <div class='posts'>
         @foreach ($posts as $post)
                <div class='post'>
                    
                    <div class='post-image' style="background-image: url({{$post->images[0]->image ?? ""}})"></div>
                
                    <h2 class='title'>
                        <a href="/posts/{{ $post->id }}">{{ $post->title }} </a> <span class='prefecture_name' style="font-size: 14px;"> in {{ $post->prefecture->name }}</span>
                    </h2>
                    <p class='visited_at'>{{ $post->visited_at }}</p>
                    <p class='user_name'>written by {{ $post->user->name }}</p>
                
                </div>
            @endforeach
        </div>
</x-main-layout>