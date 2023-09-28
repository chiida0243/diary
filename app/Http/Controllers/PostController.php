<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use App\Models\Prefecture;
use App\Models\Image;
use Cloudinary;

class PostController extends Controller
{
    public function index(Post $post)
        {
            $user = auth()->user();
            $post = Post::where('user_id',$user->id)->orderBy('visited_at','desc')->get();
            return view('posts.index')->with(['posts' => $post]);
        }
        
    public function allindex(Post $post)
    {
        $posts = Post::whereNotIn('user_id',[auth()->user()->id])->orderBy('visited_at','desc')->get();
        return view('plans.allindex')->with(['posts'=>$posts]);
    }
        
    public function show(Post $post)
        {
             return view('posts.show')->with(['post' => $post]);
        }
        
    public function create(Prefecture $prefecture)
    {
        return view('posts/create')->with(['prefectures' => $prefecture->get()]);
    }
    
    public function edit(Post $post,Prefecture $prefecture)
    {
        $prefectures=$prefecture->get();
        //画像
        $images = $post->images;
        
        return view('posts.edit',compact('post','prefectures','images'));
    }
    
    public function update(Request $request,$id)
    {
        $post = Post::find($id);
        $post->title=$request->input('title');
        $post->place=$request->input('place');
        $post->save();
        
        return redirect()->route('post.index')->with('success', 'Post updated successfully');
    }
    
    public function store(Request $request,Post $post)
    {
        $user=auth()->user();
        $input = $request['post'];
        $input["user_id"]=$user->id;
        $post->fill($input)->save();
        
         //cloudinaryへ画像を送信し、画像のURLを$image_urlに代入している
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
                $uploadedImage = Cloudinary::upload($imageFile->getRealPath());

                $image = new Image();
                $image->image = $uploadedImage->getSecurePath();
                $image->save();

                $post->images()->attach($image->id);
            }
        // $image = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        }
        
    
        
        return redirect('/posts/' . $post->id);
        
        
    }
    

}

