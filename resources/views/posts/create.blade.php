<x-main-layout>
<!--<!DOCTYPE HTML>-->
<!--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">-->
    <head>
        <meta charset="utf-8">
        <title>Diary</title>
    </head>
    <body>
        <h1>Diary name</h1>
        <form action="/posts" method="POST" enctype="multipart/form-data">　
            @csrf
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="post[title]" placeholder="タイトル"/>
            </div>
            <div class="date">
                <h2>Visited_at</h2>
                <input type="date" name="post[visited_at]"/>
            </div>
            <div class="place">
                <h2>Place</h2>
                <input type="text" name="post[place]" placeholder="場所"/>
            </div>
            <div class="form-group">
                <h2>Images</h2>
                <input type="file" name="images[]" id="images" multiple>
            </div>
                    
          
            <div class="about">
                <h2>About</h2>
                <textarea name="post[about]" placeholder="しおりの内容"></textarea>
            </div>
            <div class="impression">
                <h2>Impression</h2>
                <textarea name="post[impression]" placeholder="感想"/></textarea>
            </div>
            <div class="prefecture">
                <h2>Prefecture</h2>
                <select name='post[prefecture_id]'>
                    @foreach($prefectures as $prefecture)
                    <option value='{{ $prefecture->id }}'>{{ $prefecture->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>
</x-main-layout>